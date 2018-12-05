@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Categories <small>List</small></div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $category)
                                <tr>
                                    <th scope="row"> {{$category->id}}</th>
                                    <td> {{$category->name}}</td>
                                    <td> {{$category->description}}</td>
                                    <td>
                                        <a href="category-posts/{{ $category->id }}" class="btn btn-primary btn-sm">View Posts</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
