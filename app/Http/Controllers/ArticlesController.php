<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article([
            'title' => request('title'),
            'code' => request('code'),
            'short_description' => request('short_description'),
            'body' => request('body')
        ]);

        $article->save();

        return redirect('/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $article = Article::where('code', $code)->firstOrFail();

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function edit($code)
    {
        $article = Article::where('code', $code)->firstOrFail();

        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $code)
    {
        Article::where('code', $code)->update([
            'title' => request('title'),
            'code' => request('code'),
            'short_description' => request('short_description'),
            'body' => request('body')
        ]);

        return redirect('/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        Article::where('code', $code)->delete();

        return redirect('/articles');
    }
}
