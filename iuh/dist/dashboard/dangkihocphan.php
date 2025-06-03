<?php
session_start();
//error_reporting(0);
error_reporting(0);
include('controller.php');
$p = new controller();
if (isset($_SESSION['password']) && isset($_SESSION['sinhvien'])) {
  $mk = $_SESSION['password'];
  $tk = $_SESSION['sinhvien'];
  $h = $p->laySESSION($tk);
} else {
  echo '<script>setTimeout(function() { window.location.href = "dangnhap.php"; }, 1);</script>';
  exit;
}
if ($e = $h->fetch_array()) {
  if ($mk != $e['matkhau'] || $e['user_code'] != $_REQUEST['sv']) {
    echo '<script>alert("Bạn đang đăng nhập là người khác")</script>';
    echo '<script>setTimeout(function() { window.location.href = "../index.php"; }, 1);</script>';
    exit;
  }
}
//$idsv= $_SESSION['user'];
$user = $_REQUEST['sv'];
$tblSP = $p->danhsachALLHP();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Đăng kí học phần</title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="../assets/images/logo.png" type="image/x-icon">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
    id="main-font-link">
  <link rel="stylesheet" href="../assets/fonts/tabler-icons.min.css">
  <link rel="stylesheet" href="../assets/css/style.css" id="main-style-link">
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
        <a href="index.php?sv=<?php echo $_REQUEST['sv'] ?>" class="b-brand text-primary">
          <img src="../assets/images/logo.png" class="img-fluid logo-lg" alt="logo">
        </a>
      </div>
      <div class="navbar-content">
        <ul class="pc-navbar">
          <li class="pc-item pc-caption">
            <label>UI Components</label>
            <i class="ti ti-dashboard"></i>
          </li>
          <li class="pc-item">
            <a href="index.php?sv=<?php echo $_REQUEST['sv'] ?>" class="pc-link">
              <span class="pc-micon"><i class="ti ti-typography"></i></span>
              <span class="pc-mtext">Thông tin tài khoản</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="khoahoc.php?sv=<?php echo $_REQUEST['sv'] ?>" class="pc-link">
              <span class="pc-micon"><i class="ti ti-color-swatch"></i></span>
              <span class="pc-mtext">Các khóa học của tôi</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="ketquahoctap.php?sv=<?php echo $_REQUEST['sv'] ?>" class="pc-link">
              <span class="pc-micon"><i class="ti ti-plant-2"></i></span>
              <span class="pc-mtext">Kết quả học tập</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="dangkihocphan.php?sv=<?php echo $_REQUEST['sv'] ?>" class="pc-link">
              <span class="pc-micon"><i class="ti ti-plant-2"></i></span>
              <span class="pc-mtext">Đăng kí học phần</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="tracuucongno.php?sv=<?php echo $_REQUEST['sv'] ?>" class="pc-link">
              <span class="pc-micon"><i class="ti ti-plant-2"></i></span>
              <span class="pc-mtext">Tra cứu công nợ</span>
            </a>
          </li>

          <li class="pc-item pc-caption">
            <label>Tùy chọn</label>
            <i class="ti ti-news"></i>
          </li>
          <?php
          if (isset($_SESSION['sinhvien'])) {
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
      <!-- [Mobile Media Block end] -->
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
              <span><? // echo $r['tensinhvien'] ; ?></span>
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
                <li class="breadcrumb-item"><a href="index.php?sv=<?php echo $_REQUEST['sv'] ?>">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Thông tin</a></li>
                <li class="breadcrumb-item" aria-current="page">Đăng kí học phần</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-xl-8">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="mb-0">Đăng kí học phần</h5>
          </div>
          <form action="" method="post">
            <div class="card">
              <div class="dt-responsive table-responsive">
                <table id="reorder-events" class="table table-striped table-bordered nowrap">
                  <thead>
                    <tr>
                      <th>Mã học phần</th>
                      <th>Tên học phần</th>
                      <th>Tên lớp học phần</th>
                      <th>Thời gian</th>
                      <th>Tùy chọn</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
while ($r = $tblSP->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . $r['mahocphan'] . '</td>';
    echo '<td>' . $r['tenhocphan'] . '</td>';
    echo '<td>' . $r['tenlophocphan'] . '</td>';
    echo '<td>';
    echo "Lý thuyết:<br>
        Thứ " . $r['thuhocLT'] . " - Tiết " . $r['tietbatdauLT'] . "-" . $r['tietketthucLT'] . "<br>Phòng " . $r['phonghocLT'];
    echo "<br>Thực hành:<br>
        Thứ " . $r['thuhocTH'] . " - Tiết " . $r['tietbatdauTH'] . "-" . $r['tietketthucTH'] . "<br>Phòng " . $r['phonghocTH'];
    echo '</td>';

    // Bọc nút trong 1 form riêng + truyền hidden value
    echo '<td>
            <form method="post">
                <input type="hidden" name="id" value="' . $r['id'] . '">
                <input type="hidden" name="mahocphan" value="' . htmlspecialchars($r['mahocphan'], ENT_QUOTES) . '">
                <input type="hidden" name="tenhocphan" value="' . htmlspecialchars($r['tenhocphan'], ENT_QUOTES) . '">
                <button type="submit" name="dangki" class="btn btn-light-primary mb-3" data-bs-toggle="modal" data-bs-target="#themGiangVienModal">Đăng ký</button>
            </form>
          </td>';
    echo '</tr>';
}

// Xử lý sau khi bấm Đăng ký
if (isset($_POST['dangki'])) {
    $tblSP1 = $p->ThongtinUSER($user);
    $r1 = $tblSP1->fetch_assoc();
    $idsv = $r1['id_sinhvien'];

    $idhp = $_POST['id'];
    $mahocphan = $_POST['mahocphan'];
    $tenhocphan = $_POST['tenhocphan'];

    // Gọi hàm cập nhật
    $p->capnhatcongno($idsv, $mahocphan, $tenhocphan);
    $p->capnhatDKHP($idsv, $idhp);

    echo '<script>alert("Đăng ký thành công");</script>';
}
?>

                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  include_once("chatbox.php");

  ?>
</body>

</html>