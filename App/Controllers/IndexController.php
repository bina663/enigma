<?php

    namespace App\Controllers;

    use App\Render;


    //recursos do miniframework
 
    class IndexController extends Render
    {
        protected $view;
        public function __construct(){
            $this->view = new \stdClass();
        }
        public function index(){
    
            $this->render('home');
        }
    }
?>