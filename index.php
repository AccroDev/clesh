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

            ->get('/article/[*:slug][i:id]','LoadPage@frombdd','article') 

            /* components */
            ->get('/admin/components/add','LoadPage','addComponent') 
            ->get('/admin/pages/add','LoadPage','addPages') 
            ->post('/admin/components/save','ComponentController@save','saveComponent') 
            ->post('/admin/components/get','ComponentController@get','getComponent') 

            
            
            ->get('/logout','AuthController@logout','logout') 
            
            
            ->post('/admin/pages/store','VisualEditorController@createpage','CreatePageCoponents') // create page
            ->post('/admin/pages/update-content','VisualEditorController@UpdatePage','UpdatePage') // updata page or set content
            ->get('/admin/pages/get-content','VisualEditorController@getContent','getContent') // get id content
            ->post('/preview','VisualEditorController@showPreview','preview') //preview when is editing
            ->get('/[*:url]', 'VisualEditorController@dynamic', 'dynamic_page')//load page
            ->run();
            
?>
