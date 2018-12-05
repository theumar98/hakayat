@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Categories <small>List</small>
                        <a href="/categories/create" class="btn btn-success btn-sm float-right">Create</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="15%">ID</th>
                                    <th scope="col" width="25%">Name</th>
                                    <th scope="col" width="25%">Description</th>
                                    <th scope="col" width="35%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $category)
                                    <tr>
                                        <th scope="row"> {{$category->id}}</th>
                                        <td> {{$category->name}}</td>
                                        <td> {{$category->description}}</td>
                                        <td>
                                            <a href="categories/category-related-posts/{{$category->id}}" class="btn btn-secondary btn-sm">View Posts</a>
                                            <a href="categories/edit/{{$category->id}}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="categories/delete/{{$category->id}}" class="btn btn-danger btn-sm">Delete</a>
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
