@extends('layouts.admin')
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="margin-left: 30%">

@section('content')
    <div class="card">
        <div class="card-header">
        <h4>Add Category</h4>
        </div>
        <div class="card-body">

         <form method="post" class="float-sm-left" action="{{url('insert-category')}}" enctype="multipart/form-data">
 @csrf
             <div class="col-md-6 mb-3" >
                 <label for="">Name</label>
                 <input type="text" class="form-control" name="name"> </input>
                 @error('name')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror

             </div>

{{--             <div class="col-md-6 mb-3">--}}
{{--                 <label for="">Slug</label>--}}
{{--                 <input type="text" class="form-control" name="slug">--}}
{{--             </div>--}}

             <div class="col-md- mb-3">
                 <label for="">Description</label>
                 <textarea type="text" class="form-control" name="description"></textarea>
                 @error('description')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>

             <div class="col-md-6 mb-3">
                 <label for="">Status</label>
                 <input type="checkbox" class="form-control" name="status">
                 @error('status')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>

             <div class="col-md-6 mb-3">
                 <label for="">Popular</label>
                 <input type="checkbox" class="form-control" name="popular">
                 @error('popular')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>

             <div class="col-md-12 mb-3">
                 <label for="">Meta Title</label>
                 <input type="text" class="form-control" name="meta_title">
                 @error('meta_title')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>

             <div class="col-md-12 mb-3">
                 <label for="">Meta Description</label>
                 <textarea type="text" class="form-control" name="meta_descrip"></textarea>
                 @error('meta_descrip')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>

             <div class="col-md-12 mb-3">
                 <label for="">Meta Keywords</label>
                 <textarea type="text" class="form-control" name="meta_keywords"></textarea>
                 @error('meta_keywords')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>

                    <div class="col-md-12">
                        <input type="file" class="form-control" name="image">
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

             <div class="col-md-10">
                 <button type="submit" class="btn btn-primary">Submit</button>
             </div>

         </form>
        </div>
    </div>


@endsection
</html>
</body>
