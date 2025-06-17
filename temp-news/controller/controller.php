<?php 

require("./controller/indexcontroller.php");
require("./controller/errorcontroller.php");
class Controller
{
    static function Switch($c,$m,$a)
    {
        switch($c)
        {
            case 'index':
                indexController::indexAction($m,$a);
                break;
            case '':
                indexController::indexAction($m,$a);
                break;
            default:
                errorController::indexAction($m,$a);
                break;
        }
    }
    static function Switch_Date($c,$m,$a)
    {
        switch($c)
        {
            case 'index':
                indexController::indexAction($m,$a);
                break;
            case '':
                indexController::indexAction($m,$a);
                break;
            case $c:
                indexController::indexAction($m,$a);
                break;
            default:
                errorController::indexAction($m,$a);
                break;
        }
    }
    function __construct($c,$m,$a)
    {
        // $checkdate=false;
        if ( (App::CheckDate( $c, 'Y/m/d' ) /* true */) )
            self::Switch_Date($c,$m,$a);
        else
            self::Switch($c,$m,$a);
        
    }
}