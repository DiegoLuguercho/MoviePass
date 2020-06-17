<?php 
    namespace Config;

    class Request
    {
        private $controller;
        private $method;
        private $parameters = array();
        
        public function __construct()
        {
            $url = filter_input(INPUT_GET, "url", FILTER_SANITIZE_URL);

            $urlArray = explode("/", $url);
         
            $urlArray = array_filter($urlArray);

            if(empty($urlArray))
                $this->controller = "Home";            
            else
                $this->controller = ucwords(array_shift($urlArray));

            if(empty($urlArray))
                $this->method = "index";
            else
                $this->method = array_shift($urlArray);

            $methodRequest = $this->getMethodRequest();
                        
            if($methodRequest == "GET")
            {
                if(!empty($urlArray))
                {                    
                     $this->parameters = $urlArray;
                }                
            }
            else
                $this->parameters = $_POST;
                // var_dump($_POST);
            
            if($_FILES)
            {
                $this->parameters = $_FILES;

            }
        }

        private static function getMethodRequest()
        {
            return $_SERVER["REQUEST_METHOD"];
        }            

        public function getController() {
            return $this->controller;
        }

        public function getMethod() {
            return $this->method;
        }

        public function getparameters() {
            return $this->parameters;
        }
    }
?>