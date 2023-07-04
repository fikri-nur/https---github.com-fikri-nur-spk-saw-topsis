@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Create Data') }}
            </h6>
            <div class="ml-auto">
                <a href="{{ route('tabel.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">{{ __('Back to Data') }}</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('tabel.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="rowNo_alternatif">Kode Alternatif</label>
                            <select name="rowNo_alternatif" id="rowNo_alternatif" class="form-control">
                                @foreach ($alternatives as $alternative)
                                <option value="{{ $alternative->id }}">
                                    {{ $alternative->code }}
                                </option>
                                @endforeach
                            </select>
                            @error('rowNo_alternatif')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label for="colNo_kriteria">Kode Kriteria</label>
                            <select name="colNo_kriteria" id="colNo_kriteria" class="form-control">
                                @foreach ($criterias as $criteria)
                                <option value="{{ $criteria->id }}">
                                    {{ $criteria->code }}
                                </option>
                                @endforeach
                            </select>
                            @error('colNo_kriteria')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="form-group">
                            <label for="value">Nilai Asli</label>
                            <input class="form-control" id="value" type="number" name="value" value="" step="any" required>
                            @error('value')<span class="text-danger">{{ $message }}</span>@enderror
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