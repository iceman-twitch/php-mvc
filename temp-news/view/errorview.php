<?php
class errorView{
    public function __construct(){
        
    }
    public static function display($v){
        include("$v");
    }
}