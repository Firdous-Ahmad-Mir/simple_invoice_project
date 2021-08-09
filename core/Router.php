<?php
class Router
{
        public $routes = [
            'GET' => [],
            'POST' => []
        ];


    public static function load($file){
        $router = new static;
        require $file;
        return $router;   
    }


    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri]=$controller;
    }
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri]=$controller;
    }

    public function direct($uri,$requestType){
     
        if(array_key_exists($uri,$this->routes[$requestType])){
          return $this->CallUrl(
              ...explode('@', $this->routes[$requestType][$uri])
          
            );
        }
        throw new Exception('No Route Defined For The Uri');
    }
    protected function CallUrl($controller, $page)
  
    {   // die(var_dump($controller,$page));
        if(! method_exists($controller, $page)){
            
        throw new Exception(
            "{$controller} does not respond to the {$page} Page"
        );
    }
        $controller = new $controller;
        return $controller->$page();
        //return (new $controller)->$page();
    }
}