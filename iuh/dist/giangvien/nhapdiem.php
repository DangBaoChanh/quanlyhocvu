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
  
//$idsv= $_SESSION['giangvien'];
$user = $_REQUEST['sv'];
$idhp = $_REQUEST['idhp'];
$idlhp = $_REQUEST['idlhp'];
// $tblSP = $p->danhsachALLSV_HP($idhp,$idlhp);


$tblSP1 = $p->danhsachALLDIEM_SV($user, $idhp, $idlhp);
// $r1 = $tblSP1->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>Nhập điểm</title>
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
  <nav class="pc-sidebar">
    <div class="navbar-wrapper">
      <div class="m-header">
        <a href="index.php?sv=<?php echo $_REQUEST['sv'] ?>" class="b-brand text-primary">
          <!-- ========   Change your logo from here   ============ -->
          <img src="../assets/images/logo.png" class="img-fluid logo-lg" alt="logo">
        </a>
      </div>
      <div class="navbar-content">
        <ul class="pc-navbar">
          <li class="pc-item">
            <a href="index.php?sv=<?php echo $_REQUEST['sv'] ?>" class="pc-link">
              <span class="pc-micon"><i class="ti ti-typography"></i></span>
              <span class="pc-mtext">Thông tin tài khoản</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="quanlikhoahoc.php?sv=<?php echo $_REQUEST['sv'] ?>" class="pc-link">
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
              <span><?php echo "Xin chào"; ?></span>
            </a>

          </li>
        </ul>
      </div>
    </div>
  </header>
  <div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
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
                <li class="breadcrumb-item" aria-current="page">Điểm</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-xl-70">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="mb-0">Điểm</h5>
            <ul class="nav nav-pills justify-content-end mb-0" id="chart-tab-tab" role="tablist">
            </ul>
          </div>
          <div class="card">
            <form action="" method="post">
            <div class="dt-responsive table-responsive">
              <table id="reorder-events" class="table table-striped table-bordered nowrap">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên sinh viên</th>
                    <th>TK1</th>
                    <th>TK2</th>
                    <th>TK3</th>
                    <th>GK</th>
                    <th>TH1</th>
                    <th>TH2</th>
                    <th>TH3</th>
                    <th>CK</th>
                    <th>ĐIỂM TRUNG BÌNH HỌC PHẦN</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  $dem = 1;
                  while ($r1 = $tblSP1->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $dem . '</td>';
                    echo '<td>' . $r1['tensinhvien'] . '</td>';

                    echo '<input type="hidden" name="id_sinhvien[]" value="' . $r1['id_sinhvien'] . '">';
                    echo '<input type="hidden" name="id_hocphan[]" value="' . $r1['id_hocphan'] . '">';

                    echo '<td><input type="text" name="TK1[]" value="' . $r1["TK1"] . '" style="width: 5ch;"></td>';
                    echo '<td><input type="text" name="TK2[]" value="' . $r1["TK2"] . '" style="width: 5ch;"></td>';
                    echo '<td><input type="text" name="TK3[]" value="' . $r1["TK3"] . '" style="width: 5ch;"></td>';
                    echo '<td><input type="text" name="GK[]" value="' . $r1["GK"] . '" style="width: 5ch;"></td>';
                    echo '<td><input type="text" name="TH1[]" value="' . $r1["TH1"] . '" style="width: 5ch;"></td>';
                    echo '<td><input type="text" name="TH2[]" value="' . $r1["TH2"] . '" style="width: 5ch;"></td>';
                    echo '<td><input type="text" name="TH3[]" value="' . $r1["TH3"] . '" style="width: 5ch;"></td>';
                    echo '<td><input type="text" name= "CK[]" value="' . $r1["CK"] . '" style="width: 5ch;"></td>';
                    echo '<td><input type="text" name="diemtb[]" value="' . $r1["diemtb"] . '" style="width: 5ch;"></td>';
                    echo '</tr>';
                    $dem++;
                  }
                  echo '<td colspan=11 style="text-align:center;"><button type="submit" name="btnLuu">Lưu</button></td>';
                  ?>


                </tbody>
              </table>
            </div>
            <div class="pc-content">

            </div>
            </section>
            </form>
          </div>

        </div>

      </div>
    </div>
  </div>
    <?php 
  include_once("chatbox.php");

?>
</html>
<?php
include_once("ketnoi.php");
$p1 = new KetNoi();
$conn = $p1->moketnoi();

if (isset($_POST['btnLuu'])) {
    $id_sinhvien = $_POST['id_sinhvien'];
    $id_hocphan = $_POST['id_hocphan'];
    $TK1 = $_POST['TK1'];
    $TK2 = $_POST['TK2'];
    $TK3 = $_POST['TK3'];
    $GK = $_POST['GK'];
    $TH1 = $_POST['TH1'];
    $TH2 = $_POST['TH2'];
    $TH3 = $_POST['TH3'];
    $CK = $_POST['CK'];

    $dem = count($id_sinhvien);

    for ($i = 0; $i < $dem; $i++) {
        $tk1 = $TK1[$i] !== "" ? floatval($TK1[$i]) : null;
        $tk2 = $TK2[$i] !== "" ? floatval($TK2[$i]) : null;
        $tk3 = $TK3[$i] !== "" ? floatval($TK3[$i]) : null;
        $th1 = $TH1[$i] !== "" ? floatval($TH1[$i]) : null;
        $th2 = $TH2[$i] !== "" ? floatval($TH2[$i]) : null;
        $th3 = $TH3[$i] !== "" ? floatval($TH3[$i]) : null;
        $gk  = $GK[$i]  !== "" ? floatval($GK[$i])  : null;
        $ck  = $CK[$i]  !== "" ? floatval($CK[$i])  : null;

        
        $thuongky_arr = array_filter([$tk1, $tk2, $tk3, $th1, $th2, $th3], function($v) {
            return $v !== null;
        });

        $thuongky_tb = null;
        if (count($thuongky_arr) > 0) {
            $thuongky_tb = array_sum($thuongky_arr) / count($thuongky_arr);
        }

        
        if ($thuongky_tb !== null && $gk !== null && $ck !== null) {
            $diemtb = round(($thuongky_tb * 0.2) + ($gk * 0.3) + ($ck * 0.5), 2);
        } else {
            $diemtb = "NULL"; 
        }
        $sql = "UPDATE diem SET
                TK1 = " . ($tk1 !== null ? "'$tk1'" : "NULL") . ",
                TK2 = " . ($tk2 !== null ? "'$tk2'" : "NULL") . ",
                TK3 = " . ($tk3 !== null ? "'$tk3'" : "NULL") . ",
                GK  = " . ($gk  !== null ? "'$gk'"  : "NULL") . ",
                TH1 = " . ($th1 !== null ? "'$th1'" : "NULL") . ",
                TH2 = " . ($th2 !== null ? "'$th2'" : "NULL") . ",
                TH3 = " . ($th3 !== null ? "'$th3'" : "NULL") . ",
                CK  = " . ($ck  !== null ? "'$ck'"  : "NULL") . ",
                diemtb = " . ($diemtb !== "NULL" ? "'$diemtb'" : "NULL") . "
                WHERE id_sinhvien = '{$id_sinhvien[$i]}'
                  AND id_hocphan = '{$id_hocphan[$i]}'";

        mysqli_query($conn, $sql);
    }

    echo '<script>
        alert("Cập nhật thành công");
        window.location.href = "nhapdiem.php?sv=' . $_REQUEST['sv'] . '&idhp=' . $_REQUEST['idhp'] . '&idlhp=' . $_REQUEST['idlhp'] . '";
    </script>';
}
?>
