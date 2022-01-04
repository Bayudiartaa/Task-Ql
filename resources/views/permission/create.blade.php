@extends('layouts.main')

@section('title', 'Create Roles')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('permission.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Permission</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="Masukkan Nama Role">

                        @error('name')
                        <div class="invalid-feedback" style="display: block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary mr-1 btn-submit" type="submit">
                        <i class="fa fa-paper-plane"></i> Simpan
                    </button>
                    <button class="btn btn-warning mr-1 btn-reset" type="reset">
                        <i class="fa fa-redo"></i> Reset
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
