@extends('layouts.app')

@section('title', '| Commentaires')

@section('content')

    <div class="container">

        {{-- Check if current user is logged-in or a guest --}}
        @if (Auth::guest())

            <p class="mt-5">SVP <a href="/login/">s'identifiez-vous</a> pour continuer.</p>

        @else

            <div class="blog-header">
                <h1 class="blog-title">Commentaires</h1>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <a href="{{ route('comments.index') }}">Tout</a> | <a href="{{ route('comments.index') }}/?comment_status=1">Approuvé</a>

                    <table class="table">
                        <tr>
                            <th>Auteur</th>
                            <th>Commentaire</th>
                            <th>En réponse à</th>
                            <th>Soumis le</th>
                            <th width="24%">&nbsp;</th>
                        </tr>
                        <tr>
                        {{-- Blade if and else --}}
                        @if( $comments->count() )
                            {{-- Blade foreach --}}
                            @foreach( $comments as $comment )
                                <tr>
                                    <td>
                                        <strong>
                                            <a href="{{ route('comments.edit', $comment->id) }}">
                                                {{ $comment->comment_author }}
                                            </a> <br/>

                                            <a href="mailto:{{ $comment->comment_author_email }}">
                                                {{ $comment->comment_author_email }}
                                            </a> <br/>

                                            {{ $comment->comment_author_ip }}
                                        </strong>
                                    </td>
                                    <td>
                                        {{ $comment->comment_content }}
                                    </td>
                                    <td>
                                        @php
                                            $post = Helper::get_post( $comment->post_id  );
                                        @endphp

                                        {{ $post->post_title }} <br/>
                                        <a target="_blank" href="{{ route('single', Helper::get_post_slug( $post->post_slug ) ) }}">View Post</a>
                                    </td>
                                    <td>
                                        {{ date('F j, Y', strtotime( $comment->created_at )) }} @ {{ date('h:i', strtotime( $comment->created_at )) }}
                                    </td>
                                    <td>
                                        <?php if( $comment->comment_approved ) : ?>
                                        <form class="d-inline" action="{{ route('comment.unapprove', $comment->id) }}" method="POST">
                                            {{ csrf_field() }}

                                            <input type="submit" value="Unapprove" class="btn btn-sm btn-success" />
                                        </form>
                                        <?php else : ?>
                                        <form class="d-inline" action="{{ route('comment.approve', $comment->id) }}" method="POST">
                                            {{ csrf_field() }}

                                            <input type="submit" value="Approve" class="btn btn-sm btn-success" />
                                        </form>
                                        <?php endif; ?>
                                        |
                                        <form class="d-inline" action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <input type="submit" value="Delete" class="btn btn-sm btn-danger" /><i class="far fa-trash-alt" ></i>
                                        </form>

                                        <a class="btn btn-sm btn-info" href="{{ route('comments.edit', $comment->id) }}">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else

                            <tr>
                                <td colspan="5">Aucun commentaire n'a encore été ajouté!</td>
                            </tr>

                            @endif
                            </tr>
                    </table>

                    {{ $comments->links() }}

                </div>
            </div>

        @endif

    </div>

@endsection