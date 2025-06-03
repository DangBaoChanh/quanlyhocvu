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
  //$user=$_REQUEST['sv'];
  $tblSP = $p->danhsachALLHP();
 
?>
<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>Quản lí học phần</title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="../assets/images/logo.png" type="image/x-icon"> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
<link rel="stylesheet" href="../assets/fonts/tabler-icons.min.css" >
<link rel="stylesheet" href="../assets/css/style.css" id="main-style-link" >
<link rel="stylesheet" href="../assets/css/style-preset.css" >
</head>
<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="index.php" class="b-brand text-primary">
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
              <div class="page-header-title">
                <h5 class="m-b-10">Home</h5>
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard/index.html">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Thông tin</a></li>
                <li class="breadcrumb-item" aria-current="page">Quản lý học phần</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-xl-8">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="mb-0">Các học phần</h5>
          </div>
          <div class="card">
            <div class="dt-responsive table-responsive">
             <!-- BƯỚC 1: Tạo tài khoản -->
              <?php if (!isset($_SESSION['taikhoan_vua_tao'])): ?>
<form method="post" class="border p-3 mb-3">
  <h5 class="mb-3">Bước 1: Thêm tài khoản</h5>
  <div class="mb-2">
    <label>Tài khoản</label>
    <input type="text" class="form-control" name="user_code" required>
  </div>
  <div class="mb-2">
    <label>Mật khẩu</label>
    <input type="password" class="form-control" name="matkhau" required>
  </div>
  <div class="mb-2">
    <label>Xác nhận mật khẩu</label>
    <input type="password" class="form-control" name="xacnhan" required>
  </div>
  <div class="mb-3">
    <label>Loại tài khoản</label>
    <select name="role" class="form-control" required>
      <option value="1">Giảng viên</option>
      <option value="0">Sinh viên</option>
    </select>
  </div>
  <button type="submit" name="btnStep1" class="btn btn-primary">Lưu và tiếp tục</button>
</form>
<?php endif; ?>
<!-- BƯỚC 2: Thông tin chi tiết -->
<?php if (isset($_SESSION['taikhoan_vua_tao'])): ?>
<form method="post" class="border p-3">
  <h5 class="mb-3">Bước 2: Thông tin chi tiết <?= ($_SESSION['role_vua_tao'] == 1) ? "Giảng viên" : "Sinh viên" ?></h5>
  <div class="mb-2">
    <label>Họ tên</label>
    <input type="text" class="form-control" name="hoten" required>
  </div>
  <div class="mb-2">
    <label>Giới tính</label>
    <select name="gioitinh" class="form-control" required>
      <option value="Nam">Nam</option>
      <option value="Nữ">Nữ</option>
    </select>
  </div>
  <div class="mb-2">
    <label>Chuyên ngành</label>
    <select name="chuyennganh" class="form-control" required>
        <?php 
            $tP = $p->layCN();
            while($q = $tP ->fetch_array()){
                echo '<option value="'.$q['id_chuyennganh'].'">'.$q['tenchuyennganh'].'</option>';
            }

?>
      
    </select>
  </div>
  <div class="mb-2">
    <label>Số điện thoại</label>
    <input type="text" class="form-control" name="sdt" required>
  </div>
  <div class="mb-2">
    <label>Địa chỉ</label>
    <input type="text" class="form-control" name="diachi" required>
  </div>
  <button type="submit" name="btnStep2" class="btn btn-success">Lưu thông tin</button>
</form>
<?php endif; ?>

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
include_once("ketnoi.php");
$k = new Ketnoi();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Bước 1: Lưu user
    if (isset($_POST['btnStep1'])) {
        $user_code = md5($_POST['user_code']);
        $machua_md5 = $_POST['user_code'];
        $matkhau = md5($_POST['matkhau']);
        $xacnhan = md5($_POST['xacnhan']);
        $role = $_POST['role'];
        
        
        if ($matkhau != $xacnhan) {
            echo "<script>alert('Mật khẩu xác nhận không khớp');</script>";
        } else {
           $p->sql1("INSERT INTO user(user_code, matkhau, vaitro) VALUES('$user_code', '$matkhau', '$role')");
           
                $_SESSION['taikhoan_vua_tao'] = $user_code;
                $_SESSION['role_vua_tao'] = $role;
                $_SESSION['ma'] = $machua_md5;
             $h =$p->checkIDUSER($user_code,$matkhau);
             $y = $h->fetch_assoc();
                $z = $y['user_id'];
                $_SESSION['user_id']= $z;
                echo "<script>alert('Tạo tài khoản thành công! Mời nhập thông tin chi tiết'); window.location.href ='themnguoidung.php'</script>";
            
        }
    }
    if (isset($_POST['btnStep2'])) {
        $hoten = $_POST['hoten'];
        $gioitinh = $_POST['gioitinh'];
        $sdt = $_POST['sdt'];
        $diachi = $_POST['diachi'];
        $tk = $_SESSION['taikhoan_vua_tao'];
        $role = $_SESSION['role_vua_tao'];
        $ma=$_SESSION['ma'];
        $user_id = $_SESSION['user_id'];
        $chuyennganh=$_POST['chuyennganh'];
        if ($role == '1') {
            // Lưu vào giảng viên
            $kq = $k->readDB("INSERT INTO giangvien(magiangvien,hotengiangvien,gioitinh,sdt,diachi,trangthai,user_id,id_chuyennganh) VALUES('$ma','$hoten','$gioitinh','$sdt','$diachi','1','$user_id','$chuyennganh')");
        } else {
            // Lưu vào sinh viên
            $kq = $k->readDB("INSERT INTO sinhvien(user_id,tensinhvien,masosinhvien,gioitinh,sdt, diachilienhe,trangthai,id_chuyennganh) VALUES('$user_id','$hoten','$ma','$gioitinh','$sdt','$diachi','1','$chuyennganh')");
        }

        if ($kq == 1) {
            echo "<script>alert('Đã lưu thông tin thành công!'); window.location.href ='themnguoidung.php'</script>";
            unset($_SESSION['taikhoan_vua_tao']);
            unset($_SESSION['role_vua_tao']);
            unset($_SESSION['user_id']);
            unset($_SESSION['ma']);
        } else {
            echo "<script>alert('Lưu thông tin thất bại!'); window.location.href ='themnguoidung.php'</script>";
           
        }
    }
}
?>

