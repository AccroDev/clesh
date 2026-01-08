<?php

    namespace Controllers;

    class LoadPage {

        public function __construct($name)
        {
            ob_start();
                require 'Views/template/'.$name.'.php'; 
            $content = ob_get_clean();
            
            require("Views/layout.php");

        }

    }