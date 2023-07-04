<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\Matrix;
use App\Models\Result;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function processNilaiKeputusan()
    {
        $matrices = Matrix::all();

        foreach ($matrices as $matrix) {
            $value = $matrix->value;
            $criteria = Criteria::find($matrix->colNo_kriteria);
            $jenisKriteria = $criteria->type;
            $kriteriaId = $criteria->id;

            if ($kriteriaId == 4) {
                if ($value == 1) {
                    $nilaiKeputusan = 2;
                } elseif ($value == 0) {
                    $nilaiKeputusan = 1;
                }
            } elseif ($kriteriaId == 6 || $kriteriaId == 7) {
                if ($value == 0) {
                    $nilaiKeputusan = 2;
                } elseif ($value == 1) {
                    $nilaiKeputusan = 1;
                }
            } elseif ($jenisKriteria == 'cost') {
                // aturan konversi untuk kriteria cost
                if ($value <= 0.5) {
                    $nilaiKeputusan = 1;
                } elseif ($value <= 1) {
                    $nilaiKeputusan = 2;
                } elseif ($value <= 1.5) {
                    $nilaiKeputusan = 3;
                } elseif ($value <= 2) {
                    $nilaiKeputusan = 4;
                } elseif ($value <= 2.5) {
                    $nilaiKeputusan = 5;
                } else {
                    $nilaiKeputusan = 6;
                }
            } else { // benefit
                // aturan konversi untuk kriteria benefit
                if ($value <= 0.5) {
                    $nilaiKeputusan = 1;
                } elseif ($value <= 1) {
                    $nilaiKeputusan = 2;
                } elseif ($value <= 1.5) {
                    $nilaiKeputusan = 3;
                } elseif ($value <= 2) {
                    $nilaiKeputusan = 4;
                } elseif ($value <= 2.5) {
                    $nilaiKeputusan = 5;
                } else {
                    $nilaiKeputusan = 6;
                }
            }

            $matrix->nilai_keputusan = $nilaiKeputusan;
            $matrix->save();
        }

        return redirect()->route('tabel.index')->with('success', 'Konversi nilai keputusan berhasil diproses');
    }


    public function process(Request $request)
    {
        $datas = Matrix::all();

        if ($datas->whereNull('nilai_keputusan')->count() > 0) {
            return redirect()->route('tabel.index')->with('pesan', 'Lakukan konversi nilai terlebih dahulu sebelum melanjutkan');
        }


        $alternatives = Alternative::all();
        $criterias = Criteria::all();
        
        //SAW

        $matrixes = [];
        foreach ($datas as $data) {
            $matrixes[$data->rowNo_alternatif][$data->colNo_kriteria] = $data->nilai_keputusan;
        }

        $normalizedMatrix = [];

        foreach ($criterias as $criteria) {
            // Get criteria values for all alternatives
            $criteriaValues = Matrix::where('colNo_kriteria', $criteria->id)
                ->pluck('nilai_keputusan', 'rowNo_alternatif')
                ->toArray();
            // Calculate the maximum value for the criteria
            if ($criteria->type == 'cost') {
                $minValue = min($criteriaValues);

                foreach ($alternatives as $alternative) {
                    $value = $criteriaValues[$alternative->id];
                    $normalizedValue = $minValue / $value;

                    // Store the normalized value in the normalized matrix array
                    $normalizedMatrix[$alternative->id][$criteria->id] = $normalizedValue;
                }
            } else {
                $maxValue = max($criteriaValues);

                foreach ($alternatives as $alternative) {
                    $value = $criteriaValues[$alternative->id];
                    $normalizedValue = $value / $maxValue;

                    // Store the normalized value in the normalized matrix array
                    $normalizedMatrix[$alternative->id][$criteria->id] = $normalizedValue;
                }
            }
        }

        //TOPSIS
        $weightedMatrix = [];

        // Get the weight for each criteria
        $weights = [];

        foreach ($criterias as $criteria) {
            $weights[$criteria->id] = $criteria->bobot;
        }

        // Calculate weighted matrix
        foreach ($alternatives as $alternative) {
            foreach ($criterias as $criteria) {
                $weightedValue = $normalizedMatrix[$alternative->id][$criteria->id] * $weights[$criteria->id];
                $weightedMatrix[$alternative->id][$criteria->id] = $weightedValue;
            }
        }

        // Calculate ideal positive and negative solutions
        //ideal positive
        $idealPositive = [];

        foreach ($criterias as $criteria) {
            $maxPositive = null;
            $minPositive = null;


            foreach ($alternatives as $alternative) {
                $value = $weightedMatrix[$alternative->id][$criteria->id];

                if ($criteria->type == 'benefit') {
                    if ($maxPositive === null || $value > $maxPositive) {
                        $maxPositive = $value;
                        $idealPositive[0][$criteria->id] = $maxPositive;
                    }
                } elseif ($criteria->type == 'cost') {
                    if ($minPositive === null || $value < $minPositive) {
                        $minPositive = $value;
                        $idealPositive[0][$criteria->id] = $minPositive;
                    }
                }
            }
        }


        // dd($idealPositive);

        //ideal negative
        $idealNegative = [];

        foreach ($criterias as $criteria) {
            $maxNegative = null;
            $minNegative = null;

            //ideal positive
            foreach ($alternatives as $alternative) {
                $value = $weightedMatrix[$alternative->id][$criteria->id];

                if ($criteria->type == 'benefit') {
                    if ($maxNegative === null || $value < $maxNegative) {
                        $maxNegative = $value;
                        $idealNegative[0][$criteria->id] = $maxNegative;
                    }
                } elseif ($criteria->type == 'cost') {
                    if ($minNegative === null || $value > $minNegative) {
                        $minNegative = $value;
                        $idealNegative[0][$criteria->id] = $minNegative;
                    }
                }
            }
        }

        // Calculate separation measures
        $positiveDistances = [];
        $negativeDistances = [];

        foreach ($alternatives as $alternative) {
            $positiveDistance = 0;
            $negativeDistance = 0;

            foreach ($criterias as $criteria) {
                $positiveDistance += pow($weightedMatrix[$alternative->id][$criteria->id] - $idealPositive[0][$criteria->id], 2);
                $negativeDistance += pow($weightedMatrix[$alternative->id][$criteria->id] - $idealNegative[0][$criteria->id], 2);
            }

            $positiveDistance = sqrt($positiveDistance);
            $negativeDistance = sqrt($negativeDistance);

            $positiveDistances[0][$alternative->id] = $positiveDistance;
            $negativeDistances[0][$alternative->id] = $negativeDistance;
        }


        // Calculate performance scores
        $performanceScores = [];
        foreach ($alternatives as $alternative) {
            $performanceScore = $negativeDistances[0][$alternative->id] / ($positiveDistances[0][$alternative->id] + $negativeDistances[0][$alternative->id]);
            $performanceScores[0][$alternative->id] = $performanceScore;
        }

        $dataToSort = [];

        foreach ($alternatives as $alternative) {
            $dataToSort[$alternative->id] = $performanceScores[0][$alternative->id];
        }

        asort($dataToSort);

        // Buat array kosong untuk menyimpan peringkat
        $ranking = [];

        // Looping untuk memberikan peringkat pada setiap data
        $rank = 1;
        foreach ($dataToSort as $key => $value) {
            $ranking[$key] = $rank;
            $rank++;
        }

        return view('perhitungan.index', compact('matrixes', 'alternatives', 'criterias', 'normalizedMatrix', 'weightedMatrix', 'idealPositive', 'idealNegative', 'positiveDistances', 'negativeDistances', 'performanceScores', 'ranking'));
    }
}
