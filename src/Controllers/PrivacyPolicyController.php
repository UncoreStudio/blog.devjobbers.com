<?php

namespace AsaP\Controllers;

use AsaP\Controller;

// Define the BlogController class which extends the Controller class
class PrivacyPolicyController extends Controller
{
    // Define the constructor method
    public function __construct()
    {
        // Call the parent constructor method
        parent::__construct();
    }

    public function setup() : void
    {
        // Set the page title, description, and keywords
        $this->setTitle('Politique de confidentialité');
        $this->setDescription("Des questions sur la manière dont nous utilisons les données ? Retrouvez toutes les informations sur cette page.");
        $this->addKeywords("développeur web, freelance, indépendant, collaboration, talents informatiques, opportunités professionnelles, mise en relation, réussite entrepreneuriale, plateforme de talents");

        // Set the view to be used to render the page
        $this->setView(__DIR__ . "/../Templates/pages/privacy-policy.php");
    }

    // Define the method to handle requests
    public function handleRequest(): void
    {
        // Uncomment the following line to dump the POST request data
        // var_dump($_POST); 
    }
}
