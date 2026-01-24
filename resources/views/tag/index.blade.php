@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tags</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tags</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-end">
                            <a class="btn btn-primary" href="{{ route('tag.create') }}">Create tag</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            @if (count($tags) === 0)
                                <h4 class="text-center my-4">No existing tags.</h2>
                            @else
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tags as $tag)
                                            <tr>
                                                <td>{{ $tag->id }}</td>
                                                <td><a href="{{ route('tag.show', $tag->id) }}">{{ $tag->title }}</a></td>
                                                <td class="d-flex justify-content-end" style="gap: 0.5rem;">
                                                    <a class="btn btn-primary" href="{{ route('tag.edit', $tag->id) }}">Edit</a>
                                                    <form action="{{ route('tag.delete', $tag->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>            
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection