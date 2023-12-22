<?php

namespace AsaP\Controllers;

use AsaP\Main;
use AsaP\Entities\Article;
use AsaP\Repositories\ArticleRepository;
use AsaP\Controller;

class ArticleController extends Controller
{
    private array $args;
    private Article $article;
    private array $articles;

    public function __construct($args)
    {
        $this->args = $args;

        parent::__construct();
    }

    public function setup() : void
    {
        $this->article = ArticleRepository::getArticleBySlug($this->args['article_slug']);
        $this->articles = ArticleRepository::getAllArticlesButExcept($this->args['article_slug']);

        // Set metadata for the article page
        $this->setTitle($this->article->getTitle());
        $this->setDescription($this->article->getTitle());
        $this->setBannerImage($this->article->getThumbnail());
        $this->addKeywords("article,hello,test");

        $this->setBreadcrumb([
            [
                "page_title" => "Blog",
                "page_link" => Main::getInstance()->getRootUrl() . "/blog/",
            ],
            [
                "page_title" => $this->article->getCategoryName(),
                "page_link" => Main::getInstance()->getRootUrl() . "/categories/" . $this->article->getCategorySlug(),
            ],
            [
                "page_title" => $this->article->getTitle(),
            ],
        ]);

        $this->setView(__DIR__ . "/../Templates/pages/article.php");
    }

    public function getArticle() : Article
    {
        return $this->article;
    }

    public function getArticles() : array
    {
        return $this->articles;
    }

    public function handleRequest(): void
    {
        // Handle any requests (e.g. form submissions) for the article page
        // var_dump($_POST);
    }
}