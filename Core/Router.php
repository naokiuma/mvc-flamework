<?php

 class Router{
     /**
      * Associative array of routes(the routing table)
      * @var array
      */
      protected $routes = [];//protectedは非公開だが継承は可能

      /**
       * Add a route to the routing table
       * 
       * @param string $route the route URL
       * @param array $params Parameters(controller,acton etc)
       * @return void 
       */

       public function add($route,$params){
           $this->routes[$route] = $params;
       }

       /**
        * get all ther routes from the routing table
        *
        *@return array
        */

        public function getRoutes(){
            return $this->routes;
        }

 }