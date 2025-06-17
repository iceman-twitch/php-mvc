<?php

class App
{
    public static $Version;
    public static $Language="";

    
    function __construct()
    {
        require("./cfg/cfg.php");
        $config = new Config();
        $table = $config::Load();

        self::$Language=self::Get_IP();
        echo "LANGUGAGE: " . self::$Language . "<br>";
        self::$Version = $table["version"];
        // echo self::$Version;
        require("./app/route.php");
        $route = new Route();
        //echo "<br>";
        // $route->Output();
        //echo "<br>";
        $route->Output3();
        
        require("./controller/controller.php");
        // $data=$route::Return();
        $controller= new Controller($route::$Controller2,$route::$Method2,$route::$Action2);
        //echo "SZEVASZ";
        //$this->Version $config->cfg["version"];
    }

    public static function Get_IP()
    {
        $ip=null;
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        	$ip = $_SERVER['HTTP_CLIENT_IP'];}
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
        	$ip = $_SERVER['REMOTE_ADDR'];
        }
        $url = "http://api.wipmania.com/". $_SERVER['REMOTE_ADDR'];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        //$url = "http://api.wipmania.com/".$ip;
        //$country = file_get_contents($url); //ISO code for Nigeria it is NG check your country ISO code
        if (!empty($output) && $output =="AT") $output="de";
        elseif (!empty($output) && $output =="NL") $output="de";
        elseif(!empty($output) && $output == "HU") $output="hu"; 
        else $output="en";

        return $output;
    }

    public static function CheckDate( $date, $format = 'Y-m-d' )
    {
        $b=false;
        $d = DateTime::createFromFormat( $format, $date );
        if ( $d && $d->format($format) == $date )
            $b= true;
        return $b;
    }
    
}