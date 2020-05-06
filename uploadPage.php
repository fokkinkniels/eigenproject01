<?php
    session_start();
    include './classes/autoLoader.class.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>




    <?php
        include './includes/header.php';

        if(isset($_SESSION['userId'])){
            echo('<form action="./upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file">
            <button type="submit" name="submitUpload">UPLOAD</button>
        </form>');
        }


        $servername = "studmysql01.fhict.local";
        $username = "dbi410222";
        $password = "Sannefokkink1";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $username);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully";

        $sql = "SELECT * FROM user";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['ID'];
                $sqlImg = "SELECT * FROM profileimg WHERE userid='$id'";
                $resultImg = mysqli_query($conn, $sqlImg);
                while ($rowImg = mysqli_fetch_assoc($resultImg)){

                    echo'<div>';    
                        if($rowImg['status'] == 0){
                            echo"<img src='./uploads/profile".$id.".jpg' alt='profile picture'>";
                        }
                        else{
                            echo"<img src='./img/default.jpg' alt='profile picture'>";
                        }
                        echo $row['name'];
                        echo $row['email'];
                    echo'</div>';  
                }
            }
        }
        else{
            echo "there are no users yet!";
        }
    ?>




</body>
</html>