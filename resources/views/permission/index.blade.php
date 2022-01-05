@extends('layouts.main')

@section('title', 'Permissions')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                @can('permissions.create')
                <a href="{{ route('permission.create') }}" class="btn btn-primary">Create</a>
                @endcan
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
                                <th>Nama Permissions</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $permission->name }}</td>
                                <td class="text-center">
                                    @can('permissions.edit')
                                    <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-success">Edit</a>
                                    @endcan
                                    @can('permissions.delete')
                                    <form action="{{ route('permission.destroy', $permission->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">Delete</button>
                                    </form>
                                    @endcan
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

