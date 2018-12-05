@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Posts <small>Detail</small>
                        <div class="float-right">
                            <a href="/" class="btn btn-primary btn-sm ">Categories</a>
                            <a href="{{ URL::previous() }}" class="btn btn-secondary btn-sm ">Back</a>
                        </div>
                    </div>

                    <div class="card-body text-right">
                        <h5 class="card-title">
                            {{ $data->title }}
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
