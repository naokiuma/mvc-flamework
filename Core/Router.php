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

        /**
         * match the route to the routes in the routng table, 
         * setting the $params property f a route s found.
         * @param strng $url the route URL
         * @return boolen true if a match found, false otherwise
         */

         public function match ($url)
         {
             foreach($this->routes as $route => $params){
                 if($url == $route){
                     $this->params = $params;
                     return true;
                 }
             }

             return false;
         }

         /**
          * Get the currently matched parameters
          *
          * @return array
          */
          public function getParams()
          {
              return $this->params;
          }

 }