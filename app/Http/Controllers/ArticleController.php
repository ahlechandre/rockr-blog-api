<?php

namespace App\Http\Controllers;

use App\Article;

class ArticleController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Article::simplePaginate();
    }

    /**
     *
     * @param  string  $article
     * @return \Illuminate\Http\Response
     */
    public function show($article)
    {
        // -----------------------------------
        // Seleção por slug.
        // -----------------------------------
        // Article::ofSlug($article)->firstOrFail();

        return Article::findOrFail($article);
    }
}
