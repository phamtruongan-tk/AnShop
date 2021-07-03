<?php
 session_start();
    class App{
        protected $controller = "Home";
        protected $action = "Default";
        protected $param = [];
        public function __construct()
        {
            $url = $this->UrlProcess();
            // xu ly controller
            if(file_exists("./mvc/controllers/".$url[0]."Controller.php")){
                $this->controller = $url[0];
                unset($url[0]);
            }
            require_once "./mvc/controllers/".$this->controller."Controller.php";
            $this->controller= new $this->controller;
            // xu ly action
            if(isset($url[1])){
                if(method_exists($this->controller, $url[1])){
                    $this->action= $url[1];
                }
                unset($url[1]);
            }
            // xu ly param
            $this->param = $url?array_values($url):[];
            // goi ham chay
            call_user_func_array([$this->controller, $this->action], $this->param);

        }
        function UrlProcess(){
            if(isset($_GET["url"])){
                return explode("/", filter_var(trim($_GET["url"], "/")));
            }
        }
    }
?>