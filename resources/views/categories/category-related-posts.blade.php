@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Posts <small>List</small>
                        <div class="float-right">
                            <a href="/categories" class="btn btn-primary btn-sm">Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Category</th>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $post)
                                <tr>
                                    <th scope="row"> {{$post->id}}</th>
                                    <th scope="row"> {{$post->category->name}}</th>
                                    <td> <div class="title text-right">{{mb_strimwidth($post->title,0,50)}}</div></td>
                                    <td> <div class="content text-right">{{mb_strimwidth($post->content,0,80)}}</div></td>
                                    <td>
                                        <a href="/posts/detail/{{$post->id}}" class="btn btn-primary btn-sm">View</a>
                                        <a href="/posts/delete/{{$post->id}}" class="btn btn-danger btn-sm">Delete</a>
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
