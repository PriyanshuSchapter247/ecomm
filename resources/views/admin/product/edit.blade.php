@extends('layouts.admin')
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="margin-left: 30%">

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Update Product</h4>
        </div>
        <div class="card-body">
{{--            @if ($errors->any())--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div><br />--}}
{{--            @endif--}}
            <form method="post"  action="{{url('update-product/',$products->id)}}" enctype="multipart/form-data">
                @method=('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Category</label>
                        <select class="form-select" >
                            <option value="select a category" > {{$products->category->name}}</option></select>

                    </div>

                    <div class="col-md-12">

                    </div>
                    <div class="col-md-6 mb-3" >
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{$products->name}}" name="name"> </input>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

{{--                    <div class="col-md-6 mb-3">--}}
{{--                        <label for="">Slug</label>--}}
{{--                        <input type="text" class="form-control" value="{{$products->slug}}" name="slug">--}}
{{--                    </div>--}}
                    <div class="col-md- mb-3">
                        <label for=""> Small Description</label>
                        <textarea type="text" class="form-control"  {{$products->small_description}} name="small_description"></textarea>
                        @error('small_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md- mb-3">
                        <label for="">Description</label>
                        <textarea type="text" class="form-control" {{$products->description}} name="description"></textarea>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" class="form-control" value="{{$products->original_price}}" name="original_price">
                        @error('original_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-md-6 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" value="{{$products->selling_price}}" name="selling_price">
                        @error('selling_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" value="{{$products->qty}}" name="qty">
                        @error('qty')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Tax</label>
                        <input type="number" class="form-control" value="{{$products->taxsss}}" name="taxsss">
                        @error('taxsss')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" class="form-control" value="{{$products->status == "1" ? 'checked':''}}" name="status">
                        @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox" class="form-control" {{$products->trending = "1" ? 'checked':''}} name="trending">
                        @error('trending')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" {{$products->meta_title}} name="meta_title">
                        @error('meta_title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea type="text" class="form-control" {{$products->meta_descrip}} name="meta_descrip"></textarea>
                        @error('meta_descrip')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea type="text" class="form-control" {{$products->meta_keywords}} name="meta_keywords"></textarea>
                        @error('meta_keywords')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
            @if($products->image)
                <img src="{{asset('assets/uploads/products/'.$products->image)}}" alt="">
                    <div class="col-md-12">
                        <input type="file" class="form-control" value="{{$products->image}}" name="image">
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-10">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
</html>
</body>
