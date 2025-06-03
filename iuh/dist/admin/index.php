<?php
session_start();
error_reporting(0);
//error_reporting(0);
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
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="../assets/images/logo.png" type="image/x-icon"> <!-- [Google Font] Family -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
    id="main-font-link">
  <link rel="stylesheet" href="../assets/fonts/tabler-icons.min.css">
  <link rel="stylesheet" href="../assets/css/style.css" id="main-style-link">

</head>

<body>
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
          if (isset($_SESSION['admin'])) {
            echo '<li class="pc-item">
      <a href="dangxuat.php" class="pc-link">
        <span class="pc-micon"><i class="ti ti-user-plus"></i></span>
        <span class="pc-mtext">Đăng xuất</span>
      </a>
    </li>';
          } else {
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
            <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button"
              aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
              <img src="../assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar">
              <span>Đặng Bảo Chánh</span>
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
                <li class="breadcrumb-item"><a href="../dashboard/index.html">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Người dùng</a></li>
                <li class="breadcrumb-item" aria-current="page">Thông tin</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Thông tin cá nhân</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header pb-0">
              <ul class="nav nav-tabs profile-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="profile-tab-1" data-bs-toggle="tab" href="#profile-1" role="tab"
                    aria-selected="true">
                    <i class="ti ti-user me-2"></i>Thông tin cá nhân
                  </a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane show active" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
                  <div class="row">
                    <div class="col-lg-4 col-xxl-3">
                      <div class="card">
                        <div class="card-body position-relative">
                          <div class="position-absolute end-0 top-0 p-3">
                            <span class="badge bg-primary"> Nam</span>
                          </div>
                          <div class="text-center mt-3">
                            <div class="chat-avtar d-inline-flex mx-auto">
                              <img class="rounded-circle img-fluid wid-70" src="../assets/images/user/avatar-5.jpg"
                                alt="User image">
                            </div>
                            <h5 class="mb-0">Đặng Bảo Chánh</h5>
                            <p class="text-muted text-sm">Admin</p>
                            <hr class="my-3">
                            <div class="row g-3">

                            </div>
                            <hr class="my-3">

                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="col-lg-8 col-xxl-9">
                      <div class="card">
                        <div class="card-header">
                          <h5>Bản thân</h5>
                        </div>
                        <div class="card-body">
                          <p class="mb-0">Xin chào, tên tôi là Đặng Bảo Chánh</p>
                        </div>
                      </div>



                    </div>
                  </div>
                </div>

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