<?php

namespace AsaP;

use AsaP\Main;

abstract class Controller
{
    // Properties
    private string $title; // the page title
    private string $description; // the page description
    private string $keywords; // the page keywords
    private string $viewPath; // the path to the view file
    private array $data; // an array of data to be passed to the view
    private bool $header; // whether or not to display the header
    private bool $footer; // whether or not to display the footer
    private string $favicon; // the path to the favicon file
    private array $javascripts; // an array of javascript files to include
    private array $deferredJavascripts; // an array of javascript files to include
    private array $cascadelinks; // an array of CSS files to include 
    private string $bannerImage;
    private array $breadcrumb;

    // Constructor
    public function __construct()
    {
        $this->handleRequest();

        // Initialize default values for properties
        $this->title = "";
        $this->description = "";
        $this->keywords = "";
        $this->data = [];
        $this->header = true;
        $this->footer = true;
        $this->favicon = Main::getInstance()->getRootUrl() . "/assets/img/icon_100x100.png";
        $this->bannerImage = Main::getInstance()->getRootUrl() . "/assets/img/banner_landing.jpg";
        $this->cascadelinks = [
            Main::getInstance()->getRootUrl() . '/public/styles/output.css',
            Main::getInstance()->getRootUrl() . '/public/styles/cookiebanner.css'
        ];
        $this->javascripts = [
            'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js',
            Main::getInstance()->getRootUrl() . '/public/scripts/CookieBanner.js'
        ];
        $this->deferredJavascripts = [
            Main::getInstance()->getRootUrl() . '/public/scripts/Nav.js',
            // Main::getInstance()->getRootUrl() . '/public/scripts/Theme.js',
        ];
        $this->breadcrumb = [];

        $this->setup();
    }

    public function setup(): void
    {
        return; // Do nothing by default
    }

    // Methods
    public function handleRequest(): void
    {
        return; // Do nothing by default
    }

    public function getAppName(): string
    {
        return Main::getInstance()->getConfig()->app_name;
    }

    public function getTitle(): string
    {
        $title = $this->title;

        // Append the app name to the title if it's not already included
        if (trim($title) !== "" && $title !== null) {
            $title = $title . " - ";
        }

        return $title . Main::getInstance()->getConfig()->app_name;
    }

    public function getDescription(): string
    {
        $description = $this->description;

        // Use the default description from config if none is set
        if (trim($description) === "" || $description === null) {
            $description = Main::getInstance()->getConfig()->meta->description;
        }

        return $description;
    }

    public function getAuthor(): string
    {
        return Main::getInstance()->getConfig()->meta->author;
    }

    public function getBreadcrumb(): array
    {
        return $this->breadcrumb;
    }

    public function getPrimaryColor(): string
    {
        return Main::getInstance()->getConfig()->meta->primary_color;
    }

    public function getKeywords(): string
    {
        $keywords = $this->keywords;

        // Use the default keywords from config if none are set
        if (trim($keywords) === "" || $keywords === null) {
            $keywords = Main::getInstance()->getConfig()->meta->keywords;
        }

        return $keywords;
    }

    public function hasAllowedCookies(): bool
    {
        return (isset($_COOKIE['cookieConsent']) ? $_COOKIE['cookieConsent'] : '') === 'true';
    }

    public function getGoogleAnalyticsId(): string
    {
        return Main::getInstance()->getConfig()->analytics->google->id;
    }

    public function getBannerImage(): string
    {
        return $this->bannerImage;
    }

    // This function returns the view path string
    public function getView(): string
    {
        return $this->viewPath;
    }

    // This function sets the title string
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    // This function sets the description string
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    // This function sets the keywords string
    public function setKeywords(string $keywords): void
    {
        $this->keywords = $keywords;
    }

    // This function sets the view path string
    public function setView(string $viewPath): void
    {
        $this->viewPath = $viewPath;
    }

    public function setBreadcrumb(array $breadcrumb): void
    {
        $this->breadcrumb = $breadcrumb;
    }

    // This function sets the data array
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    // This function returns the data array
    public function getData(): array
    {
        return $this->data;
    }

    // This function appends the given keyword string to the current keywords string
    public function addKeywords(string $keywords): void
    {
        $this->keywords = $this->getKeywords() . "," . $keywords;
    }

    // This function returns a boolean indicating if the controller has a header
    public function hasHeader(): bool
    {
        return $this->header;
    }

    // This function returns a boolean indicating if the controller has a footer
    public function hasFooter(): bool
    {
        return $this->footer;
    }

    // This function sets the boolean value of header
    public function setHeader(bool $hasHeader): void
    {
        $this->header = $hasHeader;
    }

    // This function sets the boolean value of footer
    public function setFooter(bool $hasFooter): void
    {
        $this->footer = $hasFooter;
    }

    // This function returns the javascripts array
    public function getJavascripts(): array
    {
        return $this->javascripts;
    }

    // This function adds the given javascript string to the javascripts array
    public function addJavascript(string $javascript): void
    {
        $this->javascripts[] = $javascript;
    }

    // This function returns the deferred javascripts array
    public function getDeferredJavascripts(): array
    {
        return $this->deferredJavascripts;
    }

    // This function adds the given javascript string to the deferred javascripts array
    public function addDeferredJavascript(string $javascript): void
    {
        $this->deferredJavascripts[] = $javascript;
    }

    // This function returns the cascade links array
    public function getStylesheets(): array
    {
        return $this->cascadelinks;
    }

    // This function adds the given stylesheet string to the cascade links array
    public function addStylesheet(string $stylesheet): void
    {
        $this->cascadelinks[] = $stylesheet;
    }

    // This function gets the banner image
    public function getBanner(): string
    {
        return Main::getInstance()->getRootUrl() . "/assets/img/banner.png";
    }

    // This function returns the favicon string
    public function getFavicon()
    {
        return $this->favicon;
    }

    public function setBannerImage(string $bannerImage): void
    {
        $this->bannerImage = $bannerImage;
    }
}
