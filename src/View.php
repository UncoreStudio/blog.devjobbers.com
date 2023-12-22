<?php

namespace AsaP;

use AsaP\Controller;

class View
{
    private $controller;

    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }

    /**
     * Get the controller instance associated with this view.
     *
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * Render the view.
     *
     * This method extracts the data variables from the controller and includes the view file.
     */
    public function render(): void
    {
        // Extract data variables from the controller into the current scope
        extract($this->controller->getData());

        // Include the view file
        require($this->controller->getView());
    }
}
