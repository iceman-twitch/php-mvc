<?php
class Controller
{
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }
    
    public function LoginForm()
    {
        $action='#';
        return '<form action="' . $action . '" method="post">' . 
        '<p>Username: <input type="text" name="uname" /></p>' . 
        '<p>Password: <input type="password" name="pasw" /></p>' . 
        '<p><input type="submit" value="Login" /></p></form>';
    }
}
class AboutController extends Controller
{
    public function __construct($model) {
        $this->model = $model;
    }
}
class HomeController extends Controller
{
    public function __construct($model) {
        $this->model = $model;
    }
}
class ErrorController extends Controller
{
    public function __construct($model) {
        $this->model = $model;
    }
}
class CustomController extends Controller
{
    public function __construct($model) {
        $this->model = $model;
    }
}