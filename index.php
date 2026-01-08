<?php

      session_start();
      use Controllers\Router; 

      require 'vendor/autoload.php'; 

      $router = new Router('Controllers');
      $router->get('/','LoadPage','HomePage')
            ->get('/cours','LoadPage','cours') 
            
            ->get('/login','LoadPage','login') 
            ->post('/api/login','AuthController@login','api.login') 
            
            
            ->get('/signin','LoadPage','signin') 
            ->post('/api/signin','AuthController@signin','api.signin') 
            
            ->get('/admin','LoadPage','admin') 
            ->post('/admin/createpage','AdminController@createpage','createpage') 
            ->run();

?>
