@extends('layouts.admin')
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="margin-left: 30%">

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Category</h4>
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
            <form method="post" class="float-sm-left" action="{{url('update-category/'.$category->id)}}" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="col-md-6 mb-3" >
                    <label for="">Name</label>
                    <input type="text" value="{{$category->name}}" class="form-control" name="name">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>


                <div class="col-md- mb-3">
                    <label for="">Description</label>
                    <textarea type="text"  value="{{$category->description}}" class="form-control" name="description"></textarea>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" {{$category->status == "1" ? 'checked' : ''}} class="form-control" name="status">
                    @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Popular</label>
                    <input type="checkbox" {{$category->popular == "1" ? 'checked' : ''}} class="form-control" name="popular">
                    @error('popular')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" value="{{$category->meta_title}}" class="form-control" name="meta_title">
                    @error('meta_title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea type="text" value="{{$category->meta_descrip}}" class="form-control" name="meta_descrip"></textarea>
                    @error('meta_descrip')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea type="text" value="{{$category->meta_keywords}}" class="form-control" name="meta_keywords"></textarea>
                    @error('meta_keywords')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
@if($category->image)
    <img src="{{assets('assets/uploads/category/'.$category->image)}}" alt=" category image" >
                <div class="col-md-12">
                    <input type="file"  class="form-control" name="image">
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
@endif
                <div class="col-md-10">
                    <button type="submit"  class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
    </div>


@endsection
</html>
</body>
