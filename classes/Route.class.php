<?php

class Route{

        public static $validRoutes = array();

        public static function set($route, $function){

            self::$validRoutes[] = $route;
            
            if($_GET['url'] == $route){
                $function->__invoke();
            }
        }

        public static function dyn($dyn_routes) {
            $route_components = explode('/', $dyn_routes);
            $uri_components = explode('/', substr($_SERVER['REQUEST_URI'], strlen(BASEDIR)-1));
            for ($i = 0; $i < count($route_components); $i++) {
              if ($i+1 <= count($uri_components)-1) {
                $route_components[$i] = str_replace("<$i>", $uri_components[$i+1], $route_components[$i]);
              }
            }
            $route = implode($route_components, '/');
            self::registerRoute($route);
        }
}