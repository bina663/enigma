<?php

    namespace App\Controllers;

    use App\Render;
    session_start();

    //recursos do miniframework
 
    class GameController extends Render
    {
        protected $view;
        public function __construct(){
            $this->view = new \stdClass();
        }
        public function start(){
        
           
           $_SESSION['acession'] = true;
           $_SESSION['level'] = 1;
           $_SESSION["next"] = false;
           $level =$this->checkAcession($_SESSION);
           $this->render("levels/".$level);
        }

        private function checkAcession($p){
            if(isset($p["acession"]) && $p["acession"] == true){
                if(isset($p["level"])){
                    try {
                        $level = "level".$p["level"];
                        
                        return $level;
                    } catch (\Throwable $th) {
                        var_dump($th);
                        // session_destroy();
                        // $this->render("home");
                    }
                }
            }else{
                session_destroy();
                $this->render("home");
            }
        }
        public function answer(){
            $fileJson = json_decode(file_get_contents("App/Views/pages/levels/levels.json"));
            $level = str_replace("levels/", "", $_POST["level"]);
            $answerBase64 = base64_encode($_POST["answer"]);
            
            if ($answerBase64 === $fileJson->$level->answer) {
                if (!isset($_SESSION["next"]) || $_SESSION["next"] === false) {
                    $_SESSION["next"] = true;
                    $_SESSION["level"]++;
                }
                
                header("Location: /level");
            } else {
                session_destroy();
                header("Location: /");
            }
        }

        public function level(){
            if($_SESSION["level"] == ""){{
                die("Error");
            }
            $_SESSION["next"] = false;
            if($nextLevel >= 6){
                session_destroy();
                $_SESSION["acession"] = false;
                $this->render("levels/win");
            }
            $this->render("levels/level".$nextLevel);
        }
        
        public function destroy(){
            session_destroy();
            header("Location: /");
        }
    }
?>