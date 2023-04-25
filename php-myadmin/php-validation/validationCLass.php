<?php 

    class validation{

        public function emailValidation($email) {
            return preg_match('/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/',$email);
        }

        public function addressValidation($address) {
            return preg_match('/^(\.*\d+)(\s*?)(-*?)(?=.[a-zA-Z]).{3,}$/',$address);
        }

        public function validatePhone($phone){
            return preg_match('/^(\.*\d{10})$/',$phone);
        }

        public function validateFullname($fullname) {
            return preg_match('/^[a-zA-Z ]{3,}$/',$fullname);
        }

        public function validateUsername($username) {
            return preg_match('/^(?![0-9]*$)[._*?[a-zA-Z0-9]{3,}$/',$username);
        }

        public function userValidation($email) {
            session_start();
            $current_email = $_SESSION['email'];

            if($current_email == $email){
                return true;
            }else if($_SESSION['is_admin']){
                return true;
            }else {
                return false;
            }
            
        }
    }


?>