<?php 
      session_start();
      use Controllers\Router; 

      require 'vendor/autoload.php'; 

      $router = new Router('Controllers');
      $GLOBALS['router'] = $router;
      
      $router->get('/','LoadPage','HomePage')
            ->get('/cours','LoadPage','cours') 
            
            ->get('/login','LoadPage','login') 
            ->post('/api/login','AuthController@login','api.login') 
            
            
            ->get('/signin','LoadPage','signin') 
            ->post('/api/signin','AuthController@signin','api.signin') 
            
            ->get('/products','LoadPage','products')  
            ->get('/add-to-cart','PanierController@addInCart','add.product') 
            ->get('/cart','LoadPage','ShoppingCart') 
            ->post('/cart/update','PanierController@update','cart.update') 
            ->post('/cart/confirm','PanierController@confirm','cart.confirm') 
            

            ->get('/admin','LoadPage','admin') 
            ->post('/admin/createpage','AdminController@createpage','createpage') 
            
            ->get('/logout','AuthController@logout','logout') 

            ->get('/admin/product','LoadPage','admin/Products') 
            ->post('/admin/product/add','ProductController@addProduct','Products.add') 
            
            ->get('/product/[*:slug][i:id]','LoadPage@frombdd','products.details') 
            ->get('/profile','LoadPage','profile') 

            /* components */ 
            ->get('/admin/pages','LoadPage','admin/addPages') 
            ->get('/admin/components','LoadPage','admin/components') // and add screen
            ->post('/admin/components/save','ComponentController@save','saveComponent') 
            ->post('/admin/components/get','ComponentController@get','getComponent')  
            
            ->post('/admin/pages/store','VisualEditorController@createpage','CreatePageCoponents') // create page
            ->post('/admin/pages/update-content','VisualEditorController@UpdatePage','UpdatePage') // updata page or set content
            ->get('/admin/pages/get-content','VisualEditorController@getContent','getContent') // get id content
            ->post('/preview','VisualEditorController@showPreview','preview') //preview when is editing
            ->get('/[*:url]', 'VisualEditorController@dynamic', 'dynamic_page')//load page
            ->run();
            
?>
