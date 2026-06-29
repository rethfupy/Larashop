@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Order #{{ $order->id }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('order.index') }}">Orders</a></li>
                        <li class="breadcrumb-item active">Order #{{ $order->id }}</li>
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
                            <a class="btn btn-primary" href="{{ route('order.edit', $order->id) }}">Edit order</a>
                            <form action="{{ route('order.delete', $order->id) }}" method="post">
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

                    <div class="card">
                        <div class="card-header d-flex" style="gap: 0.5rem;">
                            <h5 class="mb-0">Shipping information</h5>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <td>First name</td>
                                        <td>{{ $order->shipping_first_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Last name</td>
                                        <td>{{ $order->shipping_last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $order->shipping_email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td>{{ $order->shipping_phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Country</td>
                                        <td>{{ $order->shipping_country }}</td>
                                    </tr>
                                    <tr>
                                        <td>State</td>
                                        <td>{{ $order->shipping_state }}</td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td>{{ $order->shipping_city }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address line</td>
                                        <td>{{ $order->shipping_address_line }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address line 2</td>
                                        <td>{{ $order->shipping_address_line_2 }}</td>
                                    </tr>
                                    <tr>
                                        <td>Postal code</td>
                                        <td>{{ $order->shipping_postal_code }}</td>
                                    </tr>
                                </tbody>
                            </table> 
                        </div>
                        <!-- /.card-body -->
                    </div>

                    @if(count($order->items) > 0)
                        <div class="card">
                            <div class="card-header d-flex" style="gap: 0.5rem;">
                                <h5 class="mb-0">Order information</h5>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Unit Price</th>
                                            <th>Qty</th>
                                            <th>Final price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->items as $item)
                                        <tr>
                                            <td>{{ $item->product->title }}</td>
                                            <td>{{ $item->price }} €</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->price * $item->qty }} €</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table> 
                            </div>
                            <!-- /.card-body -->
                        </div>
                    @endif
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection