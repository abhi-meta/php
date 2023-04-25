<?php 
    trait operation {
        function start() {
            echo "started";
        }

        function stop() {
            echo "stopped";
        }
    }

    trait breaks {
        //This throws an error
        // function stop() {
        //     echo "stopped-2";
        // }
    }

    class vehicle {
        use operation;

        use breaks;

        //It is possible to ovveride 
        // function start(){
        //     echo "start-2";
        // }
    }

    $car = new vehicle();
    $car->start();
    $car->stop();
?>