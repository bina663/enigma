<?php
    namespace App;

    abstract class Render{
        protected $view;
        public function __construct()
        {
            $this->view = new \stdClass();
        }
        /**
         * Funcao resposavel por renderizar o layout do site
         * @param: $view: e pra ser qual a pagina que e pra ser exibida; @layout: recebe o layout que e pra renderizar
         */
        protected function render($view, $layout = "index", $level = ""){
            $this->view->page = $view;
            if(file_exists("App/Views/index.php")){
                require_once("App/Views/$layout.php");
            }else{
                $this->content();
            }
        }
        protected function content(){
            $class_atual = get_class($this);
            $class_atual = str_replace('App\\Controllers\\',"",$class_atual);
            $class_atual = strtolower(str_replace('Controller',"",$class_atual));
            if(isset($level)){
                require_once('App/Views/pages/levels/'.$this->view->page.'.php');
            }else{
                require_once('App/Views/pages/'.$this->view->page.'.php');
            }
            
        }
    }