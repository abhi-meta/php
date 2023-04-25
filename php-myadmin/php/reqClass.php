<?php

require($_SERVER['DOCUMENT_ROOT'].'/php/dbClass.php');
require($_SERVER['DOCUMENT_ROOT'].'/php/query-Class.php');

$db = new DatabaseConnection();
$queryOBJ = new queryClass();

class request
{

    private $db;
    private $queryOBJ;

    public function __construct()
    {
        $this->db = new DatabaseConnection();
        $this->queryOBJ = new queryClass();
    }

    public function signin($email, $psswd)
    {
        $query = $this->queryOBJ->signin($email);
        $result = $this->db->query($query);

        if ($result) {

            while ($row = $result->fetch_assoc()) {

                if (password_verify($psswd, $row['password'])) {

                    session_start();
                    
                    if ($row['is_admin']) {
                        echo "http://localhost:3000/myadmin.php";
                        $_SESSION['token'] = 'login';
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['is_admin'] = true;
                    } else {

                        if ($row['validate'] != 0) {
                            echo "http://localhost:3000/myprofile.php";
                            $_SESSION['token'] = 'login';
                            $_SESSION['is_admin'] = false;
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['validate'] = true;
                        } else {
                            $_SESSION['validate'] = false;
                            echo "Get validated";
                        }
                    }
                } else {
                    echo "Wrong Credential pass";
                }
            }
        } else {
            echo $result;
        }
    }

    public function signin_admin($email, $psswd)
    {
        $query = $this->queryOBJ->signin_admin($email);
        $result = $this->db->query($query);

        if ($result) {

            while ($row = $result->fetch_assoc()) {

                if (password_verify($psswd, $row['password'])) {

                    session_start();
                    $_SESSION['token'] = 'login';

                    if ($row['is_admin']) {
                        echo "http://localhost:3000/myadmin.php";
                        $_SESSION['is_admin'] = true;
                    }
                } else {
                    echo "Wrong Credential pass";
                }
            }
        } else {
            echo $result;
        }
    }

    public function signout()
    {

        session_start();
        session_destroy();
    }

    public function authorize($sno)
    {

        $query = $this->queryOBJ->authorize($sno);
        return $this->db->query($query);

    }

    public function unauthorize($sno)
    {

        $query = $this->queryOBJ->unauthorize($sno);
        return $this->db->query($query);

    }

    public function update($name,$phone,$address,$email)
    {

        $query = $this->queryOBJ->update($name,$phone,$address,$email);
        return $this->db->query($query);

    }

    public function signup($uname,$email,$psswd,$phone,$address,$name) {

        $query = $this->queryOBJ->signup($uname,$email,$psswd,$phone,$address,$name);
        return $this->db->query($query);
    }

    public function getPerson($email) {
        $query = $this->queryOBJ->getPerson($email);
        $result = $this->db->query($query);

        while ($row = $result->fetch_assoc()) {
            return json_encode($row); 
        }
    }

    public function changePassword($email,$pswd) {
        $query = $this->queryOBJ->changePassword($email,$pswd);
        return $this->db->query($query);

    }

    public function checkEmail($email) {
        $query = $this->queryOBJ->checkEmail($email);
        $result = $this->db->query($query);

        while ($row = $result->fetch_assoc()) {
            return json_encode($row); 
        }
    }

    public function checkEmailAdmin($email) {
        $query = $this->queryOBJ->checkEmailAdmin($email);
        $result = $this->db->query($query);

        while ($row = $result->fetch_assoc()) {
            return json_encode($row); 
        }
    }

    public function delete($sno) {
        $query = $this->queryOBJ->delete($sno);
        return $this->db->query($query);
    }

    public function fetchUsers() {
        $query = $this->queryOBJ->fetchUsers();
        return $this->db->query($query);
    }

    public function createOTP($email) {
        $query = $this->queryOBJ->createOTP($email);
        return $this->db->query($query);
    }

    public function removeOTP($email) {
        $query = $this->queryOBJ->removeOTP($email);
        return $this->db->query($query);
    }

    public function checkOTP($email) {
        $query = $this->queryOBJ->checkOTP($email);
        $result = $this->db->query($query);
        while ($row = $result->fetch_assoc()) {
            return json_encode($row); 
        }
    }

    public function checkPassadmin($email, $pass) {
        $query = $this->queryOBJ->checkPassadmin($email,$pass);
        $result = $this->db->query($query);
        while ($row = $result->fetch_assoc()) {
            return json_encode($row); 
        }
    }

    public function checkPass($email) {
        $query = $this->queryOBJ->checkPass($email);
        $result = $this->db->query($query);
        while ($row = $result->fetch_assoc()) {
            return json_encode($row); 
        }
    }
}


?>