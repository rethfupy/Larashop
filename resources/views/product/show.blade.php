@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $product->title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
                        <li class="breadcrumb-item active">{{ $product->title }}</li>
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
                        <div class="card-header d-flex justify-content-end" style="gap: 0.5rem;">
                            <a class="btn btn-primary" href="{{ route('product.edit', $product->id) }}">Edit product</a>
                            <form action="{{ route('product.delete', $product->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $product->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Title</td>
                                        <td>{{ $product->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>{{ $product->description }}</td>
                                    </tr>
                                    <tr>
                                        <td>Category</td>
                                        <td>{{ $product->category->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td>{{ $product->price }}</td>
                                    </tr>
                                    <tr>
                                        <td>Stock</td>
                                        <td>{{ $product->stock }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tags</td>
                                        <td>
                                            @foreach ($product->tags as $tag)
                                                {{ $tag->title }}
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        @if ($product->preview_image)
                            <div class="card-body p-4 w-25">
                                <h4>Preview image</h4>
                                <img src="{{ asset('storage/' . $product->preview_image) }}" alt="preview_image" class="w-100 rounded">
                            </div>
                            <!-- /.card-body -->
                        @endif
                        
                        @if ($product->content)
                            <div class="card-body p-4">
                                <h4>Content</h4>
                                <div>{!! $product->content !!} </div>
                            </div>
                            <!-- /.card-body -->
                        @endif
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection