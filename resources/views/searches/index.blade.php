@extends('layouts.app')

@section('title')
    | Search on {{ $s }}
@endsection

@section('content')

    <div class="blog-header">
        <h1 class="blog-title">À la recherche de "{{ $s }}"</h1>
        <p>Nous avons trouvé des résultats {{ $posts->count() }}  pour votre terme de recherche dans toutes les entrées de blog</p>
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
                            {{--If post content is > 200 in characters display 200 only or else display the whole content--}}
                            {{ strlen( $post->post_content ) > 200 ? substr( $post->post_content, 0, 200) . ' ...' : $post->post_content }}
                        </div>
                    </div>

                @endforeach
            @else

                <p>Aucun article trouvé <strong>{{ $s }}</strong></p>

            @endif

            {{-- Display pagination only if more than the required pagination --}}
            @if( $posts->total() > 6 )
                <nav>
                    <ul class="pager">
                        @if( $posts->firstItem() > 1 )
                            <li><a href="{{ $posts->previousPageUrl() }}">Précédent</a></li>
                        @endif

                        @if( $posts->lastItem() < $posts->total() )
                            <li><a href="{{ $posts->nextPageUrl() }}">Suivant</a></li>
                        @endif
                    </ul>
                </nav>
            @endif

        </div>
    </div>

@endsection