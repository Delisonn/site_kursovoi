<?php
class User{
    private $user_id;
    private $login;
    private $email;
    private $passwords;
    private $salt;
    private $levels;
    private $fio;
    private $area;
    private $address;
    private $numer;

    public function __construct($user_id, $login, $email, $passwords, $salt, $levels)
    {
        $this->user_id = $user_id;
        $this->login = $login;
        $this->email = $email;
        $this->passwords = $passwords;
        $this->salt = $salt;
        $this->levels = $levels;
    }

    public function getUid()
    {
        return $this->user_id;
    }

    public function setUid($user_id)
    {
        $this->user_id = $user_id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->passwords;
    }

    public function setPassword($passwords)
    {
        $this->passwords = $passwords;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    public function getAccessLevel()
    {
        return $this->levels;
    }

    public function setAccessLevel($levels)
    {
        $this->levels = $levels;
    }


}
function getUserByLogin($login){
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbName = "television";
    $connection = mysqli_connect($hostname,$username,$password,$dbName) OR DIE("Не могу создать соединение ");
    $sql = "select * from users where login = '$login'";
    $rs = mysqli_query($connection, $sql) or die(mysql_error());
    $data = $rs->fetch_assoc();
    if ($data == null){
        return null;
    }else{
        return new User($data['id_user'], $data['login'], $data['email'], $data['passwords'], $data['salt'], $data['levels']);
    }
}
?>