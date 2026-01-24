@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit tag</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('tag.index') }}">Tags</a></li>
                        <li class="breadcrumb-item active">Edit</li>
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
                    <form action="{{ route('tag.update', $tag->id) }}" method="post" class="d-flex flex-column align-items-start w-50">
                        @csrf
                        @method('patch')
                        <div class="form-group w-100">
                            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $tag->title }}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary px-4" type="submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>            
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection