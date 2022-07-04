@extends('layouts.app')
@can('manage_role')
@section('CssSection')
    <link href="{{ asset('css/UserLayout.css') }}" rel="stylesheet">
@endsection
@section('title') User @endsection
@section('body')
    <div class="container">
    @if (session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
    @endif
    @if (session('error_msg'))
        <div class="alert alert-success">{{session('msg')}}</div>
    @endif
        <button class="btn btn-primary text-white"><a class="text-white" style="text-decoration: none" href="{{route('role.create')}}">Add New Role</a></button>
<br/>
        <hr/>

    <table class="table table-hover">
        <thead>
        <tr>
            <th class="text-center">SN</th>
            <th class="text-center">Roles</th>
            <th class="text-center">Permissions</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>

        </tr>
        </thead>
        <tbody>
        <?php $index = 1;?>
        @foreach($result as $role)
            <tr>
                <td class="text-center">{{$index}}</td>
                <td class="text-center">{{$role->name}}</td>
                <td class="text-center">@foreach($role->permissions as $rp)
                        @if ($rp['pivot']['role_id']===$role->id)
                            {{$rp['name']}}
                            <br>
                        @endif
                    @endforeach</td>
                <td class="text-center">
                    <a class="fa fa-edit" href="{{route('role.edit', $role->id)}}"></a>
                </td>
                <td class="text-center">
                    <form action="{{url('role/'.$role->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="fa fa-trash"></button>
                    </form>
                </td>
            </tr>

            <?php $index++;?>
        @endforeach
        </tbody>
    </table>
        <hr/>
    </div>
@endsection
@endcan
