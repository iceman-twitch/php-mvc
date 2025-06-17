<?php
require("./view/errorview.php");
class errorController{ 
    public static function indexAction($m,$a)
    {
        $view = "./view/404/view.php";
        errorView::display($view);
    }
    
}