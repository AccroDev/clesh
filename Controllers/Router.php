<?php
namespace Controllers;
use AltoRouter;
class Router{
    private $vieuwPath;    
    /**
     * router
     * cette class utilise AltoRouter comme routeur principal
     * @var AltoRouter
     */
    private $router;
    public function __construct(string $vieuwPath)
    {
        $this->vieuwPath = $vieuwPath;
        $this->router =new AltoRouter();   
    }
    public function get(string $url,string $view,?string $name = null):self
    {
        $this->router->map('GET',$url,$view,$name);
        return $this;
    }
    public function post(string $url,string $view,?string $name = null):self
    {
        $this->router->map('POST',$url,$view,$name);
        return $this;
    }
    public function run():self
    {
       $match = $this->router->match(); 
       
        if (!$match) {
            $view= "LoadPage";
            $name = "e404";
        }
        $explose = explode('@',$view ?? $match['target']);
        
        $className = $explose[0];
        $methode = isset($explose[1]) ? $explose[1] : null; 

        $class = $this->vieuwPath . '\\'. (isset($className) ? $className : $view);
        $instance = new $class($name ?? $match['name']);
        isset($methode) && $methode ? $instance->$methode($name ?? $match['name']) : '';
        return $this;  
    } 

    public function generate(string $name)
    {
        return $this->router->generate($name) ;
    }
}

?>