<?php

/**
 * Base Controller - all other controller inherit from this.
 * Loads the models and views
 */

class Controller
{
    /**
     * Creates the model object
     * @param $model
     * @return mixed
     */
    public function model($model)
    {
        // load the model
        require_once '../app/models/' . $model . '.php';

        // Instantiate the model

        return new $model();
    }

    public function view($view, $data = [])
    {
        // check if view exsist
        if (file_exists('../app/views/' . $view . '.php')) {
            // load the model
            require_once '../app/views/' . $view . '.php';
        } else {
            // view doesn't exist
            die('View does not exist');
        }
    }
}