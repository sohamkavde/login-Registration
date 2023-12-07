<?php
include('init/db.php');
if(isset($_POST['submit'])){
    // Fetch values
    // DB Fields: id,UserName,Email id, Password,Status(Active/Deactive),date and time (Asia/Kolkata time zone)
    $userName = mysqli_real_escape_string($con,$_POST['uname']);
    $email = mysqli_real_escape_string($con,$_POST['uemail']);
    $psw = mysqli_real_escape_string($con,$_POST['psw']);
    if(isset($_POST['type'])){
    $type = mysqli_real_escape_string($con,$_POST['type']);        
     
    $status = 1;
    $date = date("d:m:Y");
    $time = date("h:i:s A");

    // check email is already in db or not
    $checkEmailSelect = "select email from logindb where email = '$email' and type = '$type'";
    $CheckEmailQuery = mysqli_query($con,$checkEmailSelect);
    $row = mysqli_num_rows($CheckEmailQuery);
    if($row == 0){ // current email is not exist in db
        // password hashing
        $pass_hashing = password_hash($psw,PASSWORD_BCRYPT);
        $datInsert = "insert into logindb(`userName`, `email`, `password`,`type`, `status`, `date`, `time`) VALUES ('$userName','$email','$pass_hashing','$type','$status','$date','$time')";
        $dataInserQuery = mysqli_query($con,$datInsert);
        if($dataInserQuery){
            ?> <script>alert('Inserted Successfully !!');
            window.location.href = 'login.php';
            </script>           
            <?php
        }else{
            ?> <script>alert('Something goes wrong')</script>           
            <?php
        }

    }else{
        ?> <script>alert('Email Already Exist')</script>           
        <?php
        
    }
       
}else{
    ?> <script>alert('Please Select Type !!')</script>           
    <?php
}
    
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration </title>
    <link rel="stylesheet" href="./style.css"> 
</head>

<body>
    <div class="container">
        <div class="firstHalf"></div>
        <div class="secondHalf">
            <form action="#" method="post">           

                <div class="container1">
                    <h1>Registration</h1><br>
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required >
                    <label for="uemail"><b>Email</b></label>
                    <input type="email" placeholder="Enter Email" name="uemail" required >
                    <label for="psw"><b>Password</b></label>
                    <small><br>6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter</small>
                    <input type="password" placeholder="Enter Password" name="psw" id="psw" onchange="check()" autocomplete="off" required> 

                    <label for="type"><b>Client</b> <input type="radio" name="type" value="client"></label>
                    <label for="type"><b>User</b> <input type="radio" name="type" value="user"></label>
                    <label for="type"><b>Admin</b> <input type="radio" name="type" value="admin"></label>
                    
                    <button type="button" name="submit" id="submit"  onclick="info()">Registration</button>                    
                </div>                
            </form>

        </div>
    </div>
</body>

</html>

<script>
    function check(){
        let ele = document.getElementById('submit');
        var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
        if(document.getElementById('psw').value.match(passw)) 
        { 
            ele.style.backgroundColor = "blue";
            document.getElementById('submit').setAttribute("type","submit");
        }else{
            document.getElementById('submit').setAttribute("type","button");
            ele.style.backgroundColor = "gray";
        }
    }
    function info(){
        let ele = document.getElementById('submit');
        if(ele.getAttribute("type") == "button")
        {
            alert("6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter");
        }
    }
</script>