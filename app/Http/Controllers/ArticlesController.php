<?php

namespace App\Http\Controllers;

use Image;
use App\Article;

class ArticlesController extends Controller
{
    const MARKDOWN_IMAGE_REGEXP = '/\!\[.*\]\((.*)\)/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->get();

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
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Article::create($this->processArticle());

        return redirect(route('articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Article $article)
    {
        $article->update($this->processArticle());

        return redirect(route('articles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect(route('articles.index'));
    }

    protected function processArticle()
    {
        $article = $this->validateArticle();

        $article['body'] = $this->saveArticleImages($article['body']);

        if (isset($article['image'])) {
            $article['image'] = $this->saveUploadedImage($article['image']);
        }

        return $article;
    }

    protected function validateArticle()
    {
        $article = request()->validate([
            'title' => 'required',
            'code' => 'required',
            'short_description' => 'required',
            'body' => 'required'
        ]);

        if (request('image')) {
            $article = array_merge(request()->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]), $article);
        }

        return $article;
    }

    protected function saveArticleImages($articleBody) {
        return preg_replace_callback(self::MARKDOWN_IMAGE_REGEXP, function($matches) {
            $imageMarkup = $matches[0];
            $imageUrl = $matches[1];

            $savedImageUrl = $this->saveImage($imageUrl, true);

            return str_replace($imageUrl, $savedImageUrl, $imageMarkup);
        }, $articleBody);
    }

    protected function saveUploadedImage($image)
    {
        $imageName = time() . '.' . $image->clientExtension();

        $image->move(public_path('images'), $imageName);

        return 'images/' . $imageName;
    }

    protected function saveImage($path)
    {
        $imageFile = Image::make($path);

        $relativePath = 'images/' . strtok(basename($path), '?');

        $imageFile->save(public_path($relativePath));

        return $relativePath;
    }
}
