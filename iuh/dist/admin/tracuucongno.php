<?php 
session_start();
error_reporting(0);
 include('controller.php');
  $p = new controller();
  if(isset($_SESSION['password']) && isset($_SESSION['admin'])){
    $mk=$_SESSION['password'];
  $tk=$_SESSION['admin'];
  $h = $p->laySESSION($tk);
  }else{
        echo '<script>setTimeout(function() { window.location.href = "dangnhap.php"; }, 1);</script>';
        exit;
  }
  if($e= $h ->fetch_array()){
    if($mk != $e['matkhau'] || $e['user_code'] != $_SESSION['admin']){
    echo '<script>setTimeout(function() { window.location.href = "../index.php"; }, 1);</script>';exit; 
 }
  }
  //$idsv= $_SESSION['user'];
  $user=$_REQUEST['sv'];
  $tblSP = $p->danhsachALLCONGNO($user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Xử lý công nợ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="../assets/images/logo.png" type="image/x-icon"> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
<link rel="stylesheet" href="../assets/fonts/tabler-icons.min.css" >
<link rel="stylesheet" href="../assets/fonts/fontawesome.css" >
<link rel="stylesheet" href="../assets/css/style.css" id="main-style-link" >
</head>
<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="index.php=" class="b-brand text-primary">
        <img src="../assets/images/logo.png" class="img-fluid logo-lg" alt="logo">
      </a>
    </div>
    <div class="navbar-content">
  <ul class="pc-navbar">
    <li class="pc-item">
      <a href="index.php" class="pc-link">
        <span class="pc-micon"><i class="ti ti-typography"></i></span>
        <span class="pc-mtext">Thông tin tài khoản</span>
      </a>
    </li>
    <li class="pc-item">
            <a href="quanligiangvien.php" class="pc-link">
              <span class="pc-micon"><i class="ti ti-color-swatch"></i></span>
              <span class="pc-mtext">Quản lí giảng viên</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="quanlisinhvien.php" class="pc-link">
              <span class="pc-micon"><i class="ti ti-plant-2"></i></span>
              <span class="pc-mtext">Quản lí sinh viên</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="themnguoidung.php" class="pc-link">
              <span class="pc-micon"><i class="ti ti-user"></i></span>
              <span class="pc-mtext">Thêm người dùng</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="quanlihocphan.php" class="pc-link">
              <span class="pc-micon"><i class="ti ti-news"></i></span>
              <span class="pc-mtext">Quản lí học phần</span>
            </a>
          </li>

    <li class="pc-item pc-caption">
      <label>Tùy chọn</label>
      <i class="ti ti-news"></i>
    </li>
    <?php 
      if(isset($_SESSION['admin'])){
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
                <li class="breadcrumb-item" aria-current="page">Tra cứu công nợ</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-xl-8">
          <h5 class="mb-3">Tra cứu công nợ</h5>
          <div class="card tbl-card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-borderless mb-0">
                  <thead>
                    <tr>
                      <th>Mã học phần</th>
                      <th>Tên học phần</th>
                      <th>Số tín chỉ</th>
                      <th>Trạng thái</th>
                      <th class="text-end">Tổng tiền</th>
                      <th>Thay đổi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <form action="" method="post">
                    <?php
                    if($tblSP){
                      while ($r = $tblSP->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . '<a href="#" class="text-muted">'.$r['tenhocphan'].'</a>' . '</td>';
    echo '<td>' . $r['mahocphan'] . '</td>';
    echo '<td>' . $r['sotinchi'] . '</td>';
    if($r['trangthai']==0){
       echo '<td>
        <span class="d-flex align-items-center gap-2">
            <span class="bg-danger rounded-circle" style="width: 10px; height: 10px; display: inline-block;"></span>
            <span>Chưa nộp</span>
        </span>
      </td>';

    }else{
      echo '<td>
        <span class="d-flex align-items-center gap-2">
            <span class="bg-success rounded-circle" style="width: 10px; height: 10px; display: inline-block;"></span>
            <span>Đã nộp</span>
        </span>
      </td>';
    }
   
    echo '<td class="text-end">'.$r['tongtien'].'</td>';
    if($r['trangthai']==0){
      echo '<td><button class="btn btn-light-primary mb-3" data-bs-toggle="modal" data-bs-target="#themGiangVienModal" type="submit" name="doi" value="'.md5($r['id_sinhvien']).'">Duyệt</button></td>';
    }
    echo '</tr>';
}
                    }else{
                      echo '<tr><td colspan="6" style="text-align:center">Chưa có công nợ</td></tr>';
                    }

?>  </form>
                  </tbody>
                </table>
                
              </div>
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
<?php 
  if(isset($_REQUEST['doi'])){
    $id_sinhvien=$_REQUEST['doi'];
    $p->doicongno($id_sinhvien);
    if($p===-1 || $p===0){
      echo '<scipt>alert("Lỗi không đổi được")</script>';
    }
    else{
      echo '<script>
    alert("Cập nhật thành công");
    window.location.href = "tracuucongno.php?sv='.$_REQUEST['sv'].'";
    </script>';
    }
  }
?>