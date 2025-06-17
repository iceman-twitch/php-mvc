<?php

require_once './app/app.php';

$GLOBALS['app'] = new IceApp(); // Creating Application
require_once './view/login/view.php';
$db = Database::connect();
$db=null;

// $user= new User('admin');
//echo $user->GenPass("a1230ice") . '<br>';
// $check = $user->PassVerify('a1230ice');
// echo "<h1> RESULT?" . ($check ? 'TRUE' : 'FALSE') . "</h1>";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    if (!empty($_POST["login_u"]) and !empty($_POST["login_p"])) {
        ?><script>alert("<?php echo $_POST["login_u"] . ' ' . $_POST["login_p"]; ?>")</script><?php
    }

}
if (!empty($_GET['page'])) {
    
    $page = $_GET['page'];
    $data = array(
        // 'about' => array('model' => 'AboutModel', 'view' => 'AboutView', 'controller' => 'AboutController'),
        // 'portfolio' => array('model' => 'PortfolioModel', 'view' => 'PortfolioView', 'controller' => 'PortfolioController'),
        'home' => array('model' => 'HomeModel', 'view' => 'HomeView', 'controller' => 'HomeController'),
        'custom' => array('model' => 'CustomModel', 'view' => 'CustomView', 'controller' => 'CustomController')
    );
    $found=false;
    foreach($data as $key => $components){
        if ($page == $key) {
            
            $model = $components['model'];
            $view = $components['view'];
            $controller = $components['controller'];
            $found=true;
            break;
        }
    }
    if (!$found) {
        // ERROR 
        $m = new ErrorModel();
        // $m->parent::Model();
        $c = new ErrorController($m);
        $v = new ErrorView($m);
        echo $v->output();
        $model = null;
        break;
    }

    if (isset($model)) {
        $m = new $model();
        // $m->parent::Model();
        $c = new $controller($m);
        $v = new $view($m);
        echo $v->output();
        
    }
}
else
{
    $m = new HomeModel();
    // $m->parent::Model();
    $c = new HomeController($m);
    $v = new HomeView($m);
    echo $v->output();
    
}
// $mm =new Model();
// $cc = new Controller($mm);
// echo $cc->LoginForm();
// echo '<footer><a href="#" style="color:white;">' . $app->GetBuild() . '</a></footer>';
$db=null;