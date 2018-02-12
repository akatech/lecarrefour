@extends('layouts.app')

@section('title', '| Ajouté un Category')

@section('content')

    <div class="container">

        {{-- Check if current user is logged-in or a guest --}}
        @if (Auth::guest())

            <p class="mt-5">SVP <a href="/login/">s'identifiez-vous</a> pour ajouté un article.</p>

        @else

            <div class="blog-header">
                <h1 class="blog-title">Ajouté une nouveau catégorie</h1>
            </div>

            <div class="row">
                <div class="push-md-2 col-md-8">

                    <form action="{{ route('categories.store') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('category_name') ? ' has-error' : '' }}">
                            <label for="category_name">Title</label> <br/>
                            <input class="form-control" type="text" name="category_name" id="category_name" value="{{ old('category_name') }}" />

                            @if ($errors->has('category_name'))
                                <span class="help-block">
	                                <strong>{{ $errors->first('category_name') }}</strong>
	                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('category_slug') ? ' has-error' : '' }}">
                            <label for="category_slug">Slug</label> <br/>
                            <input class="form-control" type="text" name="category_slug" id="category_slug" value="{{ old('category_slug') }}" />

                            @if ($errors->has('category_slug'))
                                <span class="help-block">
	                                <strong>{{ $errors->first('category_slug') }}</strong>
	                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Publish" />
                            <a class="btn btn-primary" href="{{ route('categories.index') }}">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>

        @endif

    </div>

@endsection