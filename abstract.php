<?php
abstract class animal
{
    public $greet="Hello ";
    abstract function makesound($h):int;
}

class dog extends animal
{
    function makesound($name, $name2="Jeremy Dsouza") : int
    {
        echo $name.$name2;
        return 20;
    }
}

$an= new dog();
echo $an->greet;


$dog = new dog();
$dog->makeSound("suresh", " James charles");
?>