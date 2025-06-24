<?php

class Route {
    public static function handle($uri, $controllers) {
        if ($uri === '/register') {
            $controllers['userController']->register();
        } elseif ($uri === '/login') {
            $controllers['userController']->login();
        } else {
            echo "404 Not Found";
        }
    }
}