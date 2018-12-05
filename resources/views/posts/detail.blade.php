@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Posts <small>Detail</small>
                        <div class="float-right">
                            <a href="/posts" class="btn btn-primary btn-sm ">All Posts</a>
                            <a href="/categories/category-related-posts/{{ $data->category->id }}" class="btn btn-primary btn-sm ">Related Category Posts</a>
                            <a href="/posts/edit/{{ $data->id }}" class="btn btn-secondary btn-sm">Edit</a>
                        </div>
                    </div>

                    <div class="card-body text-right">
                            <h4 class="card-title">
                                {{ $data->title }}
                            </h4>
                            <h5 class="card-title">
                                {{ $data->category->name }}
                            </h5>
                            <div class="card-text">
                                <p>{!!nl2br(str_replace("<br/>", "<br />", $data->content))!!}</p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
