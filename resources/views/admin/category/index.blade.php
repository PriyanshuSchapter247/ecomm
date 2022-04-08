@extends('layouts.admin')
<html>
<head></head>
<body style="margin-left: 20%">

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Category page</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
           <thead>
           <tr>
               <th>ID</th>
               <th>Name</th>
{{--               <th>User</th>--}}
               <th>Description</th>
               <th>Image</th>
               <th>Action</th>
           </tr>
           </thead>
            <tbody>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible">
                    <p>{{ $message }}</p>
{{--                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
                </div>
                @endif
{{--            @elseif ($message = Session::get('danger'))--}}
{{--                <div class="alert alert-danger alert-dismissible">--}}
{{--                    <p>{{ $message }}</p>--}}
{{--                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            @endif--}}
            @foreach($category as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
{{--                        <td>{{$item->users->name}}</td>--}}
                        <td>{{$item->description}}</td>
                        <td>
                            <img src="{{asset('assets/uploads/category/'.$item->image)}}"  class="w-15" alt="image here"> {{$item->image}}
                        </td>
                      <td>
                          <a  href="{{ url('edit-category/'.$item->id)}}" type="button" class="btn btn-primary">Edit</a>
                          <a href="{{ url('delete-category/'.$item->id)}}" type="button" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
            @endforeach


            </tbody>
            </table>
                 {!! $category->links() !!}
        </div>
    </div>
@endsection


</body>
</html>
