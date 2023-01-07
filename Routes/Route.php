<?php

namespace Routes;

class Route {

    /**Хранит зарегистрированные маршруты
     * @var array $routes
     */
    private $routes=[];

    /**
     * @var string $callback
     * @param \Closure $callback Вызывается, когда текущий URL соответствует предоставленному действию
     */
    //Вызывается, когда текущий URL соответствует предоставленному действию
    public function router($action,\Closure $callback){
        $action=trim($action,'/');
        $this->routes[$action]=$callback;
    }


    /**Dispatch the router
     * @return void
     */
    //возвращает шаблон смотря какой URL сейчас
    function dispath($action)
    {
        $action = trim($action,'/');
        $callback = $this->routes[$action];
        echo call_user_func($callback);

    }

}