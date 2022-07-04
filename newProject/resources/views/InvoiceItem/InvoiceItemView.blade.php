@extends('layouts.app')
@if (session('status'))
    <div class="alert alert-success">{{session('status')}}</div>
@endif
@section('CssSection')
    <link href="{{ asset('css/UserLayout.css') }}" rel="stylesheet">
@endsection
@section('body')
    <div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <button class="btn btn-primary text-white"><a class="text-white" style="text-decoration: none" href="{{route('invoice.create')}}">Add New Invoice</a></button>
    <br/>
    <hr/>

    <div id="invoice_details">
        <table class="table table-hover" id="myTable">
            <thead>
            <tr>
                <th scope="col" class="page_sort" id="id">S No.</th>
                <th scope="col" class="page_sort" id="invoice">Invoice</th>
                <th scope="col" class="page_sort" id="comintent">Comintent</th>
                <th scope="col" class="page_sort" id="name">Company</th>
                <th scope="col">View</th>
                @canany(['update_invoice', 'delete_invoice'])
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                @endcanany
            </tr>
            </thead>
            <tbody id="invoice_details_table">
            <?php $index=1;?>
            @foreach($invoice as $v)

                <tr>
                    <td >{{$index}}</td>
                    <td >Invoice{{$v->id}}</td>
                    <td >{{$v->comintent}}</td>
                    <td >{{$v->company->name}}</td>
                    <td><a class="fa fa-eye" href="{{route('invoice.show', $v->id)}}"></a></td>
                    @canany(['update_invoice', 'delete_invoice'])
                        <td><a class="fa fa-edit" href="{{route('invoice.edit', $v->id)}}"></a></td>
                        <td>
                            <form action="{{route('invoice.destroy', $v->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fa fa-trash"></button>
                            </form>>
                        </td>
                    @endcanany
                </tr>
                <?php $index++;?>
            @endforeach
            </tbody>
        </table>
        <br/>
        <hr/>

    </div>
    </div>

@endsection
