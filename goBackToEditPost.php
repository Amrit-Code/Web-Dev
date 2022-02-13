<?php 
    session_start();
    $title = $_SESSION['title'];
    $post = $_SESSION['post'];
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
        $sql = "DELETE FROM TempBlogPosts";

        if ($conn->query($sql) === TRUE) {
            //done
        }else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
?>

<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="utf-8">
        <title>Add Blog</title>
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
                <h2>Add Post</h2>
            </div>
            <div class="Body-Div">
                <form method="POST" action="http://webprojects.eecs.qmul.ac.uk/as396/cw/addPost.php">
                    <div class="form-group mx-sm-3 mb-2">
                        <label >Tilte</label>
                        <div class="input-group">
                            <?php 
                                echo' <input name="title" type="text" class="form-control" value="'.$title.'" id="title" placeholder="Title"  required>';
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Post</label>
                        <?php 
                            echo'<textarea class="form-control" id="entry" placeholder="Post" rows="3" name="post" required>'.$post.'</textarea>';
                        ?>
                    </div>
                    <button class="btn btn-primary" type="submit" id="post">Add Post</button> <button class="btn btn-primary" id="reset">Clear</button>
                    <button class="btn btn-primary" type="submit" name="mode" value="1">Preview</button>
                </form>
                <br>
                <form method="POST" action="http://webprojects.eecs.qmul.ac.uk/as396/cw/viewBlog.php">
                    <button class="btn btn-primary" type="submit" >Go Back</button>
                </form>
            </div>
        </div>
        <script src="addPost.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>