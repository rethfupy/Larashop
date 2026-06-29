@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Orders</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Orders</li>
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
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            @if (count($orders) === 0)
                                <h4 class="text-center my-4">No existing orders.</h2>
                            @else
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First name</th>
                                            <th>Last name</th>
                                            <th>Total Price</th>
                                            <th>Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->shipping_first_name }}</td>
                                                <td>{{ $order->shipping_last_name }}</td>
                                                <td>{{ $order->total_price }} €</td>
                                                <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                                                <td class="d-flex align-items-center justify-content-end">
                                                    <a class="btn" href="{{ route('order.show', $order->id) }}">
                                                        <i class="fas fa-eye text-dark"></i>
                                                    </a>
                                                    <a class="btn" href="{{ route('order.edit', $order->id) }}">
                                                        <i class="fas fa-edit text-dark"></i>
                                                    </a>
                                                    <form action="{{ route('order.delete', $order->id) }}" method="post">
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