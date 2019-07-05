<?php
    
    function get_recent() {
        include "connection.php";
        $query = "SELECT title, description FROM articolo";
        $result = $conn->query($query);
        $x = 1;
        while($x<=5) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $title = $row["title"];
                $des = $row["description"];
                echo "<div class = recent>" . "<h2>" . "<a href='blog2.php' id= $x  onclick='get_id(this.id)'>". $title . "</a>" . "</h2>" . $des . "</div>"; 
                $x++;
            }
        }
    }

    function get_most_viewed(){
        include "connection.php";
        $query = "SELECT title, description, views, id FROM articolo ORDER BY views DESC";
        $result = $conn->query($query);
        $x = 1;
        while($x<=5) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $title = $row["title"];
                $des = $row["description"];
                $idMostViewed = $row["id"];
                echo "<div class = recent>" . "<h2>" . "<a href='blog2.php' id= $idMostViewed  onclick='get_id(this.id)'>". $title . "</a>" . "</h2>" . $des . "</div>"; 
                $x++;
            }
        }
    }


    function get_article() {
        include "connection.php";
        if (!empty( $_COOKIE['id'] ) ) {
            $id = $_COOKIE['id'];
            $query2 = "SELECT title, text, picture FROM articolo WHERE id=$id";
            $result2 = $conn->query($query2);
            if ($result2->num_rows > 0) { 
                $row2 = $result2->fetch_assoc();
                $title2 = $row2["title"];
                $text = $row2["text"];                      
            }
            echo '<img src="data:image/jpeg;base64, '.base64_encode( $row2['picture'] ).'" style= width:100% >' . "<h1>" . $title2 . "</h1>" . "<p>" . $text . "</p>";    
            //incremento views
            
            $query3 = "UPDATE articolo SET views = views + 1 WHERE id=$id";
            $result3 = $conn->query($query3);   
        }
    }   

    function get_all_article() {
        include "connection.php";
        $query2 = "SELECT title, description, picture FROM articolo";
        $result2 = $conn->query($query2);
        $x = 1;
        if ($result2->num_rows > 0) { 
            while($x <= $result2->num_rows) {
            $row2 = $result2->fetch_assoc();
            $title2 = $row2["title"];
            $des = $row2["description"];
            echo '<div class="row">' . '<div class="col-md-6">'; 
            echo '<img src="data:image/jpeg;base64, '.base64_encode( $row2['picture'] ).'" style= width:100% >' . "<h1>" . "<a href='blog2.php' id= $x  onclick='get_id(this.id)'>". $title2 . "</a>" . "</h1>" . "<p>" . $des . "</p>";
            echo '</div>';
            $x++;
            if ($x <= $result2->num_rows) {
                $row2 = $result2->fetch_assoc();
                echo '<div class="col-md-6">'; 
                echo '<img src="data:image/jpeg;base64, '.base64_encode( $row2['picture'] ).'" style= width:100% >' . "<h1>" . "<a href='blog2.php' id= $x  onclick='get_id(this.id)'>". $title2 . "</a>" . "</h1>" . "<p>" . $des . "</p>";
                echo '</div>'. '</div>';
                $x++;
            }
            }
        }
        }
?>