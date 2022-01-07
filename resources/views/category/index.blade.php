@extends('layouts.main')
@section('title', 'Kategori')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="form-group">
                    @can('categories.create')
                    <a href="{{ route('category.create') }}" class="btn btn-primary">Create</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{!! session('success') !!}</div>
                @endif
                <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Nama Category</th>
                                <th>Created At</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td class="text-center">
                                    @can('categories.edit')
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success">Edit</a>
                                    @endcan
                                    @can('categories.delete')
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline">
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
