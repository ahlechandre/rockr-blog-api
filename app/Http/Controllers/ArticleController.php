<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Determina a quantidade de recursos por página através de Query String.
        // Por padrão, 7.
        $perPage = $request->query('per-page', 7);

        return Article::orderBy('created_at', 'desc')
            ->simplePaginate($perPage);
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
