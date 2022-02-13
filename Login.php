<?php
    $uusername = $_POST["username"];
    $ppassword = $_POST["password"];
    $found = "False";
    $foundAdmin = "False";
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
    $sql = "SELECT * FROM BlogUsers";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($row["username"] == $uusername){
                if($row["password"] == $ppassword){
                    $foundAdmin = "True";
                    $found = "True";
                    session_start();
                    $_SESSION['admin'] = $uusername;
                    $_SESSION['commenter'] = $uusername;
                    header("Location: addBlog.html");
                }
            }
        }
    } 
    $sql = "SELECT * FROM ComentsUsers";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($row["fname"] == $uusername){
                if($row["password"] == $ppassword){
                    $found = "True";
                    session_start();
                    $_SESSION['commenter'] = $uusername;
                }
            }
        }
    } 
    $conn->close();
    } 
?>
<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="styleSheet" href="reset.css" type = "text/css">
        <!-- Bootstrap CSS -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- My Style Sheet -->
        <link rel="styleSheet" href="style.css" type = "text/css">
    </head>
    <body>
        <div class="Blog-Body">
            <div class="Block-Header">
                <h2><?php 
                    if($found == "True"){
                        echo "Success!";
                    }else{
                        echo "Access Denied";
                    }
                ?></h2>
            </div>
            <div class="Body-Div">
                <?php 
                    if($foundAdmin == "True"){
                        echo '<p> Wellcome '.$uusername.' Click the button below to continue </p><br>';
                        echo '<form method="POST" action="http://webprojects.eecs.qmul.ac.uk/as396/cw/viewBlog.php">
                        <button class="btn btn-primary" type="submit" name="username" value="'.$uusername.'">Go Back</button>
                        </form>';
                    }else if($found == "True"){
                        echo '<p> Wellcome '.$uusername.' Click the button below to continue </p><br>';
                        echo '<form method="POST" action="http://webprojects.eecs.qmul.ac.uk/as396/cw/viewBlog.php">
                        <button class="btn btn-primary" type="submit" name="commenter" value="'.$uusername.'">Go Back</button>
                        </form>';
                    }else{
                        echo '<p> Sorry '.$uusername.', You are not a registerd user. Click the button below to return to the blog. </p><br>';
                        echo '<form method="POST" action="http://webprojects.eecs.qmul.ac.uk/as396/cw/viewBlog.php">
                        <button class="btn btn-primary" type="submit" ">Go Back</button>
                        </form>';
                    }
                ?>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>