<?php session_start(); ?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>The Grant Restaurant</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="The Grant Restaurant Admin Panel used for add food category ,update ,delete and add offers ,add menu setting up all restaurant mobile app">
    <meta name="author" content="">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="icon" href="Icon - Restaurant.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="form-box">
    <div class="head">The Grant Restaurant</div>
    <form  action="index.php" id="login-form" method="post">
        <div id="error" style="color: red;"></div>
        <div class="form-group">
            <label class="label-control">
                <span class="label-text">Email</span>
            </label>
            <input type="email" name="uname" class="form-control" />
        </div>
        <div class="form-group">
            <label class="label-control">
                <span class="label-text">Password</span>
            </label>
            <input type="password" name="pass" class="form-control" />
        </div>
        <input type="submit" value="Login" name="Login" class="btn" />
    </form>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
    $(window).load(function(){
        $('.form-group input').on('focus blur', function (e) {
            $(this).parents('.form-group').toggleClass('active', (e.type === 'focus' || this.value.length > 0));
        }).trigger('blur');
    });
</script>
</body>
</html>
<?php
  echo '<script>console.log("OK1")</script>';
include("application/config.php");
  echo '<script>console.log("OK")</script>';
if(isset($_POST['Login'])){
    $uname=$_POST['uname'];
    $pass=$_POST['pass'];
	 echo '<script>console.log("fuuuk")</script>';
    if(isset($uname) && isset($pass)){
		 echo '<script>console.log("if 2")</script>';
        $query=mysqli_query($con,"select * from tbl_adminlogin WHERE username='$uname' && password='$pass' ");
        $res=mysqli_fetch_array($query);
		 echo '<script>console.log("after querty")</script>';
        if($res)
        {
            $_SESSION['uname']=$res['username'];
            $_SESSION['admin_id']=$res['id'];
            $_SESSION['demo'] = $res['admin_right'];
            ?>
            <script> window.location='dashboard.php'; </script>
            <?php
        }
        else
        {
            ?>
            <script>document.getElementById("error").innerHTML = "! Invalid Username and Password !!! ";</script>
            <?php
        }
    }
}
?>

