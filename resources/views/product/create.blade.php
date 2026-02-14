@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
                        <li class="breadcrumb-item active">Create</li>
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
                    <form action="{{ route('product.store') }}" method="post" class="d-flex flex-column align-items-start w-50" enctype="multipart/form-data">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger w-100">
                                <strong>Please fix the following errors:</strong>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group w-100">
                            <label for="title" class="form-label">Product's name</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter product's name" required value="{{ old('title') }}">
                        </div>
                        <div class="form-group w-100">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" placeholder="Enter description">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group w-100">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" class="form-control" placeholder="Enter content">{{ old('content') }}</textarea>
                        </div>
                        <div class="form-group w-100">
                            <label for="exampleInputFile" class="form-label">Add preview image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_image" id="preview_image">
                                    <label class="custom-file-label" for="preview_image">Choose image</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group w-100">
                            <label for="exampleInputFile" class="form-label">Add product images (up to 3)</label>
                            <div class="d-flex flex-column" style="gap: 1rem;">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="product_images[]">
                                        <label class="custom-file-label" for="product_images[]">Choose image</label>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="product_images[]">
                                        <label class="custom-file-label" for="product_images[]">Choose image</label>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="product_images[]">
                                        <label class="custom-file-label" for="product_images[]">Choose image</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group w-100">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" placeholder="Enter price" min="0" value="{{ old('price') }}" step="0.01" required>
                        </div>
                        <div class="form-group w-100">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" name="stock" class="form-control" placeholder="Enter stock" min="0" value="{{ old('stock') }}" required>
                        </div>
                        <div class="form-group w-100">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" class="form-control" required>
                                <option value="">---</option>
                                @foreach ($categories as $category)
                                    <option {{ old('category') == $category->id ? ' selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group w-100">
                            <label>Select tags</label>
                            <select class="select2 w-full" name="tags[]" multiple="multiple" data-placeholder="Tags" style="width: 100%">
                                @foreach ($tags as $tag) 
                                    <option value="{{ $tag->id }}" {{ is_array(old('tags')) && in_array($tag->id, old('tags')) ? ' selected' : '' }}>{{ $tag->title }}</option>
                                @endforeach                                                               
                            </select>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="is_published" value="1">
                            <label class="form-check-label" for="is_published">Publish product</label>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary px-4" type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection