<?php
/**
 * Created by PhpStorm.
 * User: johnwozniak
 * Date: 12/29/17
 * Time: 5:24 PM
 */

class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = ['title' => 'welcome'];


        // view function from, Core
        $this->view('pages/index', $data);

    }

    public function about()
    {
        $data = ['title' => 'About us'];
        $this->view('pages/about', $data);

    }

}