@extends('layouts.app')

@section('title', '| Modifier la page')

@section('content')

    <div class="container">

        {{-- Check if current user is logged-in or a guest --}}
        @if (Auth::guest())

            <p class="mt-5">SVP <a href="/login/">s'identifier</a> pour continuer.</p>

        @else
            <div class="blog-header">
                <h1 class="blog-title">Modifier la page <a class="btn btn-sm btn-primary" href="{{ route('pages.show', $page->id) }}">Preview Changes</a></h1>
            </div>

            <div class="row">
                <div class="push-md-2 col-md-8">

                    {{--
                        Check route:list for `posts.update` for more info
                        URL is posts/{page}, `{page}` meaning that we have to supply ID
                    --}}
                    <form action="{{ route('pages.update', $page->id) }}" method="POST">
                        {{ csrf_field() }}

                        {{--
                            HTML forms do not support PUT, PATCH or DELETE actions.
                            So, when defining PUT, PATCH or  DELETE routes that are called from an HTML form,
                            you will need to add a hidden _method field to the form.
                        --}}
                        {{ method_field('PUT') }}

                        <input type="hidden" name="author_ID" value="{{ Auth::id() }}" />
                        <input type="hidden" name="post_type" value="page" />

                        <div class="form-group{{ $errors->has('post_title') ? ' has-error' : '' }}">
                            <label for="post_title">Titre</label> <br/>
                            <input type="text" name="post_title" id="post_title" value="{{ $page->post_title }}" />

                            @if ($errors->has('post_title'))
                                <span class="help-block">
	                                <strong>{{ $errors->first('post_title') }}</strong>
	                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('post_slug') ? ' has-error' : '' }}">
                            <label for="post_slug">Slug</label> <br/>
                            <input type="text" name="post_slug" id="post_slug" value="{{ $page->post_slug }}" />

                            @if ($errors->has('post_slug'))
                                <span class="help-block">
	                                <strong>{{ $errors->first('post_slug') }}</strong>
	                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('post_content') ? ' has-error' : '' }}">
                            <label for="post_content">Content</label> <br/>
                            <textarea name="post_content" id="post_content" cols="80" rows="6">{{ $page->post_content }}</textarea>

                            @if ($errors->has('post_content'))
                                <span class="help-block">
	                                <strong>{{ $errors->first('post_content') }}</strong>
	                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Update" />
                            <a class="btn btn-primary" href="{{ route('pages.index') }}">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>

        @endif

    </div>

@endsection