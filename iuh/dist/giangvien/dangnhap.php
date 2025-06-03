<?php 
error_reporting(0);
session_start();
if(isset($_SESSION['admin']) || isset($_SESSION['sinhvien'])){
  echo '<script>alert("Bạn đang đăng nhập vai trò khác")</script>';
  echo '<script>setTimeout(function() { window.location.href = "../index.php"; }, 1);</script>';
  exit;
}elseif(isset($_SESSION['giangvien'])){
  echo '<script>setTimeout(function() { window.location.href = "index.php?sv='.$_SESSION['giangvien'].'"; }, 1);</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>Đăng nhập</title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="../assets/images/logo.png" type="image/x-icon"> 
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="../assets/fonts/tabler-icons.min.css" >
<link rel="stylesheet" href="../assets/css/style.css" id="main-style-link" >

</head>
<body>
<form action="" method="post">
  <div class="auth-main">
    <div class="auth-wrapper v3">
      <div class="auth-form">
        <div class="auth-header">
          <a href="#"><img src="../assets/images/logo.png" alt="img"></a>
        </div>
        <div class="card my-5">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-end mb-4">
              <h3 class="mb-0"><b>Đăng nhập</b></h3>
              <?php 
if ($_SESSION['login_fail_count'] < 10) {
?>
             </div>
            <div class="form-group mb-3">
              <label class="form-label">Mã giảng viên</label>
              <input type="text" class="form-control" placeholder="Nhập mã giảng viên" name="user">
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <div class="d-flex mt-1 justify-content-between">
              <div class="form-check">
                <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="">
                <label class="form-check-label text-muted" for="customCheckc1">Keep me sign in</label>
              </div>
              
            </div>
            <div class="d-grid mt-4">
              <div class="g-recaptcha" data-sitekey="6Lc3oz8rAAAAAE79BNJLMEr9qIQs-GXJ7V9zteUw"></div>
      <br/>
              <button type="submit" class="btn btn-primary" name="btnSubmit" id="dangnhap">Đăng nhập</button>
            </div>
             <?php 
} else { 
  
?>
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Nhập mã OTP</label>
              <input type="text" class="form-control" placeholder="Nhập mã OTP" name="otp1">
            </div>
            <div class="d-grid mt-4">
              <button type="submit" class="btn btn-primary" name="otp" id="dangnhap">Đăng nhập</button>
            </div>
<?php 
}
?>
          </div>
        </div>
      </div>
    </div>
  </div>
  </form>
</body>
</html>
<?php
include_once('controller.php');
    $p = new controller();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/PHPMailer-master/src/SMTP.php';
if (!isset($_SESSION['login_fail_count'])) {
    $_SESSION['login_fail_count'] = 0;
}
if (!isset($_SESSION['otp'])) {
    $_SESSION['otp'] = rand(100000, 999999);
}

  if(isset($_REQUEST['btnSubmit'])){
    
    if(empty($_REQUEST['user']) || empty($_REQUEST['password'])){
        echo "<script>alert('Vui lòng nhập đủ thông tin')</script>";
        exit;
    }
    $user = md5($_REQUEST['user']);
    $user1 = $_REQUEST['user'];
    $password = md5($_REQUEST['password']);
    
    $tblSP = $p->kiemtradangnhap($user,$password);
    if($tblSP===0) {
      $_SESSION['login_fail_count']++;
      echo "<script>alert('Sai thông tin đăng nhập');</script>";
        if ($_SESSION['login_fail_count'] >= 10 && !isset($_SESSION['email_sent'])) {
              $_SESSION['temp_user'] = $user; 
              $_SESSION['masogvtam'] = $user1;
            $e = 'baochanh1206@gmail.com';
            $n = 'Bảo Chánh';
           $otp = $_SESSION['otp'];

            $mail = new PHPMailer(true);
          
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'chanhbao07@gmail.com';
                $mail->Password = 'oybl baxm iadl yjsz';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->CharSet = 'UTF-8';
                $mail->Encoding = 'base64';

                $mail->setFrom('chanhbao07@gmail.com', $n);
                $mail->addAddress('baochanh120603@gmail.com', 'Bảo chánh');

                $mail->isHTML(true);
                $mail->Subject = 'Cảnh báo⚠️';
                $mail->Body = "Đây là mã OTP của bạn, vui lòng không cung cấp cho bất kỳ ai.Nếu không phải bạn, vui lòng kiểm tra lại tài khoản của mình<br><b>Mã OTP:</b> $otp";

                $mail->send();
                $_SESSION['email_sent'] = true;
               echo "<script>alert('Bạn đã đăng nhâp sai quá 10 lần! Vui lòng kiểm tra lại email để lấy mã OTP!');</script>";
               echo '<script>setTimeout(function() { window.location.href = "dangnhap.php"; }, 1);</script>';
        }
    }else{
      $_SESSION['masogv']=$user1;
      $_SESSION['giangvien']=$user;
      $_SESSION['password']=$password;
       $_SESSION['login_fail_count'] = 0;
        unset($_SESSION['otp']);
        unset($_SESSION['email_sent']);
      echo '<script>setTimeout(function() { window.location.href = "index.php?sv='.$user.'"; }, 1);</script>';
    }

  }
if (isset($_POST['otp'])) {
    $ma = $_POST['otp1'];
    if ($ma == $_SESSION['otp']) {
         $user = $_SESSION['temp_user'];
         $_SESSION['giangvien']=$user;
          $t1=$p->laypass($user);
      $w=$t1->fetch_array();
        
         $password = $w['matkhau'];
        $_SESSION['password']=$password;
        $_SESSION['login_fail_count'] = 0;
        unset($_SESSION['otp']);
        unset($_SESSION['email_sent']);
        echo '<script>setTimeout(function() { window.location.href = "index.php?sv='.$user.'"; }, 1);</script>';
    } else {
        echo "<script>alert('❌ Mã sai');</script>";
    }
}
?>
<script>
  $(document).on('click','#dangnhap',function(){
    var response = grecaptcha.getResponse();
    if(response.length==0){
      alert("Vui lòng xác thực bạn không phải là người máy");
      return false;
    }
  })
</script>