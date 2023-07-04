<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\Matrix;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matrices = Matrix::with('alternative', 'criteria')->paginate(8);

        return view('tabel.index', compact('matrices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alternatives = Alternative::all();
        $criterias = Criteria::all();

        return view('tabel.create', compact('alternatives', 'criterias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $value = $request->input('value');
        $criteria = Criteria::find($request->input('colNo_kriteria'));
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
        } 
        elseif ($jenisKriteria == 'cost') {
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

        $nilai_keputusan = $nilaiKeputusan;

        $data = [
            'rowNo_alternatif' => $request->input('rowNo_alternatif'),
            'colNo_kriteria' => $request->input('colNo_kriteria'),
            'value' => $request->input('value'),
            'nilai_keputusan' => $nilai_keputusan,
            'created_at' => now(),
            'updated_at' => now()
        ];

        Matrix::create($data);

        return redirect()->route('tabel.index')->with('success', 'Data berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alternatives = Alternative::all();
        $criterias = Criteria::all();
        $matrix = Matrix::findOrFail($id);

        return view('tabel.edit', compact('alternatives', 'criterias', 'matrix'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $matrix = Matrix::findOrFail($id);

        $value = $request->input('value');
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
        } 
        elseif ($jenisKriteria == 'cost') {
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

        $matrix->update([
            'rowNo_alternatif' => $request->input('rowNo_alternatif'),
            'colNo_kriteria' => $request->input('colNo_kriteria'),
            'value' => $request->input('value'),
            'updated_at' => now()
        ]);
        

        return redirect()->route('tabel.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matrik = Matrix::findOrFail($id);

        $matrik->delete();

        return redirect()->route('tabel.index')->with('success', 'Data berhasil dihapus.');
    }
}
