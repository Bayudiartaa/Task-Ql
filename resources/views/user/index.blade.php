@extends('layouts.main')
@section('title', 'User')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('user.create') }}" class="btn btn-primary">Create</a>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{!! session('success') !!}</div>
                @endif
                <div class="table responsive">
                    <table id="table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama user</th>
                                <th>Role</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @if(!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $role)
                                            <label class="badge badge-success text-center">
                                                {{ $role }}
                                            </label>
                                        @endforeach
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
