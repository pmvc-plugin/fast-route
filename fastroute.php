<?php
namespace PMVC\PlugIn\FastRoute;
use FastRoute\Dispatcher;

${_INIT_CONFIG}[_CLASS] = 'PMVC\PlugIn\FastRoute\Routing';

class Routing extends \PMVC\PLUGIN
{
    
    private $dispatcher;
    private $routes;

    protected function createDispatcher()
    {
        return \FastRoute\simpleDispatcher(function ($r) {
            foreach ($this->routes as $route) {
                $r->addRoute($route['method'], $route['uri'], $route['action']);
            }
        });
    }

    public function addRoute($method, $uri, $action){
        $this->routes[$method.':'.$uri] = array(
            'method'=>$method,
            'uri'=>$uri,
            'action'=>$action
        );
    }

    public function getDispatch($method,$uri){
        $this->dispatcher = $this->createDispatcher(); 
        $routeInfo = $this->dispatcher->dispatch($method, $uri);
        switch ($routeInfo[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                return 404;
                break;
            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                return 405;
                break;
            case \FastRoute\Dispatcher::FOUND:
                $return = new \stdclass();
                $return->action = $routeInfo[1];
                $return->var = $routeInfo[2];
                return $return;
                break;
        }
    }
}
?>
