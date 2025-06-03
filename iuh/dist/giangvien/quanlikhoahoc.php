<?php 
session_start();
error_reporting(0);
//error_reporting(0);
 include('controller.php');
  $p = new controller();
  if(isset($_SESSION['password']) && isset($_SESSION['giangvien'])){
    $mk=$_SESSION['password'];
  $tk=$_SESSION['giangvien'];
  $h = $p->laySESSION($tk);
  }else{
        echo '<script>setTimeout(function() { window.location.href = "dangnhap.php"; }, 1);</script>';
        exit;
  }
  if($e= $h ->fetch_array()){
    if($mk != $e['matkhau'] || $e['user_code'] != $_REQUEST['sv']){
      echo '<script>alert("Bạn đang đăng nhập là người khác")</script>';
    echo '<script>setTimeout(function() { window.location.href = "../index.php"; }, 1);</script>';exit; 
 }
  }
    $idsv= $_SESSION['giangvien'];
    $user=$_REQUEST['sv'];
    $tblSP1 = $p->ThongtinGV($user);
  $tblSP = $p->danhsachALLHP_GV($user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quản lí khóa học</title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="../assets/images/logo.png" type="image/x-icon"> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
<link rel="stylesheet" href="../assets/fonts/tabler-icons.min.css" >
<link rel="stylesheet" href="../assets/css/style.css" id="main-style-link" >

</head>
<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="index.php?sv=<?php echo $_REQUEST['sv']?>" class="b-brand text-primary">
        <!-- ========   Change your logo from here   ============ -->
        <img src="../assets/images/logo.png" class="img-fluid logo-lg" alt="logo">
      </a>
    </div>
    <div class="navbar-content">
  <ul class="pc-navbar">
    <li class="pc-item">
      <a href="index.php?sv=<?php echo $_REQUEST['sv']?>" class="pc-link">
        <span class="pc-micon"><i class="ti ti-typography"></i></span>
        <span class="pc-mtext">Thông tin tài khoản</span>
      </a>
    </li>
    <li class="pc-item">
      <a href="quanlikhoahoc.php?sv=<?php echo $_REQUEST['sv']?>" class="pc-link">
        <span class="pc-micon"><i class="ti ti-color-swatch"></i></span>
        <span class="pc-mtext">Quản lí khóa học</span>
      </a>
    </li>

    <li class="pc-item pc-caption">
      <label>Tùy chọn</label>
      <i class="ti ti-news"></i>
    </li>
    <?php 
      if(isset($_SESSION['giangvien'])){
        echo '<li class="pc-item">
      <a href="dangxuat.php" class="pc-link">
        <span class="pc-micon"><i class="ti ti-user-plus"></i></span>
        <span class="pc-mtext">Đăng xuất</span>
      </a>
    </li>';
      }else{
        echo '<li class="pc-item">
      <a href="dangnhap.php" class="pc-link">
        <span class="pc-micon"><i class="ti ti-lock"></i></span>
        <span class="pc-mtext">Đăng nhập</span>
      </a>
    </li>';
      }

?>
  </ul>
</div>
  </div>
</nav>
<header class="pc-header">
  <div class="header-wrapper"> 
<div class="ms-auto">
  <ul class="list-unstyled">
    <li class="dropdown pc-h-item">
      <a class="pc-head-link me-0" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_pc_layout">
        <i class="ti ti-settings"></i>
      </a>
    </li>
    <li class="dropdown pc-h-item header-user-profile">
      <a
        class="pc-head-link dropdown-toggle arrow-none me-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        data-bs-auto-close="outside"
        aria-expanded="false"
      >
        <img src="../assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar">
        <span><?php //echo $r['tensinhvien'] ;?></span>
      </a>
      
    </li>
  </ul>
</div>
 </div>
</header>
  <div class="pc-container">
    <div class="pc-content">
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
                <h5 class="m-b-10">Home</h5>
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard/index.html">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Thông tin</a></li>
                <li class="breadcrumb-item" aria-current="page">Khóa học</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-xl-10">
          <div class="card">
            <div class="dt-responsive table-responsive">
              <table id="reorder-events" class="table table-striped table-bordered nowrap">
                <thead>
                  <tr>
                    <th>Tên học phần</th>
                    <th>Mã học phần</th>
                    <th>Lớp</th>
                    <th>Thời gian</th>
                    <th colspan="2" style="text-align: center;">Tùy chọn</th>
                  </tr>
                </thead>
                <tbody>
                  <form action="" method="post">
                <?php
while ($r = $tblSP->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . $r['tenhocphan'] . '</td>';
    echo '<td>' . $r['mahocphan'] . '</td>';
    echo '<td>' . $r['tenlophocphan'] . '</td>';
    echo '<td>';
    echo "Lý thuyết:<br>
        Thứ " . $r['thuhocLT'] . " - Tiết " . $r['tietbatdauLT'] . "-" . $r['tietketthucLT'] . "<br>Phòng " . $r['phonghocLT'];
    echo "<br>Thực hành:<br>
        Thứ " . $r['thuhocTH'] . " - Tiết " . $r['tietbatdauTH'] . "-" . $r['tietketthucTH'] . "<br>Phòng " . $r['phonghocTH'];
    echo '</td>';
    echo '<td><a href="chitietkhoahoc.php?sv=' . $_REQUEST['sv'] . '&idhp=' . md5($r['id_hocphan']) . '&idlhp=' . md5($r['id_lophocphan']) . '" class="pc-link">Xem</a></td>';
    echo '<td><a href="nhapdiem.php?sv=' . $_REQUEST['sv'] . '&idhp=' . md5($r['id_hocphan']) . '&idlhp=' . md5($r['id_lophocphan']) . '" class="pc-link">Nhập điểm</a></td>';

    echo '</tr>';
}
?> 
                </tbody>
                </form>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <?php 
  include_once("chatbox.php");

?>
</body>
</html>
