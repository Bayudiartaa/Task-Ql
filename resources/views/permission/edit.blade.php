@extends('layouts.main')
@section('title', 'Permission')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('permission.update', $permission->id) }}" method="post" enctype="multipart/form">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Permission</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $permission->name) }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group float-right">
                        <a href="{{ route('category.index') }}" class="btn btn-danger">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
