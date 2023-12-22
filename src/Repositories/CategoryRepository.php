<?php
namespace AsaP\Repositories;

use AsaP\Database;
use AsaP\Entities\Category;

class CategoryRepository
{

    public static function getCategoryBySlug(string $category_slug): Category
    {
       // Instead of fetching the database, fetch it from the API
       $data = file_get_contents('https://api.devjobbers.com/categories/' . $category_slug);
       $data = json_decode($data, true);

       // Article are inside the "data" key
       $data = $data['data'];

       $category = new Category($data["category"], $data["children"], $data["brothers"]);

       return $category;
    }

    public static function getCategories($category_slug = "developpement-web"): array
    {
        // Instead of fetching the database, fetch it from the API
        $data = file_get_contents('https://api.devjobbers.com/categories/');
        $data = json_decode($data, true);

        // Articles are inside the "data" key
        $data = $data['data'];

        // Transform the array of articles into an array of Article objects
        $categories = array_map(function ($category) {
            return new Category($category);
        }, $data);

        return $categories;
    }

    public static function getCategoryBrothers($category_slug): array
    {
        // Instead of fetching the database, fetch it from the API
        $data = file_get_contents('https://api.devjobbers.com/categories/' . $category_slug);
        $data = json_decode($data, true);

        // Articles are inside the "data" key
        $data = $data['data'];

        return $data["brothers"];
    }

    public static function getCategoryChildren($category_slug): array
    {
        // Instead of fetching the database, fetch it from the API
        $data = file_get_contents('https://api.devjobbers.com/categories/' . $category_slug);
        $data = json_decode($data, true);

        // Articles are inside the "data" key
        $data = $data['data'];

        return $data["children"];
    }

}