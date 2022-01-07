@extends('layouts.main')
@section('title', 'Posts')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                @can('posts.create')
                <a href="{{ route('post.create') }}" class="btn btn-primary">Create</a>
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
                                <th>Title</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>
                                    <img src="{{ asset('assets/img/image/'.$post->image) }}" class="img-thumbnail" alt="image" style="width: 150px">
                                </td>
                                <td>{{ $post->description }}</td>
                                <td class="text-center">
                                    @can('posts.edit')
                                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-success">Edit</a>
                                    @endcan
                                    @can('posts.delete')
                                    <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="d-inline">
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



