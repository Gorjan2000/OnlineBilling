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
                <div class="bg-white p-3 m-3">
                    <h1>Edit Company</h1>
                    <form action="{{route('company.update', $company->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input type="text" id="company_name" name="company_name" class="company_name form-control" size="50"
                                   value="{{$company->company_name}}" required>
                            <span id="SpanCname" class="error"></span>
                        </div>

                        <div class="form-group">
                            <label for="address">Location</label>
                            <input type="text" id="address" name="address" class="address form-control" size="50"
                                   value="{{$company->location}}" required>
                            <span id="SpanAddress" class="error"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" class="email form-control" size="50"
                                   value="{{$company->email}}">
                            <span id="SpanEmail" class="error" required></span>
                        </div>
                        <div class="form-group">
                            <label for="phone">Contact Number</label>
                            <input type="text" id="phone" name="phone" class="phone form-control" size="50"
                                   value="{{$company->phone}}">
                            <span id="SpanContact" class="error" required></span>
                        </div>
                        <button class="btn btn-outline-primary" type="submit" id="submit">Submit</button>
                    </form>
                </div>
            </div>

        @else
            <div class="container">
                <div class="bg-white p-3 m-3">
                    <h1>Create New Company</h1>
                    <form id="addPostForm" action="{{route('company.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input type="text" id="company_name" name="company_name" class="company_name form-control" size="50"
                                   value="{{@old('company_name')}}" required>
                        </div>
                        <span id="SpanCname" class="error"></span>

                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" id="location" name="location" class="location form-control" size="50"
                                   value="{{@old('location')}}" required>
                        </div>
                        <span id="SpanAddress" class="error"></span>

                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="text" id="Email" name="email" class="email form-control" size="50" value="{{@old('email')}}"
                            required>
                        </div>
                        <span id="SpanEmail" class="error" required></span>

                        <div class="form-group">
                            <label for="phone">Contact Number</label>
                            <input type="text" id="phone" name="phone" class="phone form-control" size="50" value="{{@old('phone')}}"
                            required>
                        </div>
                        <span id="SpanContact" class="error" required></span>

                        <button class="btn btn-outline-primary" type="submit" id="submit">Submit</button>
                    </form>
                </div>
            </div>
    </div>
    @endif
@endsection
@endcanany
