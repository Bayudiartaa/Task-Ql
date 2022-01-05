@extends('layouts.main')
@section('title', 'ChangePassword')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <form action="{{ route('user-password.update', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Old Password</label>
                        <input type="password"  name="currentPassword" class="form-control @error('currentPassword') is-invalid @enderror" required="">
                        @error('currentPassword')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password"  type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" required=""/>
                        <span class="form-text text-muted">
                            Kata sandi Anda harus lebih dari 8 karakter, harus berisi setidaknya 1 Huruf Besar, 1 Huruf Kecil, 1 Angka dan 1 karakter khusus.
                        </span>
                        @error('new_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password"  type="password" name="confirm-password" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
