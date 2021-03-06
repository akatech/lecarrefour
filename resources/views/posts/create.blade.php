
@extends('layouts.app')

@section('title', '| nouveau article')

@section('content')

    <div class="container">

        {{-- Check if current user is logged-in or a guest --}}
        @if (Auth::guest())

            <p class="mt-5">SVP <a href="/login/">s'identifiez-vous</a>pour ajouté un article.</p>

        @else

            <div class="blog-header">
                <h1 class="blog-title">Ajouté un nouveau article</h1>
            </div>

            <div class="row">
                <div class="push-md-2 col-md-8">

                    <form enctype="multipart/form-data" action="{{ route('posts.store') }}" method="POST">
                        {{ csrf_field() }}

                        <input type="hidden" name="author_ID" value="{{ Auth::id() }}" />
                        <input type="hidden" name="post_type" value="post" />

                        <div class="form-group{{ $errors->has('post_title') ? ' has-error' : '' }}">
                            <label for="post_title">Title</label> <br/>
                            <input class="form-control"  type="text" name="post_title" id="post_title" value="{{ old('post_title') }}" />

                            @if ($errors->has('post_title'))
                                <span class="help-block">
	                                <strong>{{ $errors->first('post_title') }}</strong>
	                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('post_slug') ? ' has-error' : '' }}">
                            <label for="post_slug">Slug</label> <br/>
                            <input  class="form-control" type="text" name="post_slug" id="post_slug" value="{{ old('post_slug') }}" />

                            @if ($errors->has('post_slug'))
                                <span class="help-block">
	                                <strong>{{ $errors->first('post_slug') }}</strong>
	                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('post_content') ? ' has-error' : '' }}">
                            <label for="post_content">Contenu</label> <br/>
                            <textarea class="form-control" id="article-ckeditor" name="post_content" id="post_content" cols="80" rows="6">{{ old('post_content') }}</textarea>

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
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                <?php
                                }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="post_thumbnail">Image</label> <br/>
                            <input class="thumbnail" type="file" name="post_thumbnail" id="post_thumbnail" />
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Publish" />
                            <a class="btn btn-primary" href="{{ route('posts.index') }}">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>

        @endif

    </div>

@endsection