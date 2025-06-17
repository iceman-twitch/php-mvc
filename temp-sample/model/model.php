<?php

class Model
{
    public $tstring;
    public $template;
    public $theme;

    public function __construct(){
        $this->tstring = "MVC + PHP = Awesome!";
        $this->template = "home/view.php";
        $this->theme = "template/temp.php";
    }
}
class AboutModel extends Model
{
    public $tstring="About";
    public $template="about/view.php";
        public function __construct(){
        $this->theme = "template/temp.php";
    }
}
class HomeModel extends Model
{
    public $tstring="Welcome Home";
    public $template="home/view.php";
        public function __construct(){
        $this->theme = "template/temp.php";
    }
}
class ErrorModel extends Model
{
    public $tstring="PAGE NOT FOUND";
    public $template="error/view.php";
        public function __construct(){
        $this->theme = "template/temp.php";
    }
}

class CustomModel extends Model
{
    public $tstring="Custom Page";
    public $template="custom/view.php";
        public function __construct(){
        $this->theme = "template/temp.php";
    }
}
