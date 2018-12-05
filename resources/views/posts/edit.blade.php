@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Post <small>Edit</small>
                        <div class="float-right">
                            <a href="/posts/detail/{{$data['post']->id}}" class="btn btn-primary btn-sm ">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form  method="POST" class="add-posts" action="{{url('/posts/update/'.$data['post']->id)}}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="title">Title*</label>
                                <input type="text" name="title" class="form-control text-right" id="title" value="{{$data['post']->title}}">
                                <small id="nameHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="title">Category*</label>
                                <select name="category" id="category" class="form-control">
                                    @foreach($data['category_names'] as $category_name)
                                        @if ($data['post']->category_id == $category_name->id )
                                            <option value="{{ $data['post']->category_id}}" selected>
                                                    {{$category_name->name}}
                                            </option>
                                        @else
                                            <option value="{{$category_name->id}}">
                                                {{$category_name->name}}
                                            </option>
                                        @endif

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="content">Content*</label>
                                <textarea name="content" id="content" class="form-control text-right" cols="30" rows="10">
                                    {{$data['post']->content}}
                                </textarea>
                                <small id="contentHelp" class="form-text text-muted"></small>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
