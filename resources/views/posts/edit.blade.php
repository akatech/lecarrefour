
@extends('layouts.app')

@section('title', '| Modifier l\'article')

@section('content')

    <div class="container">

        {{-- Check if current user is logged-in or a guest --}}
        @if (Auth::guest())

            <p class="mt-5">SVP <a href="/login/">s'identifiez</a> pour continuer.</p>

        @else
            <div class="blog-header">
                <h1 class="blog-title">Modifier l'article <a class="btn btn-sm btn-primary" href="{{ route('posts.show', $post->id) }}">Preview Changes</a></h1>
            </div>

            <div class="row">
                <div class="push-md-2 col-md-8">

                    {{--
                        Check route:list for `posts.update` for more info
                        URL is posts/{post}, `{post}` meaning that we have to supply ID
                    --}}
                    <form enctype="multipart/form-data" action="{{ route('posts.update', $post->id) }}" method="POST">
                        {{ csrf_field() }}

                        {{--
                            HTML forms do not support PUT, PATCH or DELETE actions.
                            So, when defining PUT, PATCH or  DELETE routes that are called from an HTML form,
                            you will need to add a hidden _method field to the form.
                        --}}
                        {{ method_field('PUT') }}

                        <input type="hidden" name="author_ID" value="{{ Auth::id() }}" />
                        <input type="hidden" name="post_type" value="post" />

                        <div class="form-group{{ $errors->has('post_title') ? ' has-error' : '' }}">
                            <label for="post_title">Titre</label> <br/>
                            <input class="form-control" type="text" name="post_title" id="post_title" value="{{ $post->post_title }}" />

                            @if ($errors->has('post_title'))
                                <span class="help-block">
	                                <strong>{{ $errors->first('post_title') }}</strong>
	                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('post_slug') ? ' has-error' : '' }}">
                            <label for="post_slug">Slug</label> <br/>
                            <input class="form-control" type="text" name="post_slug" id="post_slug" value="{{ $post->post_slug }}" />

                            @if ($errors->has('post_slug'))
                                <span class="help-block">
	                                <strong>{{ $errors->first('post_slug') }}</strong>
	                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('post_content') ? ' has-error' : '' }}">
                            <label for="post_content">Contenu</label> <br/>
                            <textarea id="article-ckeditor" class="form-control" name="post_content" id="post_content" cols="80" rows="6">{{ $post->post_content }}</textarea>

                            @if ($errors->has('post_content'))
                                <span class="help-block">
	                                <strong>{{ $errors->first('post_content') }}</strong>
	                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="title">Categorie</label> <br/>

                            <?php $categories = Helper::get_categories(); ?>
                            <select name="category_ID" id="category_ID">
                                <?php
                                if( $categories ) {
                                foreach( $categories as $category ) {
                                ?>
                                <option value="{{ $category->id }}" {{ $category->id == $post->category_ID ? 'selected="selected"' : '' }}>{{ $category->category_name }}</option>
                                <?php
                                }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="post_thumbnail">Thumbnail</label> <br/>
                            <input class="thumbnail" type="file" name="post_thumbnail" id="post_thumbnail" />
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Update" />
                            <a class="btn btn-primary" href="{{ route('posts.index') }}">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>

        @endif

    </div>

@endsection