@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Edit Alternatif') }}
            </h6>
            <div class="ml-auto">
                <a href="{{ route('alternatif.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">{{ __('Back to Alternatif') }}</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('alternatif.update', $alternative) }}" method="POST">
                @csrf
                @method('put')
                <div class="row">
                <div class="col-1">
                        <div class="form-group">
                            <label for="code">Kode</label>
                            <input class="form-control" id="code" type="text" name="code"  value="{{ old('code', $alternative->code) }}">
                            @error('code')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" id="name" type="text" name="name" value="{{ old('name', $alternative->name) }}">
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="form-group pt-4">
                    <button class="btn btn-primary" type="submit" name="submit">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection