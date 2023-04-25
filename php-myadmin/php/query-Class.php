<?php 

    class queryClass{

        public function __construct()
        {

        }

        function getPerson($email) {
            return "select * from users where email='{$email}';";
        }

        function signup($uname,$email,$psswd,$phone,$address,$name) {
            return "INSERT INTO users (username,email,password,validate,is_admin,phone,address,name) values('{$uname}','{$email}','{$psswd}',0,0,'{$phone}','{$address}','{$name}')";
        }

        function unauthorize($sno){
            return "update users set validate=0 where sno={$sno};";
        }

        function authorize($sno) {
            return "update users set validate=1 where sno={$sno};";
        }

        function update($name,$phone,$address,$email) {
            return "update users set name='$name' where email = '$email';";
        }

        function delete($sno){
            return "delete from users where sno = {$sno}";
        }

        function signin($email){
            return "SELECT * FROM users WHERE email like '$email'and username not like 'root';";
        }

        function signin_admin($email) {
            return "SELECT * FROM users WHERE email like '$email'and username like 'root';";
        }

        function changePassword($email,$psswd) {
            return "update users modify set password='$psswd' where email='$email';";
        }

        function checkEmail($email){
            return "SELECT * FROM users WHERE email = '$email';";
        }

        function checkEmailAdmin($email){
            return "SELECT * FROM users WHERE email = '$email' and username='root';";
        }

        function fetchUsers() {
            return "SELECT * FROM users where is_admin != '1'";
        }

        function createOTP($email) {
            return "update users set otp=(select floor(0+ RAND() * 10000)) where email='$email';";
        }

        function removeOTP($email) {
            return "update users set otp=null where email='$email';";
        }

        function checkOTP($email) {
            return "select otp from users where email = '$email'";
        }

        function checkPass($email){
            return "Select * from users where email = '$email';";
        }
        
        function checkPassadmin($email,$pass){
            return "Select * from users where email = '$email' and username='root';";
        }
    }

?>