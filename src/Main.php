<?php

namespace AsaP;

use AsaP\Entities\User;

class Main
{
    private static $instance;
    private User $currentUser;

    public function __construct()
    {
        self::$instance = $this;
    }

    public function init(): void
    {
        // This method will be used to initialize the application
        // It will be responsible for getting the relevant controller and rendering the view
        // For now, it is empty
    }

    public static function getInstance(): Self
    {
        // This method returns the Main singleton instance
        if (self::$instance === null) {
            self::$instance = new Self();
        }

        return self::$instance;
    }

    public function getConfig(): Object
    {
        // This method reads and returns the application configuration from a JSON file
        return json_decode(file_get_contents("asap_config.json"));
    }

    public function getEnvironment()
    {
        return strtolower($this->getConfig()->env);
    }

    public function getRootUrl(): string
    {
        $config = $this->getConfig();
        $env = $this->getEnvironment();

        return $config->$env->url;
    }

    public static function redirect($destination): void
    {
        // This method redirects to a given URL using the header function
        header("Location: $destination");
    }

    public function getSession(): array
    {
        // This method returns the session superglobal
        return $_SESSION;
    }

    public function getSessionData($index): string
    {
        return $this->getSession()[$index];
    }

    public function setSessionData($index, string $value): void
    {
        $_SESSION[$index] = $value;
    }

    public function getCurrentUser(): User | bool
    {
        // This method returns the current user object or false if there is no logged-in user
        // It uses the session variable to get the user ID and create a new user object
        // It also caches the user object to avoid unnecessary database queries
        
        $currentUserId = $this->getSessionData('user_id');

        if (isset($currentUserId) == false)
            return false;

        if (isset($this->currentUser) == false)
            $this->currentUser = new User($currentUserId);

        return $this->currentUser;
    }
}
