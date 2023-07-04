@extends('layouts.admin')

@section('content')
<div class="container">

    <!-- Tampilkan pesan sukses jika ada -->
    @if(session('success'))
    <div class="alert alert-primary">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(session('pesan'))
    <div class="alert alert-warning">
        {{ session('pesan') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Tabel Tiap Alternatif Dari Setiap Kriteria') }}
            </h6>
            <div class="ml-auto">

                @if ($matrices->whereNull('nilai_keputusan')->count() > 0)
                <a href="{{ route('konversi') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-spinner"></i>
                    </span>
                    <span class="text">{{ __('Konversi Nilai Keputusan') }}</span>
                </a>
                @else
                <a href="{{ route('process') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-spinner"></i>
                    </span>
                    <span class="text">{{ __('Proses Perhitungan') }}</span>
                </a>
                @endif

                <a href="{{ route('tabel.create') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">{{ __('New Data') }}</span>
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Alternatif</th>
                        <th>Kode Kriteria</th>
                        <th>Nilai Asli</th>
                        <th>Nilai Keputusan</th>
                        <th class="text-center" style="width: 30px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $page = request()->has('page') ? request('page') : 1;
                    $perPage = $matrices->perPage();
                    $startIndex = ($page - 1) * $perPage + 1;
                    @endphp

                    @forelse($matrices as $index => $matrix)
                    <tr>
                        <td>{{ $startIndex + $index }}</td>
                        <td>{{ $matrix->alternative->code }}</td>
                        <td>{{ $matrix->criteria->code }}</td>
                        <td>{{ $matrix->value }}</td>
                        <td>{{ $matrix->nilai_keputusan }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('tabel.edit', $matrix->id)  }}" class="btn btn-sm btn-primary mr-1">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form onclick="return confirm('Kamu yakin ingin menghapus data ini?')" action="{{ route('tabel.destroy', $matrix->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="12">Data tidak ditemukan</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="12">
                            <div class="float-right">
                                {!! $matrices->appends(request()->all())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection