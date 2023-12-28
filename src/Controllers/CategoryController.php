<?php

namespace AsaP\Controllers;

use AsaP\Main;
use AsaP\Entities\Category;
use AsaP\Repositories\ArticleRepository;
use AsaP\Repositories\CategoryRepository;
use AsaP\Controller;

class CategoryController extends Controller
{
    private array $args;
    private Category $category;
    private array $articles;
    private array $rows;
    private array $articlesByCategory;

    public function __construct($args)
    {
        $this->args = $args;

        parent::__construct();
    }

    public function setup() : void
    {
        $this->category = CategoryRepository::getCategoryBySlug($this->args["category_slug"]);

        // Set metadata for the article page
        $this->setTitle($this->category->category_name);
        $this->setDescription($this->category->category_name);
        $this->addKeywords("article,hello,test");

        $this->setBreadcrumb([
            [
                "page_title" => "Blog",
                "page_link" => Main::getInstance()->getRootUrl() . "/blog",
            ],
            [
                "page_title" => $this->category->category_name,
            ],
        ]);

        $this->rows = [
            [
                "row_title" => "Articles récents sur " . $this->category->category_name,
                "row_articles" => ArticleRepository::getArticlesByCategory($this->category->category_id),
            ],
        ];

        foreach ($this->category->children as $child) {
            if ($child["category_id"] == $this->category->category_id) {
                continue;
            }

            $this->rows[] = [
                "row_title" => $child["category_name"],
                "row_articles" => ArticleRepository::getArticlesByCategory($child["category_id"]),
            ];
        }

        foreach ($this->category->brothers as $brother) {
            if ($brother["category_id"] == $this->category->category_id) {
                continue;
            }

            $this->rows[] = [
                "row_title" => "Vous pourriez aimer " . $brother["category_name"],
                "row_articles" => ArticleRepository::getArticlesByCategory($brother["category_id"]),
            ];
        }

        $this->setView(__DIR__ . "/../Templates/pages/blog.php");
    }

    public function getCategory() : Category
    {
        return $this->category;
    }

    public function getRows() : array
    {
        return $this->rows;
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