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

//$idsv= $_SESSION['user'];
$mahocphan = $_REQUEST['mhp'];
$tblSP = $p->testALLTHONGTIN($mahocphan);
$r = $tblSP->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sửa học phần</title>
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
                        <a class="pc-head-link me-0" href="#" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvas_pc_layout">
                            <i class="ti ti-settings"></i>
                        </a>
                    </li>
                    <li class="dropdown pc-h-item header-user-profile">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
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
                                <li class="breadcrumb-item" aria-current="page">Sửa học phần</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xl-13">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="mb-0">Sửa học phần</h5>
                    </div>
                    <div class="card">
                        <div class="dt-responsive table-responsive">
                            <table id="reorder-events" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Tên học phần</th>
                                        <th>Mã học phần</th>
                                        <th>Tên lớp học phần</th>
                                        <th>Lý thuyết</th>
                                        <th>Thực hành</th>
                                        <th>Giảng viên</th>

                                    </tr>
                                </thead>
                                <form action="" method="post">
                                    <tbody>
                                        <?php

                                        echo '<tr>';
                                        echo '<td><input type="text" name="tenhocphan" value="' . $r['tenhocphan'] . '" style="width: 35ch;"></td>';
                                        echo '<td>' . $r['mahocphan'] . '</td>';
                                        echo '<td><select name="id_lophocphan" id="">
                                                <option value=' . $r['id_lophocphan'] . ' selected>' . $r['tenlophocphan'] . '</option>';
                                        $tblSP1 = $p->danhsachLHP();
                                        while ($r1 = $tblSP1->fetch_assoc()) {
                                            echo '<option value=' . $r1['id_lophocphan'] . '>' . $r1['tenlophocphan'] . '</option>';
                                        }

                                        echo '</select></td>';
                                        echo '<td>Thứ <select name="thuhocLT" id="">
                                                <option value=' . $r['thuhocLT'] . ' selected>' . $r['thuhocLT'] . '</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="Chủ nhật">Chủ nhật</option>
                                            </select><br>';

                                        echo 'Tiết <select name="tietbatdauLT" id="">
                                                <option value=' . $r['tietbatdauLT'] . ' selected>' . $r['tietbatdauLT'] . '</option>
                                                <option value="1">1</option>
                                                <option value="4">4</option>
                                                <option value="7">7</option>
                                                <option value="10">10</option>
                                                <option value="13">13</option>
                                            </select>-';
                                        echo '<select name="tietketthucLT" id="">
                                                <option value=' . $r['tietketthucLT'] . ' selected>' . $r['tietketthucLT'] . '</option>
                                                <option value="3">3</option>
                                                <option value="6">6</option>
                                                <option value="9">9</option>
                                                <option value="12">12</option>
                                                <option value="15">15</option>
                                            </select><br>';
                                        echo 'Phòng <select name="phonghocLT" id="">
                                                <option value=' . $r['phonghocLT'] . ' selected>' . $r['phonghocLT'] . '</option>
                                                <option value="X10.03">X10.03</option>
                                                <option value="X10.03">X10.03</option>
                                                <option value="V9.05">V9.05</option>
                                                <option value="A2.03">A2.03</option>
                                                <option value="A1.01">A1.01</option>
                                            </select></td>';
                                        echo '<td>Thứ <select name="thuhocTH" id="">
                                                <option value=' . $r['thuhocTH'] . ' selected>' . $r['thuhocTH'] . '</option>
                                               <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="Chủ nhật">Chủ nhật</option>
                                            </select><br>';
                                        echo 'Tiết <select name="tietbatdauTH" id="">
                                                <option value=' . $r['tietbatdauTH'] . ' selected>' . $r['tietbatdauTH'] . '</option>
                                                <option value="1">1</option>
                                                <option value="4">4</option>
                                                <option value="7">7</option>
                                                <option value="10">10</option>
                                                <option value="13">13</option>
                                            </select>-';
                                        echo '<select name="tietketthucTH" id="">
                                                <option value=' . $r['tietketthucTH'] . ' selected>' . $r['tietketthucTH'] . '</option>
                                                <option value="3">3</option>
                                                <option value="6">6</option>
                                                <option value="9">9</option>
                                                <option value="12">12</option>
                                                <option value="15">15</option>
                                            </select><br>';
                                        echo 'Phòng <select name="phonghocTH" id="">
                                                <option value=' . $r['phonghocTH'] . ' selected>' . $r['phonghocTH'] . '</option>
                                                <option value="H4.01">H4.01</option>
                                                <option value="H4.02">H4.02</option>
                                                <option value="H5.02">H5.02</option>
                                                <option value="H2.01">H2.01</option>
                                                <option value="B1.03">B1.03</option>
                                            </select></td>';
                                        echo '<td><select name="id_giangvien" id="">
                                                <option value=' . $r['id_giangvien'] . ' selected>' . $r['hotengiangvien'] . '</option>';
                                        $tblSP1 = $p->danhsachGV();
                                        while ($r1 = $tblSP1->fetch_assoc()) {
                                            echo '<option value=' . $r1['id_giangvien'] . '>' . $r1['hotengiangvien'] . '</option>';
                                        }
                                        echo '</select></td>';
                                        echo '</tr>';
                                        echo '<td colspan=11 style="text-align:center;"><button type="submit" class="btn btn-light-primary mb-3" data-bs-toggle="modal" data-bs-target="#themGiangVienModal" name="btnLuu">Lưu</button></td>';
                                        if (isset($_REQUEST['btnLuu'])) {

                                            $tenhocphan = $_REQUEST['tenhocphan'];
                                            $idlophocphan = $_REQUEST['id_lophocphan'];
                                            $thuhocLT = $_REQUEST['thuhocLT'];
                                            $tietbatdauLT = $_REQUEST['tietbatdauLT'];
                                            $tietketthucLT = $_REQUEST['tietketthucLT'];
                                            $thuhocTH = $_REQUEST['thuhocTH'];
                                            $tietbatdauTH = $_REQUEST['tietbatdauTH'];
                                            $tietketthucTH = $_REQUEST['tietketthucTH'];
                                            $id_giangvien = $_REQUEST['id_giangvien'];
                                            $idhp = md5($r['id_hocphan']);
                                            $phonghocLT = $_REQUEST['phonghocLT'];
                                            $phonghocTH = $_REQUEST['phonghocTH'];
                                            if (empty($tenhocphan)) {
                                                echo '<script>alert("Tên học phần không được để trống")</script>';
                                                exit;
                                            }
                                            include_once("ketnoi.php");
                                            $p1 = new KetNoi();
                                            $conn = $p1->moketnoi();
                                            $sql = "UPDATE hocphan SET tenhocphan = '$tenhocphan' WHERE md5(id_hocphan) = '$mahocphan'";
                                            $sql1 = "UPDATE monlop SET id_lophocphan = '$idlophocphan',thuhocLT='$thuhocLT',thuhocTH='$thuhocTH',tietbatdauLT='$tietbatdauLT',
    tietketthucLT='$tietketthucLT',tietbatdauTH='$tietbatdauTH',
    tietketthucTH='$tietketthucTH',phonghocLT='$phonghocLT',phonghocTH='$phonghocTH' WHERE md5(id_hocphan) = '$idhp'";
                                            $sql2 = "UPDATE giangday gd
JOIN monlop m ON gd.id = m.id
SET gd.id_giangvien = '$id_giangvien'
WHERE md5(m.id_hocphan) = '$idhp';
";
                                            mysqli_query($conn, $sql);
                                            mysqli_query($conn, $sql1);
                                            mysqli_query($conn, $sql2);

                                            echo '<script>
    alert("Cập nhật thành công");
    window.location.href = "suahocphan.php?mhp=' . $mahocphan . '";
</script>';
                                        }
                                        ?>
                                </form>
                                </tr>
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


<?php


?>