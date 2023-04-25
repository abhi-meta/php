<?php

    $books_obj = [
        [
            "book_name" => "The theory of everything",
            "price" => "$34.3",
            "purchase_link" => "www.example.com/buy",
            "author" => "stephan",
        ],
        [
            "book_name" => "The infinite resemblence",
            "price" => "$24.4",
            "purchase_link" => "www.example.com/buy",
            "author" => "mily",
        ],
        [
            "book_name" => "The infinite resemblence",
            "price" => "$28.5",
            "purchase_link" => "www.example.com/buy",
            "author" => "stacy",
        ],
    ];

    foreach( $books_obj as $book ) :
        
        if( $book["author"] === "stacy") :

            echo "<ul>";
                echo "<a href={$book["purchase_link"]}> <li> {$book["book_name"]} </li> </a>";   
                echo "<li> {$book["price"]} </li>";
            echo "</ul>";

        endif;
    endforeach;
?>