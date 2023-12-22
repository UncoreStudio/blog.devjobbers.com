<?php

namespace AsaP\Controllers;

use AsaP\Controller;
use AsaP\Repositories\ArticleRepository;

// Define the BlogController class which extends the Controller class
class HomeController extends Controller
{
    // Define a private property to store the articles
    private array $articles;

    // Define the constructor method
    public function __construct($args)
    {
        // Call the parent constructor method
        parent::__construct();
    }

    public function setup() : void
    {
        // Set the page title, description, and keywords
        $this->setTitle('Développer, connecter, réussir');
        $this->setDescription("Optez pour la facilité avec Devjobbers ! C’est la plateforme qui met en relation des développeurs freelance avec des clients en recherche de compétences spécifiques, le tout sécurisé et en toute transparence.");
        $this->addKeywords("développeur web, freelance, indépendant, collaboration, talents informatiques, opportunités professionnelles, mise en relation, réussite entrepreneuriale, plateforme de talents");

        // Added AOS library for animations
        $this->addStylesheet("https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css");
        $this->addJavascript("https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js");

        // Initialize the articles
        $this->articles = ArticleRepository::getAllArticles();

        // Set the view to be used to render the page
        $this->setView(__DIR__ . "/../Templates/pages/home.php");
    }

    // Define the method to handle requests
    public function handleRequest(): void
    {
        // Uncomment the following line to dump the POST request data
        // var_dump($_POST); 
    }

    public function getArticles(): array
    {
        // Return the articles
        return $this->articles;
    }
}
