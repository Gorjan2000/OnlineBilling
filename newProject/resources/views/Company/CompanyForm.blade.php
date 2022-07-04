@extends('layouts.app')
@canany(['create_user', 'update_user'])
@section('CssSection')
    <link rel="stylesheet" type="text/css" href="{{asset('css/company.css')}}">
@endsection
@section('title') Company @endsection
@section('body')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('error_msg'))
        <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    <div class="testbox">
        @if (isset($company))
            <div class="container">
            <h1>Edit Company Details</h1>

            <form action="{{route('company.update', $company->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="company_name">Company Name</label><br>
                <input type="text" id="company_name" name="company_name" class="company_name" size="50"
                       value="{{$company->name}}" required><br>
                <span id="SpanCname" class="error"></span> <br>

                <label for="Address">Address</label><br>
                <input type="text" id="Address" name="address" class="address" size="50"
                       value="{{$company->location}}" required><br>
                <span id="SpanAddress" class="error"></span> <br>

                <label for="Email">Email</label><br>
                <input type="text" id="Email" name="email" class="email" size="50"
                       value="{{$company->email}}" required><br>
                <span id="SpanEmail" class="error"></span> <br>

                <label for="Contact">Contact number</label><br>
                <input type="text" id="Contact" name="phone" class="phone" size="50"
                       value="{{$company->number}}" required><br>
                <span id="SpanContact" class="error"></span><br>

                <button class="btn btn-outline-info" type="submit" id="submit">Submit</button>
            </form>
        </div>
        @else
            <div class="container">


            <h1>Create New</h1>

            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <form id="addPostForm" action="{{route('company.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="company_name">Company Name</label><br>
                    <input type="text" id="company_name" name="company_name" class="company_name" size="50"
                           value="{{@old('company_name')}}" required><br>
                    <span id="SpanCname" class="error"></span> <br>
                </div>


                <label for="Address">Address</label><br>
                <input type="text" id="Address" name="address" class="address" size="50"
                       value="{{@old('address')}}" required><br>
                <span id="SpanAddress" class="error"></span> <br>

                <label for="Email">Email</label><br>
                <input type="text" id="Email" name="email" class="email" size="50" value="{{@old('email')}}"><br>
                <span id="SpanEmail" class="error" required></span> <br>

                <label for="Contact">Contact Number</label><br>
                <input type="text" id="Contact" name="phone" class="phone" size="50" value="{{@old('phone')}}"><br>
                <span id="SpanContact" class="error" required></span><br>

                <button class="btn btn-outline-info" type="submit" id="submit">Submit</button>
            </form>
            </div>
    </div>
    @endif
@endsection
@endcanany
