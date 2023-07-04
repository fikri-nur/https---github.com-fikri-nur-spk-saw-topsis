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
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Kriteria') }}
            </h6>
            <div class="ml-auto">
                <a href="{{ route('kriteria.create') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">{{ __('New Criteria') }}</span>
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Code</th>
                        <th>Nama</th>
                        <th>Bobot</th>
                        <th>Type</th>
                        <th class="text-center" style="width: 30px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($criterias as $criteria)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $criteria->code }}</a></td>
                        <td>{{ $criteria->name }}</td>
                        <td>{{ $criteria->bobot }}</td>
                        <td>{{ $criteria->type }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('kriteria.edit', $criteria->id)  }}" class="btn btn-sm btn-primary mr-1">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form onclick="return confirm('Kamu yakin ingin menghapus kriteria ini?')" action="{{ route('kriteria.destroy', $criteria->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="12">Kriteria tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="12">
                            <div class="float-right">
                                {!! $criterias->appends(request()->all())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection