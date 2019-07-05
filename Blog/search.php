<?php
session_start();

    $link = mysqli_connect('localhost', 'root', '', 'StartSawDB');

    $query = $_GET['query']; 
    // gets value sent over search form
    
    if (strlen($query) < 1) {
        header('#'); 
        die("");
    }

    $min_length = 3;
    // you can set minimum length of the query if you want
     
    $query = htmlspecialchars($query); 
    // changes characters used in html to their equivalents, for example: < to &gt;
        
    $query = mysqli_real_escape_string($link, $query);
    // makes sure nobody uses SQL injection
        
    $raw_results = mysqli_query($link, "SELECT * FROM articolo
    WHERE (`title` LIKE '%".$query."%') OR (`text` LIKE '%".$query."%')") or die(mysql_error());
            
    // * means that it selects all fields, you can also write: `id`, `title`, `text`
    // articles is the name of our table
        
    // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
    // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
    // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
        
    if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
            
        $_SESSION['risultati'] = array();
        while($results = mysqli_fetch_array($raw_results)){
            array_push($_SESSION['risultati'], $results);
            }
            header('Location: results.php');
        }
    else { // se non ci sono risultati
        header('Location: blog.php'); 
    }
?>