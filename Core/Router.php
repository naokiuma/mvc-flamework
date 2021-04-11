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

       public function add($route,$params = []){

             // Convert the route to a regular expression: escape forward slashes
            $route = preg_replace('/\//', '\\/', $route);

            // Convert variables e.g. {controller}
            $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

             // Convert variables with custom regular expressions e.g. {id:\d+}
            $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);


            // Add start and end delimiters, and case insensitive flag
            $route = '/^' . $route . '$/i';
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

            /*
            foreach($this->routes as $route => $params){
                if($url == $route){
                    $this->params = $params;
                    return true;
                }
            }
            */

            //正規表現で調整
            foreach ($this->routes as $route => $params) {
                if (preg_match($route, $url, $matches)) {
                    // Get named capture group values
                    //$params = [];
    
                    foreach ($matches as $key => $match) {
                        if (is_string($key)) {
                            $params[$key] = $match;
                        }
                    }
    
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