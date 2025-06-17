<?php
require("./view/indexview.php");
class indexController{ 
    public static function indexAction($m,$a)
    {
        $view = "./view/index/view.php";
        indexView::display($view);
    }
    
}