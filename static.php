<?php 
    class fruit {
        const DIRECT = "This is a fruit class!!";
        static $count = 1;
        public static function cut(){
            echo "noice";
        }
    }

    echo fruit::DIRECT;
    fruit::cut();
    echo fruit::$count;

?>