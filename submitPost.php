<?php 
    session_start();
    $title = $_SESSION['title'];
    $post = $_SESSION['post'];
    $post = str_replace("'","''",$post);
    $date = date('Y-m-d G:i',time());
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
            echo'done';
        } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
        }
        $sql = "DELETE FROM TempBlogPosts";

        if ($conn->query($sql) === TRUE) {
            echo'<br>doneasdf';
        }else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
        }
        header("Location: viewBlog.php");
    }
    $conn->close();
?>