<?php 
    $title = $_POST["title"];
    $post = $_POST["post"];
    $post = str_replace("'","''",$post);
    $date = date('Y-m-d G:i',time());
    $mode = $_POST["mode"];
    if($mode != "1"){
        $complete = "False";
        $error = "";
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
            $sql = "INSERT INTO BlogPosts (title, post, dateOfPost)
            VALUES ('$title', '$post', '$date')";

            if ($conn->query($sql) === TRUE) {
                $complete = "True";
                header("Location: viewBlog.php");
            } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        $conn->close();
    }else{
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
            $sql = "INSERT INTO TempBlogPosts (title, post, dateOfPost)
            VALUES ('$title', '$post', '$date')";

            if ($conn->query($sql) === TRUE) {
                $complete = "True";
                header("Location: viewPost.php");
            } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        $conn->close();
    }
?>
<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="utf-8">
        <title>Add Post</title>
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
            <?php 
                if($complete == "True"){
                    echo '<h2> Success!<h2>';
                }else{
                    echo '<h2> oops<h2>';
                }
            ?>
            </div>
            <div class="Body-Div">
                <?php 
                    if($complete == "True"){
                        echo'<p>Post added, click the button below to go back<p>';
                        echo'<form method="POST" action="http://webprojects.eecs.qmul.ac.uk/as396/cw/viewBlog.php">
                            <button class="btn btn-primary" type="submit" name="username" value="StillLogedIn">Go Back</button>
                            </form>';
                    }
                ?>
            </div>
        </div>
    </body>
</html>