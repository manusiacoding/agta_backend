<?php
    session_start();
    include 'connection.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    // $username = mysqli_real_escape_string($koneksi, $_POST["email"]);  
    // $password = mysqli_real_escape_string($koneksi, $_POST["password"]);

    $sql = "SELECT * FROM users WHERE email='$email' AND id_role='1'";
    $result = $koneksi->query($sql);

    if($result->num_rows > 0){
        $data = $result->fetch_assoc();
        // if(password_verify($password, $data['password'])){
            $_SESSION['iduser'] = $data['id_user'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['status'] = "login";
            header("location:../dashboard.php");
        // }else{
            // header("location:../index.php?pesan=gagal");
        // }
    }
    else{
        header("location:../index.php?pesan=gagal");
    }
    // if(mysqli_num_rows($result) > 0){  
    // while($row = mysqli_fetch_array($result)){  
    //     if(password_verify($password, $row["password"])){ 
    //             $_SESSION['name'] = $data['name'];
    //             $_SESSION['status'] = "login";
    //             header("location:../dashboard.php");
    //     }  
    //     else{
    //             header("location:../index.php?pesan=gagal");
    //         }  
    //     }  
    // }  
    // else{
    //     header("location:../index.php?pesan=gagal");
    // }
?>