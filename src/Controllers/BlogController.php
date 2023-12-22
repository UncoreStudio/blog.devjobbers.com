<?php

namespace AsaP\Controllers;

use AsaP\Main;
use AsaP\Controller;
use AsaP\Entities\Category;
use AsaP\Repositories\CategoryRepository;
use AsaP\Repositories\ArticleRepository;

// Define the BlogController class which extends the Controller class
class BlogController extends Controller
{
    private $args;
    // Define a private property to store the articles
    private array $articles;
    private array $rows;

    // Define the constructor method
    public function __construct()
    {
        // Call the parent constructor method
        parent::__construct();
    }

    public function setup() : void
    {
        $this->articles = ArticleRepository::getAllArticles();

        // Set the page title, description, and keywords
        $this->setTitle("Blog");
        $this->setDescription("Bienvenue sur le blog de Devjobbers. Découvrez nos derniers articles et nos conseils pour vous aider à trouver un emploi dans le développement web.");
        $this->addKeywords("blog,articles,conseils,emploi,devjobbers");

        $this->setBreadcrumb([
            [
                "page_title" => "Blog",
            ]
        ]);

        $this->rows = [
            [
                "row_title" => "Articles récents",
                "row_articles" => $this->articles,
            ],
        ];

        foreach (CategoryRepository::getCategories() as $category) {
            $articlesByCategory = ArticleRepository::getArticlesByCategory($category->category_id);

            // Filter out the articles that are already in the first row
            $articlesByCategory = array_filter($articlesByCategory, function ($article) {
                return !in_array($article, $this->articles);
            });

            $this->rows[] = [
                "row_title" => "Découvrez en plus sur " . $category->category_name,
                "row_articles" => $articlesByCategory,
            ];
        }

        // Set the view to be used to render the page
        $this->setView(__DIR__ . "/../Templates/pages/blog.php");
    }

    // Define the method to handle requests
    public function handleRequest(): void
    {
        // Uncomment the following line to dump the POST request data
        // var_dump($_POST); 
    }

    public function getRows(): array
    {
        return $this->rows;
    }

    // Define a method to get all the articles
    public function getArticles()
    {
        return $this->articles;
    }

    // public function getCategories()
    // {
    //     return $this->categories;
    // }

    // Define a method to get the last article
    // public function getLastArticle()
    // {
    //     // Get the last article from the articles property
    //     $lastArticle = $this->articles[0];

    //     // Remove the last article from the articles property
    //     array_splice($this->articles, 0, 1);

    //     // Return the last article
    //     return $lastArticle;
    // }
}
