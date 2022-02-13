<?php 
    session_start();
    $navDates = [];
    $month = $_POST["month"];
    $user = $_SESSION['admin'];
    $commenter = $_SESSION['commenter'];
    if($user != ""){
        $commenter = $user;
    }

    
?>

<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="utf-8">
        <title>My Blog</title>
        <link rel="styleSheet" href="reset.css" type = "text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="styleSheet" href="style.css" type = "text/css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light Stick-Bar" id="Top-Nav">
            <a class="navbar-brand" href="#">My Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="http://webprojects.eecs.qmul.ac.uk/as396/cw/portfolio.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Month
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <form method="POST" action="http://webprojects.eecs.qmul.ac.uk/as396/cw/viewPost.php" >
                                <?php 
                                    $servername = "dbprojects.eecs.qmul.ac.uk";
                                    $username = "as396";
                                    $password = "nPLVi52BQXSMS";
                                    $dbname = "as396";
                                    $storedDates = [];
                                    // Creates connection
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    // Checks connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }else {
                                        $sql = "SELECT dateOfPost FROM BlogPosts";
                                        $result = $conn->query($sql);
                
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                $tempArray = explode("-", $row["dateOfPost"]);
                                                $tempString = $tempArray[0]."-".$tempArray[1];
                                                if( !(in_array($tempString, $storedDates)) ){
                                                    $storedDates[] = ($tempString);
                                                }
                                            }
                                        } else {
                                            echo "0 results";
                                        }

                                        $sql = "SELECT dateOfPost FROM TempBlogPosts";
                                        $result = $conn->query($sql);
                
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                $tempArray = explode("-", $row["dateOfPost"]);
                                                $tempString = $tempArray[0]."-".$tempArray[1];
                                                if( !(in_array($tempString, $storedDates)) ){
                                                    $storedDates[] = ($tempString);
                                                }
                                            }
                                        }
                                        $conn->close();
                                    }
                                    rsort($storedDates);
                                    echo '<select name="month" class="custom-select" required>';
                                    foreach($storedDates as $i){
                                        echo '<option value="'.$i.'" ">'.date('F-Y',(int)(strtotime($i))).'</option>';
                                    } 
                                    echo'<option value="">View All</option>';
                                    echo'</select><br>';
                                    echo'<button class="btn btn-primary" type="submit" id="Submit-Blog">View</button>';
                                    $navDates = $storedDates;
                                ?>
                            </form>
                        </div>
                    </li>
                </ul>
                <?php 
                        echo'<form class="form-inline my-2 my-lg-0" method="POST" action="http://webprojects.eecs.qmul.ac.uk/as396/cw/goBackToEditPost.php">
                            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Edit Post</button>
                            </form> 
                        <form class="form-inline my-2 my-lg-0" method="POST" action="http://webprojects.eecs.qmul.ac.uk/as396/cw/submitPost.php">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Submit Post</button>
                        </form>';
                    
                ?>
            </div>
        </nav>
        <div class="Blog-Body">
            <?php 
                $servername = "dbprojects.eecs.qmul.ac.uk";
                $username = "as396";
                $password = "nPLVi52BQXSMS";
                $dbname = "as396";
                // Creates connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Checks connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }else {
                    if($month == ""){
                        $sql ="SELECT * FROM TempBlogPosts";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()) {
                                $_SESSION['title'] = $row['title'];
                                $_SESSION['post'] = $row['post'];
                                echo '<div class="Special-Block-Header">
                                    <h2>'.$row['title'].'</h2>
                                    <p class="Time-Stamp">'.date('d-F-Y G:i',(int)(strtotime($row["dateOfPost"]))).'</p>
                                </div>';
                                echo '<article class="Body-Div">
                                <p>'.$row["post"].'</p>';
                                echo'<div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="heading'.$row["ID"].'">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link Text-Centre" type="button" data-toggle="collapse" data-target="#collapse'.$row["ID"].'" aria-expanded="true" aria-controls="collapse'.$row["ID"].'">
                                                Coments
                                            </button>
                                        </h2>
                                        </div>
                                    
                                        <div id="collapse'.$row["ID"].'" class="collapse" aria-labelledby="heading'.$row["ID"].'" data-parent="#accordionExample">
                                            <div class="card-body" class="Text-Centre">';
                                            echo'</div>
                                            </div>
                                    </div>
                                    </div>';
                                    echo'</article>';
                            }
                        }
                        foreach($navDates as $d){
                            $sql = "SELECT * FROM BlogPosts 
                            ORDER BY dateOfPost DESC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo '<section id = "'.$d.'">';
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $tempArray = explode("-", $row["dateOfPost"]);
                                    $tempString = $tempArray[0]."-".$tempArray[1];
                                    if($d == $tempString){
                                        echo '<div class="Block-Header">
                                                <h2>'.$row["title"].'</h2>
                                                <p class="Time-Stamp">'.date('d-F-Y G:i',(int)(strtotime($row["dateOfPost"]))).'</p>
                                            </div>
                                            <article class="Body-Div">
                                                <p>'.$row["post"].'</p>';
                                                echo'<div class="accordion" id="accordionExample">
                                                <div class="card">
                                                    <div class="card-header" id="heading'.$row["ID"].'">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link Text-Centre" type="button" data-toggle="collapse" data-target="#collapse'.$row["ID"].'" aria-expanded="true" aria-controls="collapse'.$row["ID"].'">
                                                                Coments
                                                            </button>
                                                        </h2>
                                                        </div>
                                                    
                                                        <div id="collapse'.$row["ID"].'" class="collapse" aria-labelledby="heading'.$row["ID"].'" data-parent="#accordionExample">
                                                            <div class="card-body" class="Text-Centre">';
                                                            $ID = $row["ID"];
                                                            $sql = "SELECT * FROM Coments 
                                                            ORDER BY ID ";
                                                            $result = $conn->query($sql);
                                                            if ($result->num_rows > 0) {
                                                                while($Crow = $result->fetch_assoc()) {
                                                                    if($Crow["postId"] == $ID){
                                                                        echo '<div class="comments">
                                                                            <p>
                                                                                <u><b>'.$Crow["fname"].' says:</b></u><br>
                                                                                '.$Crow["comment"].'
                                                                            </p>
                                                                            ';
                                                                        echo'</div>';
                                                                    }
                                                                }
                                                            }
                                                        echo'</div>
                                                    </div>
                                            </div>
                                            </div>';
                                            echo'</article>';
                                    }
                                }
                                echo '</section>';
                            
                            } else {
                                echo "0 results";
                            }
                        }
                    }else{
                        $sql ="SELECT * FROM TempBlogPosts";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                            $tempArray = explode("-", $row["dateOfPost"]);
                            $tempString = $tempArray[0]."-".$tempArray[1];
                            if($month === $tempString){
                            while($row = $result->fetch_assoc()) {
                                $_SESSION['title'] = $row['title'];
                                $_SESSION['post'] = $row['post'];
                                echo '<div class="Special-Block-Header">
                                    <h2>'.$row['title'].'</h2>
                                    <p class="Time-Stamp">'.date('d-F-Y G:i',(int)(strtotime($row["dateOfPost"]))).'</p>
                                </div>';
                                echo '<article class="Body-Div">
                                <p>'.$row["post"].'</p>';
                                echo'<div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="heading'.$row["ID"].'">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link Text-Centre" type="button" data-toggle="collapse" data-target="#collapse'.$row["ID"].'" aria-expanded="true" aria-controls="collapse'.$row["ID"].'">
                                                Coments
                                            </button>
                                        </h2>
                                        </div>
                                    
                                        <div id="collapse'.$row["ID"].'" class="collapse" aria-labelledby="heading'.$row["ID"].'" data-parent="#accordionExample">
                                            <div class="card-body" class="Text-Centre">';
                                            echo'</div>
                                            </div>
                                    </div>
                                    </div>';
                                    echo'</article>';
                            }}
                        }
                        $sql = "SELECT * FROM BlogPosts 
                        ORDER BY dateOfPost DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            echo '<section id = "'.$month.'">';
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $tempArray = explode("-", $row["dateOfPost"]);
                                $tempString = $tempArray[0]."-".$tempArray[1];
                                if($month === $tempString){
                                    echo '<div class="Block-Header">
                                            <h2>'.$row["title"].'</h2>
                                            <p class="Time-Stamp">'.date('d-F-Y G:i',(int)(strtotime($row["dateOfPost"]))).'</p>
                                        </div>
                                        <article class="Body-Div">
                                            <p>'.$row["post"].'</p>';
                                            echo'<div class="accordion" id="accordionExample">
                                                <div class="card">
                                                    <div class="card-header" id="heading'.$row["ID"].'">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link Text-Centre" type="button" data-toggle="collapse" data-target="#collapse'.$row["ID"].'" aria-expanded="true" aria-controls="collapse'.$row["ID"].'">
                                                                Coments
                                                            </button>
                                                        </h2>
                                                        </div>
                                                    
                                                        <div id="collapse'.$row["ID"].'" class="collapse" aria-labelledby="heading'.$row["ID"].'" data-parent="#accordionExample">
                                                            <div class="card-body" class="Text-Centre">';
                                                            $ID = $row["ID"];
                                                            $sql = "SELECT * FROM Coments 
                                                            ORDER BY ID ";
                                                            $result = $conn->query($sql);
                                                            if ($result->num_rows > 0) {
                                                                while($Crow = $result->fetch_assoc()) {
                                                                    if($Crow["postId"] == $ID){
                                                                        echo '<div class="comments">
                                                                            <p>
                                                                                <u><b>'.$Crow["fname"].' says:</b></u><br>
                                                                                '.$Crow["comment"].'
                                                                            </p>
                                                                            ';
                                                                            if($user != ""){
                                                                                echo '<form class="form-inline my-2 my-lg-0" method="POST" action="http://webprojects.eecs.qmul.ac.uk/as396/cw/viewBlog.php">
                                                                                    <button class="btn btn-outline-danger my-2 my-sm-0 Centre-Self" type="submit" name="Cdelete" value="'.$Crow["ID"].'">X</button>
                                                                                    </form>';}
                                                                        echo'</div>';
                                                                    }
                                                                }
                                                            }
                                                        echo'</div>
                                                    </div>
                                            </div>
                                            </div>';
                                        echo'</article>';
                                }
                            }
                            echo '</section>';
                            
                        } else {
                            echo "0 results";
                        }
                    }
                    $conn->close();
                } 
            ?>
        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>