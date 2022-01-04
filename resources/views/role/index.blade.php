@extends('layouts.main')

@section('title', 'Role')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('role.create') }}" class="btn btn-primary">Create</a>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{!! session('success') !!}</div>
                @endif
                <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Role</th>
                                <th>Permissions</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @foreach($roles as $role)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @foreach ($role->getPermissionNames() as $permission)
                                    <button class="btn btn-sm btn-success mb-1 mt-1 mr-1">
                                        {{ $permission }}
                                    </button>
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('role.edit', $role->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('role.destroy', $role->id) }}" method="POST" class="d-inline">
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
@section('script')
<script>
    $(document).ready(function() {
        $("#table").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
@endsection
