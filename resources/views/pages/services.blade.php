
@extends('layouts.app')

@section('title', '| Show Case')

@section('content')
    <div class="blog-header">
        <h1 class="blog-title">Show Case</h1>
    </div>

    <div class="row">
        <div class="col-sm-8 blog-main">

            <div class="blog-content">
                <p>This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>
                ...
            </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->

        <!--Sidebar-->
        @include('partials._sidebar')

    </div><!-- /.row -->
@endsection
