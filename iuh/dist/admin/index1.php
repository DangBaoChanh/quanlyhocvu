<?php 
session_start();
error_reporting(0);
//error_reporting(0);
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
 
  
  $idsv= $_SESSION['admin'];
  $user=$_REQUEST['sv'];
  $tblSP = $p->ThongtinSV($user);
  $r = $tblSP->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thông tin sinh viên</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="../assets/images/logo.png" type="image/x-icon"> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
<link rel="stylesheet" href="../assets/fonts/tabler-icons.min.css" >
<link rel="stylesheet" href="../assets/css/style.css" id="main-style-link" >

</head>
<body>
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
        <span><?php echo $r['tensinhvien'] ;?></span>
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
            <form action="" method="post">
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane show active" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
                  <div class="row">
                    <div class="col-lg-4 col-xxl-3">
                      <div class="card">
                        <div class="card-body position-relative">
                          <div class="position-absolute end-0 top-0 p-3">
                            <span class="badge bg-primary"> </span>
                          </div>
                          <div class="text-center mt-3">
                            <div class="chat-avtar d-inline-flex mx-auto">
                              <img class="rounded-circle img-fluid wid-70" src="../assets/images/user/avatar-5.jpg"
                                alt="User image">
                            </div>
                            <h5 class="mb-0"> <?php echo $r['tensinhvien'];?></h5>
                            <p class="text-muted text-sm">Sinh viên</p>
                            <hr class="my-3">
                            <div class="row g-3">
                              <div class="col-4">
                                <h5 class="mb-0">86</h5>
                                <small class="text-muted">Post</small>
                              </div>
                              <div class="col-4 border border-top-0 border-bottom-0">
                                <h5 class="mb-0">40</h5>
                                <small class="text-muted">Project</small>
                              </div>
                              <div class="col-4">
                                <h5 class="mb-0">4.5K</h5>
                                <small class="text-muted">Members</small>
                              </div>
                            </div>
                            <hr class="my-3">
                            <div class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
                              <i class="ti ti-mail"></i>
                              <p class="mb-0"><?php echo $r['email'];?></p>
                            </div>
                            <div class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
                              <i class="ti ti-phone"></i>
                              <p class="mb-0"> <?php echo $r['sdt'];?></p>
                            </div>
                            <div class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
                              <i class="ti ti-map-pin"></i>
                              <p class="mb-0"> <?php echo $r['noicap'];?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header">
                          <h5>Kỹ năng</h5>
                        </div>
                        <div class="card-body">
                          <div class="row align-items-center mb-3">
                            <div class="col-sm-6 mb-2 mb-sm-0">
                              <p class="mb-0">Wordpress</p>
                            </div>
                            <div class="col-sm-6">
                              <div class="d-flex align-items-center">
                                <div class="flex-grow-1 me-3">
                                  <div class="progress progress-primary" style="height: 6px;">
                                    <div class="progress-bar" style="width: 90%;"></div>
                                  </div>
                                </div>
                                <div class="flex-shrink-0">
                                  <p class="mb-0 text-muted">90%</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row align-items-center mb-3">
                            <div class="col-sm-6 mb-2 mb-sm-0">
                              <p class="mb-0">HTML</p>
                            </div>
                            <div class="col-sm-6">
                              <div class="d-flex align-items-center">
                                <div class="flex-grow-1 me-3">
                                  <div class="progress progress-primary" style="height: 6px;">
                                    <div class="progress-bar" style="width: 30%;"></div>
                                  </div>
                                </div>
                                <div class="flex-shrink-0">
                                  <p class="mb-0 text-muted">30%</p>
                                </div>
                              </div>
                            </div>
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
                          <p class="mb-0">Xin chào, tên sinh viên là  <?php echo $r['tensinhvien'];?></p>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header">
                          <h5>Thông tin chi tiết</h5>
                        </div>
                        <div class="card-body">
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0 pt-0">
                              <div class="row">
                                <div class="col-md-6">
                                  <p class="mb-1 text-muted">Tên đầy đủ</p>
                                  <p class="mb-0"><input type="text" name="tensinhvien" id="" value="<?php echo $r['tensinhvien'];?>"> </p>
                                </div>
                                <div class="col-md-6">
                                  <p class="mb-1 text-muted">Căn cước công dân</p>
                                  <p class="mb-0"><?php echo $r['cccd'];?></p>
                                </div>
                              </div>
                            </li>
                            <li class="list-group-item px-0">
                              <div class="row">
                                <div class="col-md-6">
                                  <p class="mb-1 text-muted">Mã số sinh viên</p>
                                  <p class="mb-0"><?php echo $r['masosinhvien'];?>  </p>
                                </div>
                                <div class="col-md-6">
                                  <p class="mb-1 text-muted">Hộ khẩu thường trú</p>
                                  <p class="mb-0"><input type="text" name="hokhauthuongtru" id="" value="<?php echo $r['hokhauthuongtru'];?>"> </p>
                                </div>
                              </div>
                            </li>
                            <li class="list-group-item px-0">
                              <div class="row">
                                <div class="col-md-6">
                                  <p class="mb-1 text-muted">Email</p>
                                  <p class="mb-0"><?php echo $r['email'];?></p>
                                </div>
                                <div class="col-md-6">
                                  <p class="mb-1 text-muted">Ngày sinh</p>
                                  <p class="mb-0"><input type="text" name="ngaysinh" value="<?php echo $r['ngaysinh'];?>" id=""> </p>
                                </div>
                              </div>
                            </li>
                            <li class="list-group-item px-0 pb-0">
                            <div class="row">
                                <div class="col-md-6">
                                <p class="mb-1 text-muted">Địa chỉ liên hệ</p>
                                <p class="mb-0"><input type="text" name="diachilienhe" id="" value="<?php echo $r['diachilienhe'];?>"> </p>
                                </div>
                                <div class="col-md-6">
                                  <p class="mb-1 text-muted">Ngày cấp CCCD</p>
                                  <p class="mb-0"><input type="text" name="ngaycap" id="" value="<?php echo $r['ngaycap'];?>"> </p>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header">
                          <h5>Học tập</h5>
                        </div>
                        <div class="card-body">
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0 pt-0">
                              <div class="row">
                                <div class="col-md-6">
                                  <p class="mb-1 text-muted">Khóa</p>
                                  <p class="mb-0"><input type="text" name="khoa" id="" value=" <?php echo $r['khoa'];?> "></p>
                                </div>
                                <div class="col-md-6">
                                  <p class="mb-1 text-muted">Ngày vào trường</p>
                                  <p class="mb-0"><input type="text" name="ngayvaotruong" id="" value="<?php echo $r['ngayvaotruong'];?>"> </p>
                                </div>
                              </div>
                            </li>
                            <li class="list-group-item px-0">
                              <div class="row">
                                <div class="col-md-6">
                                  <p class="mb-1 text-muted">Lớp</p>
                                  <p class="mb-0"><input type="text" name="lopCN" id="" value="<?php echo $r['lopCN'];?>"> </p>
                                </div>
                                <div class="col-md-6">
                                  <p class="mb-1 text-muted">Cở sở đào tạo</p>
                                  <p class="mb-0"> <?php echo $r['cosodaotao'];?></p>
                                </div>
                              </div>
                            </li>
                            <li class="list-group-item px-0 pb-0">
                              <div class="row">
                                <div class="col-md-6">
                                  <p class="mb-1 text-muted">Trạng thái</p>
                                  <p class="mb-0">Đang học</p>
                                </div>
                                <div class="col-md-6">
                                  <label>Chuyên ngành</label>
    <select name="chuyennganh" class="form-control" required>
      <option value="<?php echo $r['id_chuyennganh'];?> "selectd><?php echo $r['tenchuyennganh'];?></option>
        <?php 
            $tP = $p->layCN();
            while($q = $tP ->fetch_array()){
                echo '<option value="'.$q['id_chuyennganh'].'">'.$q['tenchuyennganh'].'</option>';
            }

?>
      
    </select>
                                </div>
                              </div>
                            </li>
                            <li class="list-group-item px-0">
                              <div class="row">
                                <div class="col-md-6">
                                  <p class="mb-1 text-muted">Giới tính</p>
                                  <p class="mb-0"><input type="text" name="gioitinh" id="" value="<?php echo $r['gioitinh'];?>"> </p>
                                </div>
                                <div class="col-md-6">
                                <button type="submit" name="luu">Lưu</button>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>

              </div>
            </div>
            </form>
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
$p = new Ketnoi();
$conn =$p->moketnoi();
  if (isset($_POST['luu'])) {
    $tensinhvien = $_POST['tensinhvien'];
    $gioitinh = $_POST['gioitinh'];
    $ngaysinh = $_POST['ngaysinh'];
    $ngaycap = $_POST['ngaycap'];
    $diachilienhe = $_POST['diachilienhe'];
    $hokhauthuongtru = $_POST['hokhauthuongtru'];
    $ngayvaotruong = $_POST['ngayvaotruong'];
    $khoa = $_POST['khoa'];
    $lopcn = $_POST['lopCN'];
    $chuyennganh=$_POST['chuyennganh'];
    $idsvien = $_REQUEST['sv'];
    
    // Kiểm tra các biến có trống không
    if (!empty($tensinhvien) && !empty($gioitinh) && !empty($ngaysinh) && !empty($ngaycap) && !empty($diachilienhe) && !empty($hokhauthuongtru) && !empty($ngayvaotruong) && !empty($khoa) && !empty($lopcn) && !empty($chuyennganh)) {
        // Chuẩn bị truy vấn cập nhật
         $sql = "UPDATE sinhvien SET 
                tensinhvien = ?, 
                gioitinh = ?, 
                ngaysinh = ?, 
                ngaycap = ?,
                diachilienhe = ?, 
                hokhauthuongtru = ?, 
                ngayvaotruong = ?, 
                khoa = ?, 
                lopCN = ?, 
                id_chuyennganh = ? 
            WHERE md5(masosinhvien) = ?";

       
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssss", $tensinhvien, $gioitinh, $ngaysinh, $ngaycap, $diachilienhe, $hokhauthuongtru, $ngayvaotruong, $khoa, $lopcn, $chuyennganh, $idsvien);


        if ($stmt->execute()) {
            // Cập nhật thành công, load lại trang
            echo '<script>
    alert("Cập nhật thành công");
    window.location.href = "index1.php?sv='.$_REQUEST['sv'].'";
</script>';
            exit();
        } else {
            echo '<script>alert("Cập nhật thất bại")</script>';
        }

        $stmt->close();
    } else {
        echo '<script>alert("Vui lòng điền đầy đủ thông tin")</script>';
    }
}



?>