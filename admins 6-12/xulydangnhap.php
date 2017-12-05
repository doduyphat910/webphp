<?php
session_start();
$host = "localhost";
$user = 'root';
$pass = '';
$db = "tintuc";
try {
    $connection = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

class dologin {
    public $connection;
    function __construct($connection) {
        $this->connection = $connection;
    }

    public function __destruct() {
        
    }

    function CheckPassword($password) {
        if (!$password) {
            throw new Exception('Enter password.');
        }

        if (!preg_match('/^(?=.*[A-Z])(?=.*[0-9])[0-9a-zA-Z]{6,}$/', $password)) {
            throw new Exception('Enter valid pass.');
        }
        return true;
    }

    function checkUser($user) {
        if (!$user) {
            throw new Exception('Enter your user.');
        }
        return true;
    }

    function Login() {
        try {
            $user = isset($_POST['username']) ? trim($_POST['username']) : null;
            $password = isset($_POST['password']) ? trim($_POST['password']) : null;
            $this->checkUser($user);
            $this->CheckPassword($password);
            if ($this->checkUser($email) && $this->CheckPassword($password)) {
//                $connection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db . ';charset=utf8', 'root', $this->pass);
                $statement = $this->connection->prepare("select idUser from user where UserName = :username and Password = :password");
                $statement->execute(array(':username' => $user, ':password' => $password));
                $statement->fetch(PDO::FETCH_ASSOC);
                if ($statement->rowCount() > 0) {
                    $_SESSION['logged'] = TRUE;
                    $_SESSION['user'] = ['username' => $user, 'password' => $password];
                    return true;
                } else {
                    return FALSE;
                }
            }

            $message = 'Logged.';
            WriteLog('in', $user);
        } catch (Exception $e) {
            $message = $e->getMessage();
        }
    }

    function Logout() {
        session_destroy();
        WriteLog('out', $email = "");
        header("Location: http://localhost/training-git/login.php");
    }

    public function is_logged() {
        if (isset($_SESSION['logged'])) {
            return true;
        }
        return FALSE;
    }

    public function redirect($url) {
        header('Location:' . $url);
    }

    function WriteLog($action = '', $email) {
        $handle = fopen("log.txt", "a");
        fwrite($handle, 'User ' . $email . ' logged ' . $action . ' to the system at ' . date('d/m/Y H:i:s') . '.');
        fwrite($handle, "\r\n");
        fclose($handle);
    }

    function inLogs() {
        $content = file_get_contents("log.txt");
        echo ($content);
    }
}
$obj = new dologin($connection);