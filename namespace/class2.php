<?php
    namespace test;
    class fruit{
        public $color;
        public $name;

        function __construct($color,$name){
            echo "constructed <br>";
            $this->color = $color;
            $this->name = $name;
        }
        function getname(){
            echo "<b>test {$this->name}<br></b>";
        }
        function __destruct(){
            echo "destructed <br>";
        }
    }
?>  