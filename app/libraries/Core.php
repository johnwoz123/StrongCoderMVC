<?php

/***
 * this takes our urls and pulling out what we need (/post/add) create an array from them and it will decide what to load
 * Class Core
 * App Core Class
 * Creates URL and loads core controller
 * URL Format - /controller/method/params
 */
class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    /**
     * constructor as of now calls get url which
     * Core constructor.
     */
    public function __construct()
    {
        //print_r($this->getUrl());
        $url = $this->getUrl();

        // look in controllers for first value
        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            // if it does exist, set as controller -  will overwrite pages
            $this->currentController = ucwords($url[0]);
            // unset 0 index
            unset($url[0]);
        }

        // require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        // Instantiate controller class
        $this->currentController = new $this->currentController;

        // check for the second part of the url
        if (isset($url[1])) {

            // check if the method exists, if so, set current method
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                // unset index 1
                unset($url[1]);
            }
        }
        // echo $this->currentMethod;


        /**
         * This checks to see if there are any parameters, if so return them else empty array
         * get params
         */
        $this->params = $url ? array_values($url) : [];

        // call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod],$this->params );

    }

    /**
     * if the url is set we want to
     * 1. filter as url format - no characters a url cannot have
     * 2. break into an array
     * 3. return the url
     * @return array|mixed|string
     */
    public function getUrl()
    {
        /**
         * if it is set we will want to get rid of trailing /
         */
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}


