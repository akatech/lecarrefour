@extends('layouts.app')

@section('title', '| Accueil')

@section('content')
    <div class="blog-header">
        <h1 class="blog-title">Nouveaux articles postés</h1>
        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
    </div>

    <div class="row">
        <div class="col-sm-8 blog-main">

            @if( $posts->count() )
                @foreach( $posts as $post )

                    <div class="blog-post">
                        <h2 class="blog-post-title">
                            <a href="/article/{{ $post->post_slug }}">{{ $post->post_title }}</a>
                        </h2>
                        <p class="blog-post-meta">{{ date('M j, Y', strtotime( $post->created_at )) }} par <a href="#">{{ Helper::get_userinfo( $post->author_ID )->name }}</a></p>

                        <div class="blog-content">
                            {!! nl2br( $post->post_content ) !!}
                        </div>
                    </div>

                @endforeach
            @else

                <p>Aucun message ajouté pour l'instant!</p>

            @endif

            {{-- Display pagination only if more than the required pagination --}}
            @if( $posts->total() > 6 )
                <nav>
                    <ul class="pager">
                        @if( $posts->firstItem() > 1 )
                            <li><a href="{{ $posts->previousPageUrl() }}">Précédednt</a></li>
                        @endif

                        @if( $posts->lastItem() < $posts->total() )
                            <li><a href="{{ $posts->nextPageUrl() }}">Suivant</a></li>
                        @endif
                    </ul>
                </nav>
            @endif

        </div><!-- /.blog-main -->

        <!--Sidebar-->
        @include('partials._sidebar')

    </div><!-- /.row -->
@endsection