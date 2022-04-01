@extends('layouts.admin')
<html>
<head></head>
<body style="margin-left: 20%">

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>User Details</h4>
                    <a href="{{url('users')}}" class="btn btn-primary btn-sm float-right">Back</a>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-4">
                            <label class="">Role</label>
                            <div class="p-2 border">{{$users->role_as == '0' ? 'User':'Admin'}}</div>
                        </div>

                        <div class="col-md-4">
                            <label class="">Name</label>
                            <div class="p-2 border">{{$users->name}}</div>
                        </div>
                        <div class="col-md-4">
                            <label class="">Email</label>
                            <div class="p-2 border">{{$users->email}}</div>
                        </div>

{{--                        <div class="col-md-4">--}}
{{--                            <label class="">Number</label>--}}
{{--                            <div class="p-2 border">{{$users->number}}</div>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-4">--}}
{{--                            <label class=""></label>--}}
{{--                            <div class="p-2 border">{{$users->name}}</div>--}}
{{--                        </div>--}}
{{--                        --}}
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
</body>
</html>
