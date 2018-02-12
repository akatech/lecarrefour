<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>Vos publicités</h4>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>

    <div class="sidebar-module">
        <h4>Archives</h4>
        <ol class="list-unstyled">
            <li><a href="#">UGB</a></li>
            <li><a href="#">UCAD</a></li>
            ...
        </ol>
    </div>

    <div class="sidebar-module">
        <h4>Elsewhere</h4>
        <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            ...
        </ol>
    </div>

    <div class="sidebar-module">
        <h4>Rechercher</h4>
        <form action="/search/" method="GET">
            <input type="text" name="s" value="{{ Request::query('s') }}" placeholder="Recherche sur ce site..." />
        </form>
    </div>
</div><!-- /.blog-sidebar -->
