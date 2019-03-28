<?php

use App\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Número de artigos a serem gerados automaticamentes.
     */
    const ARTICLES_COUNT = 25;
    /**
     * URL padrão para imagem do artigo.
     */
    const COVER_IMAGE_SRC = 'https://source.unsplash.com/640x640/?rock-concert';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Gera automaticamente todos os artigos.
        $articles = self::articles();
        // Mapeia os artigos para registros no banco de dados.
        array_map(function ($article) {
            return Article::create($article);
        }, $articles);
    }

    /**
     *
     * @return array
     */
    private static function articles()
    {
        $articles = [];
        $numberFormatter = new NumberFormatter('en', NumberFormatter::SPELLOUT);
        // Conteúdo para artigos.
        $content = file_get_contents('http://loripsum.net/api');

        for ($i = 0; $i < self::ARTICLES_COUNT; $i++) {
            // -------------------------------------------------------
            // Gera conteúdo randomico por artigo.
            // -------------------------------------------------------
            // $content = file_get_contents('http://loripsum.net/api');

            $numberSpelled = $numberFormatter->format($i);
            $articles[] = [
                'title' => "Title of article {$numberSpelled}",
                'author_name' => 'Author '.ucfirst($numberSpelled),
                'cover_image_src' => self::COVER_IMAGE_SRC,
                'content' => $content
            ];
        }

        return $articles;
    }
}