@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
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
                    <form action="{{ route('product.update', $product->id) }}" method="post" class="d-flex flex-column align-items-start w-50" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

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
                            <input type="text" name="title" class="form-control" placeholder="Enter product's name" required value="{{ old('title') ?? $product->title }}">
                        </div>
                        <div class="form-group w-100">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" placeholder="Enter description">{{ old('description') ?? $product->description }}</textarea>
                        </div>
                        <div class="form-group w-100">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" class="form-control" placeholder="Enter content">{{ old('content') ?? $product->content }}</textarea>
                        </div>
                        <div class="form-group w-100">        
                            @if ($product->preview_image)
                                <label for="exampleInputFile" class="form-label">Change preview image</label>
                                <div class="w-25 mb-2">
                                    <img src="{{ asset('storage/' . $product->preview_image) }}" alt="preview_image" class="w-100 rounded">
                                </div>
                            @else
                                <label for="exampleInputFile" class="form-label">Add preview image</label>
                            @endif
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_image" id="preview_image">
                                    <label class="custom-file-label" for="preview_image">Choose image</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group w-100">
                            <label class="form-label">Product Images</label>
                            @if($product->images->count() > 0)
                                <div class="mb-3">
                                    <div class="d-flex flex-wrap" style="gap: 1rem;">
                                        @foreach($product->images as $image)
                                            <div class="position-relative" style="width: 150px;">
                                                <div class="w-100 rounded" 
                                                    style="height: 150px; background-repeat: no-repeat; background-position: center; background-size: cover; background-image: url('{{ asset('storage/' . $image->image_path) }}');">
                                                </div>
                                                <div class="mt-2">
                                                    <label class="d-flex align-items-center">
                                                        <input 
                                                            type="checkbox" 
                                                            name="delete_images[]" 
                                                            value="{{ $image->id }}"
                                                            class="mr-2"
                                                        >
                                                        <span class="text-danger small">Delete this image</span>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <label class="d-block mb-2">Add more images:</label>
                            @endif
                            
                            <div class="d-flex flex-column" style="gap: 1rem;">
                                @for($i = 0; $i < 3; $i++)
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input 
                                                type="file" 
                                                class="custom-file-input" 
                                                name="product_images[]"
                                                accept="image/*"
                                            >
                                            <label class="custom-file-label">Upload new image</label>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>                        
                        <div class="form-group w-100">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" placeholder="Enter price" min="0" value="{{ old('price') ?? $product->price }}" required>
                        </div>
                        <div class="form-group w-100">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" name="stock" class="form-control" placeholder="Enter stock" min="0" value="{{ old('stock') ?? $product->stock }}" required>
                        </div>
                        <div class="form-group w-100">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" class="form-control" required>
                                <option value="">---</option>
                                @foreach ($categories as $category)
                                    <option {{ (old('category_id') ?? $product->category_id) == $category->id ? ' selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group w-100">
                            <label>Select tags</label>
                            <select class="select2 w-full" name="tags[]" multiple="multiple" data-placeholder="Tags" style="width: 100%">
                                @foreach ($tags as $tag) 
                                    <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $product->tags->pluck('id')->toArray())) ? 'selected' : '' }}>{{ $tag->title }}</option>
                                @endforeach                                                               
                            </select>
                        </div>
                        <div class="form-group form-check">
                            <input type="hidden" name="is_published" value="0">
                            <input type="checkbox" class="form-check-input" name="is_published" value="1" {{ old('is_published', $product->is_published) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_published">Publish product</label>
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