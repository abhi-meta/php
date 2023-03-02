<?php 
    interface animal{
        function makeSound();
    }
    class cat implements animal{
        public function makeSound(){
            echo "Meow<br>";
        }
    }
    class dog implements animal{
        public function makeSound(){
            echo "Bark<br>";
        }
    }
    class cow implements animal{
        public function makeSound(){
            echo "Mooo<br>";
        }
    }
    $cat = new cat();
    $dog = new dog();
    $cow = new cow();

    $animals = array($cat,$dog,$cow);

    foreach($animals as $animal){
        $animal->makeSound();
    }
?>