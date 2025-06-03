<?php 
session_start();
error_reporting(0);
include('controller.php');
$p = new controller();

if (isset($_SESSION['password']) && isset($_SESSION['admin'])) {
    $mk = $_SESSION['password'];
    $tk = $_SESSION['admin'];
    $h = $p->laySESSION($tk);
} else {
    echo '<script>setTimeout(function() { window.location.href = "dangnhap.php"; }, 1);</script>';
    exit;
}

if ($e = $h->fetch_array()) {
    if ($mk != $e['matkhau'] || $e['user_code'] != $_SESSION['admin']) {
        echo '<script>setTimeout(function() { window.location.href = "../index.php"; }, 1);</script>';
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quản lí giảng viên</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../assets/images/logo.png" type="image/x-icon"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
    <link rel="stylesheet" href="../assets/fonts/tabler-icons.min.css">
    <link rel="stylesheet" href="../assets/css/style.css" id="main-style-link">
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
        <li class="pc-item"><a href="index.php" class="pc-link"><span class="pc-micon"><i class="ti ti-typography"></i></span><span class="pc-mtext">Thông tin tài khoản</span></a></li>
        <li class="pc-item"><a href="quanligiangvien.php" class="pc-link"><span class="pc-micon"><i class="ti ti-color-swatch"></i></span><span class="pc-mtext">Quản lí giảng viên</span></a></li>
        <li class="pc-item"><a href="quanlisinhvien.php" class="pc-link"><span class="pc-micon"><i class="ti ti-plant-2"></i></span><span class="pc-mtext">Quản lí sinh viên</span></a></li>
        <li class="pc-item"><a href="themnguoidung.php" class="pc-link"><span class="pc-micon"><i class="ti ti-user"></i></span><span class="pc-mtext">Thêm người dùng</span></a></li>
        <li class="pc-item"><a href="quanlihocphan.php" class="pc-link"><span class="pc-micon"><i class="ti ti-news"></i></span><span class="pc-mtext">Quản lí học phần</span></a></li>
        <li class="pc-item pc-caption"><label>Tùy chọn</label><i class="ti ti-news"></i></li>
        <?php 
          if(isset($_SESSION['admin'])){
            echo '<li class="pc-item"><a href="dangxuat.php" class="pc-link"><span class="pc-micon"><i class="ti ti-user-plus"></i></span><span class="pc-mtext">Đăng xuất</span></a></li>';
          } else {
            echo '<li class="pc-item"><a href="dangnhap.php" class="pc-link"><span class="pc-micon"><i class="ti ti-lock"></i></span><span class="pc-mtext">Đăng nhập</span></a></li>';
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
        <li class="dropdown pc-h-item"><a class="pc-head-link me-0" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_pc_layout"><i class="ti ti-settings"></i></a></li>
        <li class="dropdown pc-h-item header-user-profile"><a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"><img src="../assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar"><span></span></a></li>
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
            <div class="page-header-title"><h5 class="m-b-10">Home</h5></div>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="../dashboard/index.html">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="javascript: void(0)">Thông tin</a></li>
              <li class="breadcrumb-item" aria-current="page">Khóa học</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <form action="" method="post">
      <div class="mb-3">
        <input type="text" name="tukhoa" class="form-control" placeholder="Nhập tên giảng viên để tìm kiếm..." value="<?php echo isset($_POST['tukhoa']) ? $_POST['tukhoa'] : ''; ?>">
      </div>
      <div class="row">
        <div class="col-md-12 col-xl-8">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="mb-0">Danh sách giảng viên</h5>
          </div>

          <?php 
          if (isset($_POST['tukhoa']) && $_POST['tukhoa'] != '') {
              $tukhoa = $_POST['tukhoa'];
              $tblSP = $p->timGiangVienTheoTen($tukhoa); // bạn cần viết hàm này trong controller.php
          } else {
              $tblSP = $p->danhsachGV();
          }

          echo '<div class="card">
                <div class="dt-responsive table-responsive">
                <table id="reorder-events" class="table table-striped table-bordered nowrap">
                <thead>
                  <tr>
                    <th>Tên giảng viên</th>
                    <th>Ngành</th>
                    <th colspan ="2" style="text-align:center">Tùy chọn</th>
                  </tr>
                </thead>';

          while ($r = $tblSP->fetch_assoc()) {
              echo '<tbody><tr><td>' . $r["hotengiangvien"] . '</td>';
              echo '<td>' . $r["tenchuyennganh"] . '</td>';
              echo '<td><a class="btn btn-light-primary mb-3" href="indextt.php?sv=' . md5($r["id_giangvien"]) . '">Xem</a></td>';
              echo '<td><button type="submit" class="btn btn-light-primary mb-3" name="xoa" value="' . md5($r['id_giangvien']) . '">Xóa</button></td></tr></tbody>';
          }

          echo '</table></div></div>';
          ?>
        </div>
      </div>
    </form>
  </div>
</div>

<?php include_once("chatbox.php"); ?>
</body>
</html>

<?php 
if (isset($_REQUEST['xoa'])) {
    $id_giangvien = $_REQUEST['xoa'];
    $p->xoagiangvien($id_giangvien);
    if ($p === -1 || $p === 0) {
        echo '<script>alert("Lỗi không xóa được")</script>';
    } else {
        echo '<script>
        alert("Cập nhật thành công");
        window.location.href = "quanligiangvien.php";
        </script>';
    }
}
?>
