<?php

namespace AsaP;

use FastRoute;

use AsaP\Main;
use AsaP\Controllers\HomeController;
use AsaP\Controllers\LegalMentionsController;
use AsaP\Controllers\PrivacyPolicyController;
use AsaP\Controllers\BlogController;
use AsaP\Controllers\ArticleController;
use AsaP\Controllers\CategoryController;
use AsaP\View;

class Router extends Main
{
    private $dispatcher;
    private $httpMethod;
    private $uri;

    function __construct($request)
    {
        // Get HTTP method and URI from request object
        $this->httpMethod = $request->getHttpMethod();
        $this->uri = $request->getUri();
        

        // Create dispatcher using FastRoute
        $this->dispatcher = $this->getRoutes();
    }

    public function process()
    {
        // Use dispatcher to match URI to a route
        $routeInfo = $this->dispatcher->dispatch($this->httpMethod, strtok($this->uri, '?'));

        // Extract query parameters
        parse_str($_SERVER['QUERY_STRING'], $queryParams);

        // Handle different types of route matches
        switch ($routeInfo[0]) {
            case FastRoute\Dispatcher::NOT_FOUND:
                // Return 404 Not Found error
                // To Do
                echo ('NOT_FOUND');
                break;
            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                // Return 405 Method Not Allowed error
                // To Do
                $allowedMethods = $routeInfo[1];
                echo ('Not Allowed');
                break;
            case FastRoute\Dispatcher::FOUND:
                // Call handler function for matching route
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];

                // Merge route variables with query parameters
                $mergedVars = array_merge($vars, $queryParams);

                // Pass merged variables to the handler
                print($handler($mergedVars));
                break;
        }
    }

    private function getRoutes()
    {
        // Define routes using FastRoute syntax
        return FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
            // Define route prefix (if dev environment)
            $prefix = $this->getEnvironment() === "dev" ? "/devjobbers/blog.devjobbers.com" : "";
    
            $r->get($prefix . "/", function ($args) {
                // Handle home page route with HomeController
                $controller = new HomeController($args);
                $view = new View($controller);
                $view->render();
            });
            $r->get($prefix . "/legal-mentions", function () {
                // Handle legal mentions page route with LegalMentionsController
                $controller = new LegalMentionsController();
                $view = new View($controller);
                $view->render();
            });
            $r->get($prefix . "/privacy-policy", function () {
                // Handle privacy policy page route with PrivacyPolicyController
                $controller = new PrivacyPolicyController();
                $view = new View($controller);
                $view->render();
            });
            $r->get($prefix . '/blog', function () {
                // Handle home page route with BlogController
                $controller = new BlogController();
                $view = new View($controller);
                $view->render();
            });
            $r->get($prefix . '/categories/{category_slug}', function ($args) {
                // Handle home page route with BlogController
                $controller = new CategoryController($args);
                $view = new View($controller);
                $view->render();
            });
            $r->get($prefix . '/articles/{article_slug}', function ($args) {
                // Handle article route with ArticleController
                $controller = new ArticleController($args);
                $view = new View($controller);
                $view->render();
            });
        }, ['routeParser' => 'FastRoute\RouteParser\Std']);
    }
}