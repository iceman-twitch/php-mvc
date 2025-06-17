<?php
class View
{
    public $model;
    public function __construct($model) {
        // $this->controller = $controller;
        $this->model = $model;
    }
	
    public function output(){
        $data = $this->model->tstring;
        $template=$this->model->template;
        $theme=$this->model->theme;
        require_once($theme);
    }
}

class AboutView extends View
{
    public function __construct($model) {
        // $this->controller = $controller;
        // parent::View($model);
        $this->model = $model;
    }
}
class HomeView extends View
{
    public function __construct($model) {
        // $this->controller = $controller;
        // parent::View($model);
        $this->model = $model;
    }
}
class ErrorView extends View
{
    public function __construct($model) {
        // $this->controller = $controller;
        // parent::View($model);
        $this->model = $model;
    }
}
class CustomView extends View
{
    public function __construct($model) {
        // $this->controller = $controller;
        // parent::View($model);
        $this->model = $model;
    }
}