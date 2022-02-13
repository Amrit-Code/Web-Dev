
<?php /*
                    $fname = 'Test';
                    $sname = 'This is a test post. Lets see if this works.';
                    $email = date('Y-m-d',time());
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
                        VALUES ('$fname', '$sname', '$email')"; 

                        if ($conn->query($sql) === TRUE) {
                            echo "Registration Sucsessfull";
                        //Your code
                        } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                        $conn->close();
                    } 
                    */
?>
<?php /*
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
        $sql = "DELETE FROM BlogPosts
        WHERE title = 'Test'"; 

        if ($conn->query($sql) === TRUE) {
            echo "Registration Sucsessfull";
        //Your code
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    } */
?>


<div class="card">
            <div class="card-body">
            <?php /*
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
                        $sql = "SELECT * FROM BlogPosts";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "id: " . $row["ID"]. " - Title: " . $row["title"]. "Time: " . $row["dateOfPost"] ."<br>" . $row["post"]. "<br>";
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                    } */
                 ?>
            </div>
        </div> 


<?php /*
    $title = "Sprite Sheets";
    $post = "I had to use sprite sheets for Object Orientated Programming module. It would have been easier to use separate images but doing more research into it, turns out, they are more useful for websites so that they only have to send one image. Makes sense.";
    $dateOfPost = date('Y-m-d G:i', strtotime("2019-01-06 18:33"));
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
        VALUES ('$title', '$post', '$dateOfPost')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration Sucsessfull";
        //Your code
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }*/
?>
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
        $sql = "CREATE TABLE TempBlogPosts (
            ID int NOT NULL AUTO_INCREMENT,
            title varchar(255),
            post varchar(255),
            dateOfPost datetime,
            PRIMARY KEY (ID)
           );";

        if ($conn->query($sql) === TRUE) {
            echo "Registration Sucsessfull";
        //Your code
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
?>

<?php /*
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
        $sql = "SELECT * FROM ComentsUsers";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["ID"]. " - Title: " . $row["fname"]. "Time: " . $row["password"] . "<br>";
            }
        //Your code
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }*/
?>
<?php /*
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
        $sql = "DELETE FROM ComentsUsers"; 

        if ($conn->query($sql) === TRUE) {
            echo "Registration Sucsessfull";
        //Your code
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    } */
?>