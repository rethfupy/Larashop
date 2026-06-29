@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Order #{{ $order->id }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('order.index') }}">Orders</a></li>
                        <li class="breadcrumb-item active">Edit Order #{{ $order->id }}</li>
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
                        <div class="card-header d-flex" style="gap: 0.5rem;">
                            <h5 class="mb-0">Order information</h5>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>#{{ $order->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Total price</td>
                                        <td>{{ $order->total_price }} €</td>
                                    </tr>
                                    <tr>
                                        <td>Date</td>
                                        <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table> 
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <form action="{{ route('order.update', $order->id) }}" method="post" class="d-flex flex-column align-items-start">
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
                            <label>First name</label>
                            <input type="text" name="shipping_first_name" class="form-control @error('shipping_first_name') is-invalid @enderror" 
                                placeholder="First name" 
                                value="{{ old('shipping_first_name', $order->shipping_first_name) }}">
                        </div>

                        <div class="form-group w-100">
                            <label>Last name</label>
                            <input type="text" name="shipping_last_name" class="form-control @error('shipping_last_name') is-invalid @enderror" 
                                placeholder="Last name" 
                                value="{{ old('shipping_last_name', $order->shipping_last_name) }}">
                        </div>

                        <div class="form-group w-100">
                            <label>Email</label>
                            <input type="email" name="shipping_email" class="form-control @error('shipping_email') is-invalid @enderror" 
                                placeholder="Email" 
                                value="{{ old('shipping_email', $order->shipping_email) }}">
                        </div>

                        <div class="form-group w-100">
                            <label>Phone</label>
                            <input type="text" name="shipping_phone" class="form-control @error('shipping_phone') is-invalid @enderror" 
                                placeholder="Phone" 
                                value="{{ old('shipping_phone', $order->shipping_phone) }}">
                        </div>

                        <div class="form-group w-100">
                            <label>Country</label>
                            <input type="text" name="shipping_country" class="form-control @error('shipping_country') is-invalid @enderror" 
                                placeholder="Country" 
                                value="{{ old('shipping_country', $order->shipping_country) }}">
                        </div>

                        <div class="form-group w-100">
                            <label>State</label>
                            <input type="text" name="shipping_state" class="form-control @error('shipping_state') is-invalid @enderror" 
                                placeholder="State" 
                                value="{{ old('shipping_state', $order->shipping_state) }}">
                        </div>

                        <div class="form-group w-100">
                            <label>City</label>
                            <input type="text" name="shipping_city" class="form-control @error('shipping_city') is-invalid @enderror" 
                                placeholder="City" 
                                value="{{ old('shipping_city', $order->shipping_city) }}">
                        </div>

                        <div class="form-group w-100">
                            <label>Address line</label>
                            <input type="text" name="shipping_address_line" class="form-control @error('shipping_address_line') is-invalid @enderror" 
                                placeholder="Address line" 
                                value="{{ old('shipping_address_line', $order->shipping_address_line) }}">
                        </div>

                        <div class="form-group w-100">
                            <label>Address line 2</label>
                            <input type="text" name="shipping_address_line_2" class="form-control @error('shipping_address_line_2') is-invalid @enderror" 
                                placeholder="Address line 2" 
                                value="{{ old('shipping_address_line_2', $order->shipping_address_line_2) }}">
                        </div>

                        <div class="form-group w-100">
                            <label>Postal code</label>
                            <input type="text" name="shipping_postal_code" class="form-control @error('shipping_postal_code') is-invalid @enderror" 
                                placeholder="Postal code" 
                                value="{{ old('shipping_postal_code', $order->shipping_postal_code) }}">
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