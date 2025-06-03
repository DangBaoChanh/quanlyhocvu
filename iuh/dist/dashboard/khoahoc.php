<?php 
session_start();
error_reporting(0);
//error_reporting(0);
 include('controller.php');
  $p = new controller();
  if(isset($_SESSION['password']) && isset($_SESSION['sinhvien'])){
    $mk=$_SESSION['password'];
  $tk=$_SESSION['sinhvien'];
  $h = $p->laySESSION($tk);
  }else{
        echo '<script>setTimeout(function() { window.location.href = "dangnhap.php"; }, 1);</script>';
        exit;
  }
  if($e= $h ->fetch_array()){
    if($mk != $e['matkhau'] || $e['user_code'] != $_REQUEST['sv']){
      echo '<script>alert("Bạn đang đăng nhập là người khác")</script>';
    echo '<script>setTimeout(function() { window.location.href = "../index.php"; }, 1);</script>'; exit;
  }
  }

  $user=$_REQUEST['sv'];
  $tblSP = $p->danhsachHP($user);

?>
<!DOCTYPE html>
<html lang="en">


<head>
  <title>Khóa học</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="../assets/images/logo.png" type="image/x-icon"> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
<link rel="stylesheet" href="../assets/fonts/tabler-icons.min.css" >
<link rel="stylesheet" href="../assets/css/style.css" id="main-style-link" >

</head>
<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
<div class="loader-bg">
  <div class="loader-track">
    <div class="loader-fill"></div>
  </div>
</div>
<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="index.php?sv=<?php echo $_REQUEST['sv']?>" class="b-brand text-primary">
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
      <a href="khoahoc.php?sv=<?php echo $_REQUEST['sv']?>" class="pc-link">
        <span class="pc-micon"><i class="ti ti-color-swatch"></i></span>
        <span class="pc-mtext">Các khóa học của tôi</span>
      </a>
    </li>
    <li class="pc-item">
    <a href="ketquahoctap.php?sv=<?php echo $_REQUEST['sv']?>" class="pc-link">
        <span class="pc-micon"><i class="ti ti-plant-2"></i></span>
        <span class="pc-mtext">Kết quả học tập</span>
      </a>
    </li>
    <li class="pc-item">
      <a href="dangkihocphan.php?sv=<?php echo $_REQUEST['sv']?>" class="pc-link">
        <span class="pc-micon"><i class="ti ti-plant-2"></i></span>
        <span class="pc-mtext">Đăng kí học phần</span>
      </a>
    </li>
    <li class="pc-item">
    <a href="tracuucongno.php?sv=<?php echo $_REQUEST['sv']?>" class="pc-link">
    <span class="pc-micon"><i class="ti ti-plant-2"></i></span>
        <span class="pc-mtext">Tra cứu công nợ</span>
      </a>
    </li>

    <li class="pc-item pc-caption">
      <label>Pages</label>
      <i class="ti ti-news"></i>
    </li>
    <?php 
      if(isset($_SESSION['sinhvien'])){
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
<div class="me-auto pc-mob-drp">
  <ul class="list-unstyled">
    <li class="pc-h-item pc-sidebar-collapse">
      <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    <li class="pc-h-item pc-sidebar-popup">
      <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
  </ul>
</div>
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
        <span></span>
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
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?sv=<?php echo $_REQUEST['sv']?>">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Thông tin</a></li>
                <li class="breadcrumb-item" aria-current="page">Khóa học</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-xl-8">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="mb-0">Khóa học của tôi</h5>
            
          </div>
          <div class="card">
            <div class="dt-responsive table-responsive">
              <table id="reorder-events" class="table table-striped table-bordered nowrap">
                <thead>
                  <tr>
                    <th>Tên học phần</th>
                    <th>Mã học phần</th>
                    <th>Tùy chọn</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
while ($r = $tblSP->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . $r['tenhocphan'] . '</td>';
    echo '<td>' . $r['mahocphan'] . '</td>';
    echo '<td><a href="chitietkhoahoc.php?hp='.md5($r['mahocphan']).'&sv='.$user.'" class="pc-link">Xem</td>';
    echo '</tr>';
}
?>       
                </tbody>
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