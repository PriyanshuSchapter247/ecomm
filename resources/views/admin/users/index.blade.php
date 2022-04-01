@extends('layouts.admin')
<html>
<head></head>
<body style="margin-left: 20%">

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Registered Users</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th> User Roll</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item-> role_as}}</td>
                        <td>
                            <a  href="{{url('view-users/',$item->id)}}" type="button" class="btn btn-primary btn-sm">View</a>
{{--                            <a  href="{{url('edit-product/',$item->id)}}" type="button" class="btn btn-primary btn-sm">Edit</a>--}}
{{--                            <a href="{{ url('delete-products/'.$item->id)}}" type="button" class="btn btn-danger btn-sm">Delete</a>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

</body>
</html>
