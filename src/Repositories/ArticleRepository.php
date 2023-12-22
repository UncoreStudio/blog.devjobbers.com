<?php
namespace AsaP\Repositories;

use AsaP\Database;
use AsaP\Entities\Article;

class ArticleRepository
{

    public static function getArticleBySlug(string $article_slug): Article
    {
        // Instead of fetching the database, fetch it from the API
        $article = file_get_contents('https://api.devjobbers.com/articles/' . $article_slug);
        $article = json_decode($article, true);

        // Article are inside the "data" key
        $article = $article['data'];

        // Transform the array of the article into Article objects
        $article = new Article($article);

        return $article;
    }

    public static function getAllArticles(): array
    {
        // This is the typical response to API : ["sucesss" => true, "data" => [...] ]

        // Instead of fetching the database, fetch it from the API
        $articles = file_get_contents('https://api.devjobbers.com/articles/');
        $articles = json_decode($articles, true);

        // Articles are inside the "data" key
        $articles = $articles['data'];

        // Transform the array of articles into an array of Article objects
        $articles = array_map(function ($article) {
            return new Article($article);
        }, $articles);

        return $articles;
    }

    public static function getAllArticlesButExcept(string $article_slug): array
    {
        // Get all articles
        $articles = self::getAllArticles();

        // Filter out the article with the given id
        $articles = array_filter($articles, function ($article) use ($article_slug) {
            return $article->getSlug() != $article_slug;
        });

        return $articles;
    }

    public static function getArticlesByCategory(int $category_id): array
    {
        // Instead of fetching the database, fetch it from the API
        $articles = file_get_contents('https://api.devjobbers.com/articles/?category_id=' . $category_id);
        $articles = json_decode($articles, true);

        // Articles are inside the "data" key
        $articles = $articles['data'];

        // Transform the array of articles into an array of Article objects
        $articles = array_map(function ($article) {
            return new Article($article);
        }, $articles);

        return $articles;
    }


}