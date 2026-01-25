@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create user</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a></li>
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
                    <form action="{{ route('user.store') }}" method="post" class="d-flex flex-column align-items-start w-50">
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
                            <label for="name" class="form-label">First name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter first name" required value="{{ old('name') }}">
                        </div>
                        <div class="form-group w-100">
                            <label for="surname" class="form-label">Surname</label>
                            <input type="text" name="surname" class="form-control" placeholder="Enter surname" value="{{ old('surname') }}">
                        </div>
                        <div class="form-group w-100">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" required value="{{ old('email') }}">
                        </div>
                        <div class="form-group w-100">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" name="age" class="form-control" placeholder="Enter age" min="1" max="150" value="{{ old('age') }}">
                        </div>
                        <div class="form-group w-100">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Enter address" value="{{ old('address') }}">
                        </div>
                        <div class="form-group w-100">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-control" name="gender">
                                @foreach(\App\Enums\Gender::cases() as $gender)
                                    <option value="{{ $gender->value }}" 
                                        {{ old('gender') == $gender->value ? 'selected' : '' }}>
                                        {{ $gender->label() }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group w-100">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password">
                        </div>
                        <div class="form-group w-100">
                            <label for="address" class="form-label">Confirm password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Enter password">
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