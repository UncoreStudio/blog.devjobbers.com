<?php

namespace AsaP\Entities;

use AsaP\Main;
use \DateTime;

class Article
{

    // Declare properties
    public $article_id;
    public $article_slug;
    public $article_title;
    public $article_content;
    public $article_category_id;
    public $article_created_at;
    public $article_author;
    public $article_visibility;
    public $article_category_name;
    public $article_category_slug;
    public $article_category_parent_id;

    public function __construct(array $article)
    {
        $this->article_id = $article['article_id'];
        $this->article_slug = $article['article_slug'];
        $this->article_title = $article['article_title'];
        $this->article_content = $article['article_content'];
        $this->article_category_id = $article['article_category_id'];
        $this->article_created_at = $article['article_created_at'];
        $this->article_author = $article['article_author'];
        $this->article_visibility = $article['article_visibility'];
        $this->article_category_name = $article['category_name'];
        $this->article_category_slug = $article['category_slug'];
        $this->article_category_parent_id = $article['category_parent_id'];
    }

    /**
     * Get the value of id
     */
    public function getId() : string
    {
        return $this->article_id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id) : void
    {
        $this->article_id = $id;
    }

    /**
     * Get the value of slug
     */
    public function getSlug() : string
    {
        return $this->article_slug;
    }

    /**
     * Set the value of slug
     *
     * @return  self
     */
    public function setSlug($slug) : void
    {
        $this->article_slug = $slug;
    }

    /**
     * Get the value of article_title
     */
    public function getTitle()
    {
        return $this->article_title;
    }

    /**
     * Set the value of article_title
     *
     * @return  self
     */
    public function setTitle($article_title) : void
    {
        $this->article_title = $article_title;
    }

    /**
     * Get the value of content
     */
    public function getContent() : array
    {
        // Return the JSON-decoded article content
        return json_decode($this->article_content);
    }

    /**
     * Get the first 50 characters of content followed by ellipses
     */
    public function getSummaryContent() : string
    {
        // Return the first 50 characters of the article content followed by ellipses
        return substr($this->article_content, 0, 50) . "..";
    }

    /**
     * Set the value of content
     *
     * @return  self
     */
    public function setContent($content) : void
    {
        $this->article_content = $content;
    }

    /**
     * Get the value of date
     *
     * @param string $dateFormat The format of the date to return
     * @return string The formatted date
     */
    public function getDate($dateFormat = "d/m/Y - h:i") : string
    {
        // Create a new DateTime object and format the date according to the given format
        $date = new DateTime($this->article_created_at);

        return $date->format($dateFormat);
    }

    /**
     * Get the URL of the article page
     *
     * @return string The URL of the article page
     */
    public function getHref() : string
    {
        $href = Main::getInstance()->getRootUrl() . "/articles/" . $this->getSlug();

        // Return the URL of the article page
        return $href;
    }

    /**
     * Get the author id
     *
     * @return  string
     */
    public function getAuthor() : array
    {
        return $this->article_author;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setDate($date) : void
    {
        $this->article_created_at = $date;
    }

    /**
     * Get the path to the article's thumbnail
     *
     * @return string The path to the article's thumbnail
     */
    public function getThumbnail() : string
    {
        $thumbnailDirectory = Main::getInstance()->getRootUrl() . "/uploads/articles/" . $this->getSlug() . ".webp";

        // Check if the thumbnail file exists and return its path, otherwise return a placeholder image URL
        if (!file_exists($thumbnailDirectory)) {
            return $thumbnailDirectory;
        } else {
            return "https://via.placeholder.com/1400x700";
        }
    }

    /**
     * Get the value of article_category_id
     */ 
    public function getCategoryId()
    {
        return $this->article_category_id;
    }

    /**
     * Set the value of article_category_name
     *
     * @return  self
     */
    public function getCategoryName()
    {
        return $this->article_category_name;
    }

    /**
     * Get the value of article_category_slug
     *
     * @return  self
     */
    public function getCategorySlug()
    {
        return $this->article_category_slug;
    }

}