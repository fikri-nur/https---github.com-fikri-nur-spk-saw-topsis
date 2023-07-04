@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Matriks Keputusan SAW') }}
            </h6>
            <hr>
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Metode SAW') }}
            </h6>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 30px;">Bobot</th>
                        @foreach ($criterias as $criteria)
                        <th class="text-center">{{ $criteria->bobot }}</th>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="text-center" style="width: 30px;">-</th>
                        @foreach ($criterias as $criteria)
                        <th class="text-center">{{ $criteria->code }}</th>
                        @endforeach
                    </tr>

                </thead>
                <tbody>
                    
                    @foreach ($matrixes as $key => $row)
                    <tr>
                        <th class="text-center">A{{ $loop->iteration }}</th>
                        @foreach ($row as $col)
                        <td class="text-center">{{ $col }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Matriks Normalisasi SAW') }}
            </h6>
            <hr>
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Metode SAW') }}
            </h6>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 30px;">Jenis</th>
                        @foreach ($criterias as $criteria)
                        <th class="text-center">{{ $criteria->type }}</th>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="text-center" style="width: 30px;">-</th>
                        @foreach ($criterias as $criteria)
                        <th class="text-center">{{ $criteria->code }}</th>
                        @endforeach
                    </tr>

                </thead>
                <tbody>
                    @foreach ($normalizedMatrix as $key => $row)
                    <tr>
                        <th class="text-center">A{{ $loop->iteration }}</th>
                        @foreach ($row as $col)
                        <td class="text-center">{{ $col }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Normalisasi Matriks Terbobot Y') }}
            </h6>
            <hr>
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Metode TOPSIS') }}
            </h6>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 30px;">Jenis</th>
                        @foreach ($criterias as $criteria)
                        <th class="text-center">{{ $criteria->type }}</th>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="text-center" style="width: 30px;">-</th>
                        @foreach ($criterias as $criteria)
                        <th class="text-center">{{ $criteria->code }}</th>
                        @endforeach
                    </tr>

                </thead>
                <tbody>
                    @foreach ($weightedMatrix as $key => $row)
                    <tr>
                        <th class="text-center">A{{ $loop->iteration }}</th>
                        @foreach ($row as $col)
                        <td class="text-center">{{ $col }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Solusi Ideal Positif') }}
            </h6>
            <hr>
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Metode TOPSIS') }}
            </h6>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 30px;">Jenis</th>
                        @foreach ($criterias as $criteria)
                        <th class="text-center">{{ $criteria->type }}</th>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="text-center" style="width: 30px;">-</th>
                        @foreach ($criterias as $criteria)
                        <th class="text-center">{{ $criteria->code }}</th>
                        @endforeach
                    </tr>

                </thead>
                <tbody>
                    @foreach ($idealPositive as $key => $row)
                    <tr>
                        <th class="text-center">Solusi Ideal Positif</th>
                        @foreach ($row as $col)
                        <td class="text-center">{{ $col }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Solusi Ideal Negatif') }}
            </h6>
            <hr>
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Metode TOPSIS') }}
            </h6>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 30px;">Jenis</th>
                        @foreach ($criterias as $criteria)
                        <th class="text-center">{{ $criteria->type }}</th>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="text-center" style="width: 30px;">-</th>
                        @foreach ($criterias as $criteria)
                        <th class="text-center">{{ $criteria->code }}</th>
                        @endforeach
                    </tr>

                </thead>
                <tbody>
                    @foreach ($idealNegative as $key => $row)
                    <tr>
                        <th class="text-center">Solusi Ideal Negatif</th>
                        @foreach ($row as $col)
                        <td class="text-center">{{ $col }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Jarak Terbobot Setiap Alternatif Terhadap Solusi Ideal Positif') }}
            </h6>
            <hr>
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Metode TOPSIS') }}
            </h6>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 30px;">-</th>
                        <!-- <th class="text-center" style="width: 30px;">Jenis</th> -->
                        @foreach ($alternatives as $key => $row)
                        <th class="text-center">D{{ $key + 1 }}+</th>
                        @endforeach
                    </tr>

                </thead>
                <tbody>
                    @foreach ($positiveDistances as $key => $row)
                    <tr>
                        <th class="text-center">Jarak Terbobot Positif</th>
                        @foreach ($row as $col)
                        <td class="text-center">{{ $col }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Jarak Terbobot Setiap Alternatif Terhadap Solusi Ideal Negatif') }}
            </h6>
            <hr>
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Metode TOPSIS') }}
            </h6>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 30px;">-</th>
                        <!-- <th class="text-center" style="width: 30px;">Jenis</th> -->
                        @foreach ($alternatives as $key => $row)
                        <th class="text-center">D{{ $key + 1 }}+</th>
                        @endforeach
                    </tr>

                </thead>
                <tbody>
                    @foreach ($negativeDistances as $key => $row)
                    <tr>
                        <th class="text-center">Jarak Terbobot Negatif</th>
                        @foreach ($row as $col)
                        <td class="text-center">{{ $col }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Menentukan Nilai Preferensi untuk setiap alternatif') }}
            </h6>
            <hr>
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Metode TOPSIS') }}
            </h6>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 30px;">-</th>
                        <!-- <th class="text-center" style="width: 30px;">Jenis</th> -->
                        @foreach ($alternatives as $alternative)
                        <th class="text-center">{{ $alternative->name }}</th>
                        @endforeach
                    </tr>

                </thead>
                <tbody>
                    
                    @foreach ($positiveDistances as $key => $row)
                    <tr>
                        <th class="text-center">D+</th>
                        @foreach ($row as $col)
                        <td class="text-center">{{ $col }}</td>
                        @endforeach
                    </tr>
                    @endforeach

                    @foreach ($negativeDistances as $key => $row)
                    <tr>
                        <th class="text-center">D-</th>
                        @foreach ($row as $col)
                        <td class="text-center">{{ $col }}</td>
                        @endforeach
                    </tr>
                    @endforeach

                    @foreach ($performanceScores as $key => $row)
                    <tr>
                        <th class="text-center">Hasil</th>
                        @foreach ($row as $col)
                        <td class="text-center">{{ $col }}</td>
                        @endforeach
                    </tr>
                    @endforeach

                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Perankingan') }}
            </h6>
            <hr>
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Metode TOPSIS') }}
            </h6>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 30px;">Nama</th>
                        <th class="text-center" style="width: 30px;">Hasil</th>
                        <th class="text-center" style="width: 30px;">Ranking</th>

                    </tr>

                </thead>
                <tbody>
                    @foreach ($alternatives as $alternative)
                    <tr>
                        <th class="text-left">{{ $alternative->name }}</th>
                        <td class="text-left">{{ $performanceScores[0][$alternative->id] }}</td>
                        <td class="text-center">{{ $ranking[$alternative->id] }}</td>
                    </tr>
                    @endforeach
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection