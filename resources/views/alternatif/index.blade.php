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
                {{ __('Alternatif') }}
            </h6>
            <div class="ml-auto">
                <a href="{{ route('alternatif.create') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">{{ __('New Alternative') }}</span>
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
                        <th class="text-center" style="width: 30px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($alternatives as $alternative)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $alternative->code }}</a></td>
                        <td>{{ $alternative->name }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('alternatif.edit', $alternative->id)  }}" class="btn btn-sm btn-primary mr-1">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form onclick="return confirm('Kamu yakin ingin menghapus alternatif ini?')" action="{{ route('alternatif.destroy', $alternative->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="12">Alternatif tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="12">
                            <div class="float-right">
                                {!! $alternatives->appends(request()->all())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection