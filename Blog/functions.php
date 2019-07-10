<?php

    function add_comment() {
        include "./../connect.php";
        if (isset($_POST['addComment']) and ($_POST['comment'])) {
            $uid = $_POST['idUser'];
            $date = $_POST['date'];
            $comment = $_POST['comment'];
            if (!empty( $_COOKIE['id'] ) ) {
                $id = $_COOKIE['id'];
            }
            
            $uid = trim($_POST['idUser']);
            $uid = strip_tags($uid);
            $uid = htmlspecialchars($uid);

            $comment = trim($_POST['comment']);
            $comment = strip_tags($comment);
            $comment = htmlspecialchars($comment);

            //$query = "INSERT INTO commenti (idUser, idArticle, text, date) VALUES ('$uid', '$id', '$comment', '$date')";
            $query = $conn->prepare("INSERT INTO commenti (userEmail, idArticle, text, date) VALUES(?, ?, ?, ?)");
            if (!$query){
                echo "Prepared failed";
            }
            $query->bind_param('siss',$uid, $id, $comment, $date) or die("Binding failed");
            $query->execute();
            echo "Il tuo commento &egrave; stato aggiunto";

            echo '<button name="addComment" class="btn btn-secondary" onclick="reload()" style="margin-block-end: 5px; margin-left: 10px; margin-top: 5px;">Mostra il nuovo commento</button>';    
        }        
    }

    function show_comments() {
        include "./../connect.php";
        if (!empty( $_COOKIE['id'] ) ) {
            $id = $_COOKIE['id'];
            $query2 = "SELECT userEmail, text, date, idComment FROM commenti WHERE idArticle=$id";
            $result2 = $conn->query($query2);
            $x = 1;
            if ($result2->num_rows > 0) { 
                while($x <= $result2->num_rows) {
                    $row2 = $result2->fetch_assoc();
                    $idUser = $row2["userEmail"];
                    $text = $row2["text"];  
                    $date = $row2["date"];  
                    $idComm = $row2["idComment"];
                    echo '<div style="border-left-style: solid; padding: 7px; margin-block-end:5px; border-left-color: #0062e6;">' . '<h3 style="font-size: 16px;">' . $idUser . '</h3>' . '<p style="float: left;">' . $text . '</p>' . '<p style="text-align: right;">' . $date . '</p>' . '</div>';
                    $x++;
                }                  
            }
        }
    }
    
    function get_recent() {
        include "./../connect.php";
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
        include "./../connect.php";
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
        include "./../connect.php";
        if (!empty( $_COOKIE['id'] ) ) {
            $id = $_COOKIE['id'];
            $query2 = "SELECT title, text, picture FROM articolo WHERE id=$id";
            $result2 = $conn->query($query2);
            if ($result2->num_rows > 0) { 
                $row2 = $result2->fetch_assoc();
                $title2 = $row2["title"];
                $text = $row2["text"];      
                echo "<img src='data:image/jpeg;base64, ".base64_encode( $row2['picture'] )."' style= width:100% >" . "<h1>" . $title2 . "</h1>" . "<p>" . $text . "</p>";                    
            }
            //incremento views
            
            $query3 = "UPDATE articolo SET views = views + 1 WHERE id=$id";
            $result3 = $conn->query($query3);   
        }
    }   

    function get_all_article() {
        include "./../connect.php";
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
                $title2New = $row2["title"];
                $desNew = $row2["description"];
                echo '<div class="col-md-6">'; 
                echo '<img src="data:image/jpeg;base64, '.base64_encode( $row2['picture'] ).'" style= width:100% >' . "<h1>" . "<a href='blog2.php' id= $x  onclick='get_id(this.id)'>". $title2New . "</a>" . "</h1>" . "<p>" . $desNew . "</p>";
                echo '</div>'. '</div>';
                $x++;
            }
            }
        }
    }
?>