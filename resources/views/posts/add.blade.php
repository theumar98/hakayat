@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Posts <small>create</small>
                        <div class="float-right">
                            <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm ">Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form  method="POST" class="add-posts" action="{{url('/posts/store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title*</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="{{ old('title') }}">
                                <small id="nameHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="title">Category*</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="0">Select</option>
                                    @foreach($category_names as $category_name)
                                        <option value="{{$category_name->id}}">{{ $category_name->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="content">Content*</label>
                                <textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
                                <small id="contentHelp" class="form-text text-muted"></small>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
