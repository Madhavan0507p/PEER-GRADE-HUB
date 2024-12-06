<?php
session_start();
    if(isset($_SESSION['id']) && isset($_POST['upload']))
    {
        $comm=$_POST['comm'];
        $aid=$_POST['aid'];
        $rec=$_POST['rec'];
        $uid=$_SESSION['id'];
        $uname=$_SESSION['name'];
        $file = $_FILES["assigf"]["name"];
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $newFileName="$uid"."_"."$aid";
        $fileDest = 'drive/'.$newFileName.'.'.$ext;
        if($ext === 'pdf' || $ext ==='jpeg' || $ext ==='JPG')
        {
            move_uploaded_file($_FILES['assigf']['tmp_name'], $fileDest);
            $fileUpload = $newFileName.'.'.$ext.',<br>';
        }
        else
        {
          echo 'Pdfs and jpegs only please';
        }
        require_once 'conn.php';
        $conn=new mysqli($hm,$un,$pw,$db);
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO subdetail (aid,u_id,u_name,comm,ext) VALUES ('$aid', '$uid','$uname', '$comm','$ext')";
        if ($conn->query($sql) === TRUE) 
        {
            try
            {
                $frec="$rec,$uid";
                $sql1 = "UPDATE assi SET record='$frec' WHERE aid=$aid";
                if ($conn->query($sql1) === TRUE) 
                {
                    echo  "<script>alert('New record created successfully')</script>";
                    header('location:s_dashboard.php');
                }  
                else 
                {
                    echo "<script>alert('Error: $sql1 <br> $conn->error')</script>"; 
                }
            }
            catch(Exception $e)
            {
                echo $e;
            }
        }   
        else 
        {
            echo "<script>alert('Error: $sql <br> $conn->error')</script>";
        }
    }
    else
    {
        header('location:s_dashboard.php');
    }
?>