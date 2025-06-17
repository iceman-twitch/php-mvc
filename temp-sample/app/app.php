<?php
require_once './cfg/cfg.php';
// APPLICATION
class IceApp
{
    private $version;
    private $build;
    public function __construct()
    {
        $this->version = $GLOBALS['version'];
        $this->build = $GLOBALS['build'];
        require_once './view/view.php';
        require_once './model/model.php';
        require_once './controller/controller.php';
        define('DATABASE_NAME',$GLOBALS['dbname']);
        define('DATABASE_CONNECT',$GLOBALS['dbconnect']);
    }
    public function GetVersion()
    {
        return $this->version;
    }
    public function GetBuild()
    {
        return $this->build;
    }
    
}
class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 
class User {
    private $uname;
    
    public function __construct($uname)
    {
        $this->uname=$uname;
    }
    public function GenPass($passw)
    {
        /* $options = [
            'cost' => 14,
        ]; */
        $hash = password_hash($passw, PASSWORD_BCRYPT);
        // $hash = password_hash($passw, PASSWORD_BCRYPT, $options);
        // $salt = mcrypt_create_iv(22, MCRYPT_MODE_CBC);
        // $salt = base64_encode($salt);
        // $salt = str_replace('-', '.', $salt);
        // $hash = crypt($passw, '$2y$11$'.$salt.'$');
        return $hash;
    }
    public function Login($passw)
    {
        
    }
    public function PassVerify($passw)
    {
        $db = Database::connect();
        $check = false;
        try{
            $sql="SELECT * FROM users; WHERE name = '". $this->uname . "';";
            $query=$db->prepare($sql);
            $query->execute();
            $result = $query->fetch();
            // $query=$stmt->fetch();
            // $query->execute($sql);
            // echo "<h1>". (string)$sql ."</h1>";
            // $newhash='$2y$10$g40/FGDu.ghidAwdGTZzpO.o6SqvMnSfl8DHT7rVrJWMSFbS.h14u';
            // if (password_verify($passw,$newhash )) {
                // echo "verified";
            // }
            // else
            // {
                // echo"Not verified"; 
            // }
            if ($result && password_verify($passw, $result['passw']))
            {
                // echo "valid!";
                $check=true;
            } else {
                // echo "invalid: $passw";
            }
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
        }
        
        
        return $check;
        
    }
}
if ( !class_exists( 'Database' ) ) {
	class Database {
        private static $dbh;

        public static function connect() {

            $host = "mysql:host=localhost:3306;dbname=icedb";
            $username = "root";
            $password = "";
            $db="icedb";
            $server="localhost:3306";
            $conn = null;
            try {
                $conn = new PDO("mysql:host=localhost:3306", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "CREATE DATABASE icedb";
                // use exec() because no results are returned
                $conn->exec($sql);
                // echo "Database created successfully<br>";
            }
            catch(PDOException $e)
            {
                $error_message = $e->getMessage();
            }
            $conn = null;
            try {
                self::$dbh = new PDO( $host, $username, $password );
                self::$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT );
                self::$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
                self::$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                // $sql = "CREATE DATABASE icedb";
                // use exec() because no results are returned
                // self::$dbh->exec($sql);
                // echo "Database created successfully<br>";
            } catch( PDOException $e ){
                $error_message = $e->getMessage();
                exit();
            }
            return self::$dbh;
        }
        public static function sql($data){
            try {
                // sql to create table
                $sql = $data;

                // use exec() because no results are returned
                self::$dbh->exec($sql);
            }
            catch(PDOException $e)
            {
                $error_message = $e->getMessage();
            }
        }
    }

    class MYObject {
        public static $dbh = null;

        public function __construct(PDO $db = null) {
            if($db === null){
                $this->dbh = Database::connect();
            } else {
                $this->dbh = $db;
            }
        }
    }

    // class User extends myObject {
        // public function __construct($id = null, PDO $db = null) {
            // if($db === null){
                // parent::__construct();
            // } else {
                // parent::__construct($db);
            // }

            // if($id !== null){
                // return $this->select($id);
            // }
        // }

        // public function select($id) {
            // $retVal =false;
            // try {
                // $stmt = $this->dbh->prepare("SELECT...");
                // $stmt->execute();

                // if( $stmt->rowCount()==1 ){
                    // $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    // $retVal =json_encode($row);
                 // }
            // } catch (PDOException $e ) {
                // $error_message = $e->getMessage();
                // exit();
            // }
            // return $retVal;
        // }
    // }
}