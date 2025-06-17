<?php

class Route{
    public static $Path;
    public static $Args="";
    public static $Controller = "";
    public static $Method = "";
    public static $Action = "";
    public static $Controller2 = "";
    public static $Method2 = "";
    public static $Action2 = "";
    public static $Langugage = "hu";




    function __construct()
    {
        // include callable controllers here
        $a = explode("?", htmlspecialchars( trim( strtolower( $_SERVER['REQUEST_URI'] ) ) ) ); // split querystring
        $b = explode("/", $a[0]); // get url parts
       
        
        
        self::Return(2,$b);
        
        
        /*if (count($partsB) < 2)
            die("missing controller in url");
        elseif (count($partsB) < 3)
            die("missing action in url");*/
    }

    // Simple Route Means You handle the route like basic sites with 3 part.
    public static function SimpleRoute($b)
    {
        if(isset($b[1])) self::$Controller=$b[1];
        
        if(isset($b[2])) self::$Method=$b[2];
            

        if(isset($b[3])) self::$Action=$b[3];
    }
    // Article Route Means You Handle The Route In Dates Like /YYYY/MM/DD
    // Easy To Manipulate It.
    public static function ArticleRoute($b,$lang)
    {   
        // Add Language or not?

        if ( $lang==1 )
        {
            if ( isset($b[1]) ) self::$Langugage=$b[1];
            // Get Year Month and Day ( Also you change these things if you want not so hard stuffs )     
            if(isset($b[2])&&isset($b[3])&&isset($b[4])) self::$Controller2=$b[2] ."/". $b[3] ."/". $b[4];

            /* -------------------------------------
            As You Can See $b[2] $[3] $[4] Holds The Date 
            If You Want You Can Pass Them To $Controller2 In a Different Way
            ------------------------------------------ */
            
            if(isset($b[5])) self::$Method2=$b[5];
                

            if(isset($b[6])) self::$Action2=$b[6];

        }
        else{
            // Get Year Month and Day ( Also you change these things if you want not so hard stuffs )     
            if(isset($b[1])&&isset($b[2])&&isset($b[3])) self::$Controller2=$b[1] ."/". $b[2] ."/". $b[3];

            /* -------------------------------------
            As You Can See $b[1] $[2] $[3] Holds The Date 
            If You Want You Can Pass Them To $Controller2 In a Different Way
            ------------------------------------------ */

            if(isset($b[4])) self::$Method2=$b[4];
                

            if(isset($b[4])) self::$Action2=$b[4];
        }
        
    }
    
    public static function Return($a,$b)
    {
        switch ($a)
        {
            // In This Case We Return  Controller - Method - Action
            case 0:
                self::SimpleRoute($b);
                break;  
            // In This Case We Return Date Controller - Method - Action
            case 1:
                self::ArticleRoute($b,0);
                break;
            // In This Case We Return Language Date Controller - Method - Action
            case 2:
                self::ArticleRoute($b,1);
                break;
            // case 3:
            //     break;
            default:
                break;
        }
        return array(self::$Controller, self::$Method, self::$Action);
    }
    
    public function Output()
    {
        $Controller=self::$Controller;
        $Method=self::$Method;
        $Action=self::$Action;
        echo "Controller => [$Controller] Method => [$Method] Action => [$Action]";
    }
    public function Output2()
    {
        $Controller=self::$Controller2;
        $Method=self::$Method2;
        $Action=self::$Action2;
        echo "Controller => [$Controller] Method => [$Method] Action => [$Action]";
    }
    public function Output3()
    {
        $Langugage=self::$Langugage;
        $Controller=self::$Controller2;
        $Method=self::$Method2;
        $Action=self::$Action2;
        echo "Language => [$Langugage] Controller => [$Controller] Method => [$Method] Action => [$Action]";
    }
}

/*
$className = $partsB[1];
$methodName = $partsB[2];
if (class_exists($className))
    if (!is_subclass_of($className, "controller"))
        die(htmlspecialchars("Class $className doesn't extend controller")); // prevents use of unauthorized classes
    else
        $controller = new $className();
else
    die(htmlspecialchars("Class $className doesn't exist"));

if (!method_exists($controller, $methodName))
    die(htmlspecialchars("Method $methodName doesn't exist"));
else
    $controller->$methodName();*/