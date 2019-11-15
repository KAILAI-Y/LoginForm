<?php
 $query="SELECT * FROM user WHERE email='$email'";
        $result=mysqli_query($db, $query) or die(mysqli_error($db));

        if(mysqli_num_rows($result)!=0){
            while ($row = mysqli_fetch_assoc($result)){
                $dbpassword = $row['password'];
            }
            if(password_verify($password, $dbpassword)){
                header("location: notes.php");
            }else{
                echo "Login error. ";
            }
        }else{
            echo "Login error. ";
        }

?>