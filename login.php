<?php
    
    include 'connection.php';
    $login_arr=array();

    if(isset($_SESSION["user_name"])){
        echo "Start";
    }
    else{
        if(isset($_POST["user"]) && isset($_POST["pass"])){
            $uname=$_POST["user"];
            $pas=$_POST["pass"];
            $sql="SELECT * FROM login WHERE username='$uname' AND pass='$pas'";
            $run=mysqli_query($con,$sql);
            $rss=mysqli_fetch_assoc($run);
            if($uname===$rss['username'] && $pas===$rss['pass']){
                session_start();
                $_SESSION["user_name"] =$uname;
                echo ($_SESSION["user_name"]);
                $sel="SELECT * FROM login";
                $rs=mysqli_query($con,$sel);
                while($row=mysqli_fetch_assoc($rs))
                {
                $login_arr[]=$row;
                }
            }
            else{
                echo"try";
            }
        }
        else{
            echo"field";
        }
    }

        
        if(isset($_POST["user"]) && isset($_POST["pass"])){
            $uname=$_POST["user"];
            $pas=$_POST["pass"];
            $sql="SELECT * FROM login WHERE username='$uname' AND pass='$pass'";
            $run=mysqli_query($con,$sql);
            $rss=mysqli_fetch_assoc($run);
            if($uname===$rss['username'] && $pas===$rss['pass']){
                    $uname=$_POST["user"];
                    $pass=$_POST["pass"];
                    session_start();
                    $_SESSION["user_name"] =$uname;
                    //$up="UPDATE login SET "
                    $insrt="INSERT INTO login (name,username,pass,theme) values('hawk','paradox','12345','c')";
                    mysqli_query($con,$insrt);
                    $sql="SELECT * FROM login WHERE username='$uname' AND pass='$pass'";
                    $run=mysqli_query($con,$sql);
                    $rss=mysqli_fetch_assoc($run);
                    if($uname===$rss['username'] && $pass===$rss['pass']){
                        $sel="SELECT * FROM login";
                        $rs=mysqli_query($con,$sel);
                        while($row=mysqli_fetch_assoc($rs))
                        {
                        $login_arr[]=$row;
                        }
                        
                        echo json_encode($arr);
                    }
                
?>