<?php

namespace AsaP\Entities;

class Category
{
    // Declare properties
    public int $category_id;
    public string $category_name;
    public string $category_slug;
    public int $category_parent_id;
    public array $children;
    public array $brothers;

    public function __construct(array $category, array $children = [], array $brothers = [])
    {
        $this->category_id = $category['category_id'];
        $this->category_name = $category['category_name'];
        $this->category_slug = $category['category_slug'];
        $this->children = $children;
        $this->brothers = $brothers;
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->category_id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id): void
    {
        $this->category_id = $id;
    }

    /**
     * Get the valuename
     */
    public function getName(): string
    {
        return $this->category_name;
    }

    /**
     * Set the valuename
     *
     * @return  self
     */
    public function setName($category_name): void
    {
        $this->category_name = $category_name;
    }

    /**
     * Get the value of slug
     */
    public function getSlug(): string
    {
        return $this->category_slug;
    }

    /**
     * Set the value of slug
     *
     * @return  self
     */
    public function setSlug($category_slug): void
    {
        $this->category_slug = $category_slug;
    }

    /**
     * Get the value of parent_id
     */
    public function getParentId(): int
    {
        return $this->category_parent_id;
    }

    /**
     * Get the values of brothers
     */
    public function getBrothers(): array
    {
        return $this->brothers;
    }

    /**
     * Get the values of children
     */
    public function getChildren(): array
    {
        return $this->children;
    }
}