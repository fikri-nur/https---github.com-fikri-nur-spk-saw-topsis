@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Matriks Nilai Dari Jurnal') }}
            </h6>
            <!-- <div class="ml-auto">
                    <a href="" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">{{ __('New Alternative') }}</span>
                    </a>
                </div> -->
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
                        <th class="text-center">{{ $criteria->code }}</a></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matrixes as $key => $row)
                    <tr>
                        <th class="text-center">A{{ $key + 0 }}</th>
                        <td class="text-center">{{ $row['1'] }}</td>
                        <td class="text-center">{{ $row['2'] }}</td>
                        <td class="text-center">{{ $row['3'] }}</td>
                        <td class="text-center">{{ $row['4'] }}</td>
                        <td class="text-center">{{ $row['5'] }}</td>
                        <td class="text-center">{{ $row['6'] }}</td>
                        <td class="text-center">{{ $row['7'] }}</td>
                        <td class="text-center">{{ $row['8'] }}</td>
                    </tr>
                    @endforeach
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection