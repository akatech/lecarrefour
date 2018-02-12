<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class ArticlesController extends Controller
{
    /**
     * Display articles
     */
    public function getIndex() {
        $posts = Post::where('post_type', 'post')
            ->orderBy('created_at', 'desc')
            ->paginate( 6 );

        return view('articles.index', ['posts' => $posts]);
    }

    /**
     * Display single article
     *
     * $post_slug STRING Article slug
     */
    public function getSingle( $post_slug ) {
        $post = Post::where('post_slug', '=', $post_slug)->first();

        return view('articles.single', ['post' => $post]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
