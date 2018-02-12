<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Post;
use Session;

class PagesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch records in pagination so only 10 pages per page
        // To get all records you may use get() method
        $pages = Post::where('post_type', 'page')->paginate( 10 );

        return view('pages.index', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Directly display `pages.create` view blade file
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate and filter user inputted data
        // Refer to `References` for more info
        $this->validate($request, [
            'post_title'        => 'required',
            'post_slug'         => 'required|alpha_dash|max:200|unique:posts,post_slug',
            'post_content'      => 'required',
        ]);

        // Create a new Post Model initialization
        // There are many ways to coke an Egg and same in storing data to database in Laravel
        // You might use or prefer this one https://laravel.com/docs/5.4/queries#inserts
        // I just love using Eloquent
        $page = new Post;

        $page->author_ID        = $request->author_ID;
        $page->post_type        = $request->post_type;
        $page->post_title       = $request->post_title;
        $page->post_slug        = $request->post_slug;
        $page->post_content     = $request->post_content;

        $page->save();

        // Store data for only a single request and destory
        Session::flash( 'sucess', 'Page published.' );

        // Redirect to `pages.show` route
        // Use route:list to view the `Action` or where this routes going to
        return redirect()->route('pages.show', $page->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Post::findOrFail( $id );

        return view('pages.show', [ 'page' => $page ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Post::findOrFail( $id );

        return view('pages.edit', [ 'page' => $page ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'post_title'        => 'required',
            'post_slug'         => 'required|alpha_dash|max:200|unique:posts,post_slug,'.$id,
            'post_content'      => 'required',
        ]);

        // You might prefer to use this one instead https://laravel.com/docs/5.4/queries#updates
        // You choose
        $page = Post::findOrFail($id);

        $page->author_ID        = $request->input('author_ID');
        $page->post_type        = $request->input('post_type');
        $page->post_title       = $request->input('post_title');
        $page->post_slug        = $request->input('post_slug');
        $page->post_content     = $request->input('post_content');

        $page->save();

        Session::flash('success', 'Page updated.');

        return redirect()->route('pages.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieve records and throw an exception if a model is not found
        $page = Post::findOrFail( $id );

        // https://laravel.com/docs/5.4/queries#deletes
        $page->delete();

        Session::flash('success', 'Page deleted.');

        return redirect()->route('pages.index');
    }

    /**
     * Front page
     */
    public function getIndex( Request $request ) {

        // Get query string
        $page_id    = $request->query('page_id');

        // If page_id is viewed use `pages.page.php` file to handle the display
        // otherwise use and display 404.blade.php file
        if( $page_id ) :

            $posts = Post::where('id', $page_id)
                ->where('post_type', 'page')
                ->first();

            // Check if page exist
            if( $posts )
                return view('pages.page', [ 'page' => $posts ]);
            else
                return view('errors.404');

        // If none of the above is true, then display most recently added Blot posts
        else :

            $posts = Post::where('post_type', 'post')
                ->paginate( 6 );

            // It replaces the previous `index.blade.php` blade file that is now used in displaying lists of added pages
            return view('pages.frontpage', [ 'posts' => $posts ]);

        endif;
    }

}