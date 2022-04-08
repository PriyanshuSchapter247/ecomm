@extends('layouts.admin')
<html>
<head></head>
<body style="margin-left: 20%">

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Product list</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Selling Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible">
                        <p>{{ $message }}</p>
{{--                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                                                <span aria-hidden="true">&times;</span>--}}
{{--                                            </button>--}}
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
{{--                @if(!empty($products) && $products->count())--}}
                @foreach($products as $item)
                            <tr>
                                <td>{{$item->id}}</td>
{{--                                <td>{{$item->category->name}}</td>--}}
                                <td>{{$item->name}}</td>
                                <td>{{$item->selling_price}}</td>


                                <td>
                                    <img src="{{asset('assets/uploads/products/'.$item->image)}}"  class="w-15" alt="image here"> {{$item->image}}
                                </td>
                                <td>
                                    <a  href="{{url('edit-product/',$item->id)}}" type="button" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ url('delete-products/'.$item->id)}}" type="button" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
{{--                @endif--}}
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {!! $products->links() !!}
@endsection

</body>
</html>
