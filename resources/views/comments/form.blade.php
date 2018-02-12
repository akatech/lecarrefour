
<h2>Laisser une réponse</h2>
<form action="{{ route('comments.store') }}" method="POST">

    {{ csrf_field() }}
    <input type="hidden" name="post_id" value="{{ $post_id }}" />

    <div class="form-group{{ $errors->has('comment_author') ? ' has-error' : '' }}">
        <label for="comment_author">Nom *</label> <br/>
        <input class="form-control" type="text" name="comment_author" value="{{ old('comment_author') }}" />

        @if ($errors->has('comment_author'))
            <span class="help-block">
                <strong>{{ $errors->first('comment_author') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('comment_author_email') ? ' has-error' : '' }}">
        <label for="comment_author_email">Adresse Email *</label> <br/>
        <input class="form-control" type="text" name="comment_author_email" value="{{ old('comment_author_email') }}" />

        @if ($errors->has('comment_author_email'))
            <span class="help-block">
                <strong>{{ $errors->first('comment_author_email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="comment_author_url">Site  webite </label> <br/>
        <input class="form-control" type="text" name="comment_author_url" value="{{ old('comment_author_url') }}" />
    </div>

    <div class="form-group">
        <label for="comment_content">Message</label> <br/>
        <textarea class="form-control" id="article-ckeditor" cols="60" rows="6" name="comment_content">{{ old('comment_content') }}</textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Submit Comment" />
    </div>

</form>
