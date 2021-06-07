<?php
    class App {
        protected $controller = 'LoginController';
        protected $method = 'index';
        protected $params = [];

        public function __construct() {
            $url = $this->parseURL();
            if ( isset($url[0]) ) {

                if ( strtolower($url[0] === 'admin' ) ) {
                    $this->controller = 'LoginController';
                    unset($url[0]);

                    if ( isset($url[1]) ) {
                        if ( strtolower($url[1] === 'dashboard') ) {
                            unset($url[1]);

                            if ( isset($url[2]) ) {
                                if ( file_exists('app/controllers/Dashboard/'. $url[2] . 'Controller.php') ) {
                                    $this->controller = $url[2].'Controller';
                                    require_once 'app/controllers/Dashboard/'. $this->controller .'.php';
                                    unset($url[2]);
                                }

                                
                                if ( isset($url[3]) ) {
                                    if ( method_exists($this->controller, $url[3]) ) {
                                        $this->method = $url[3];
                                        unset($url[3]);
                                    }
                                }

                                
                            } else {
                                Abort::redirect(404);
                            }

                        } else {
                            Abort::redirect(404);
                        }

                        require_once 'app/controllers/Dashboard/'. $this->controller .'.php';
                        $this->controller = new $this->controller;
                        
                    } else {
                        require_once 'app/controllers/Auth/'. $this->controller .'.php';
                        $this->controller = new $this->controller;
                    }

                } else {
                    require_once 'app/controllers/Auth/'. $this->controller .'.php';
                        $this->controller = new $this->controller;
                }
                

            } else {
                
                require_once 'app/controllers/Auth/'. $this->controller .'.php';
                $this->controller = new $this->controller;

            }

            if ( !empty($url) ) {
                $this->params = array_values($url);
            }

            call_user_func_array([$this->controller, $this->method], $this->params);
        }

        public function parseURL() {
            if ( isset($_GET['url']) ) {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    } 
?>