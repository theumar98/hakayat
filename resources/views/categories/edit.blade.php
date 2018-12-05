@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Categories <small>Edit</small>
                        <div class="float-right">
                            <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm ">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form  method="POST" class="edit-categories" action="{{url('/categories/update/'.$data->id)}}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="name">Name*</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ $data->name }}">
                                <small id="nameHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="description">Description*</label>
                                <input type="text" name="description" class="form-control" id="description" value="{{$data->description}}">
                                <small id="descriptionHelp" class="form-text text-muted"></small>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
