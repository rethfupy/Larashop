@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Products</li>
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
                            <a class="btn btn-primary" href="{{ route('product.create') }}">Create product</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            @if (count($products) === 0)
                                <h4 class="text-center my-4">No existing products.</h2>
                            @else
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th class="text-center">Published</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->title }}</td>
                                                <td>{{ $product->category->title }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td class="text-center">
                                                    <i class="fas fa-circle {{ $product->is_published == 1 ? ' text-success' : ' text-danger' }}"></i>
                                                </td>
                                                <td class="d-flex align-items-center justify-content-end">
                                                    <a class="btn" href="{{ route('product.show', $product->id) }}">
                                                        <i class="fas fa-eye text-dark"></i>
                                                    </a>
                                                    <a class="btn" href="{{ route('product.edit', $product->id) }}">
                                                        <i class="fas fa-edit text-dark"></i>
                                                    </a>
                                                    <form action="{{ route('product.delete', $product->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn">
                                                            <i class="fas fa-trash text-danger"></i>
                                                        </button>
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