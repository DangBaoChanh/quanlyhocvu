<?php 
ob_start();
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
  $user=$_REQUEST['sv'];
  $idhp=$_REQUEST['idhp'];
  $idlhp=$_REQUEST['idlhp'];
  $tblSP = $p->danhsachALLSV_HP($idhp,$idlhp);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Chi tiết khóa học</title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="../assets/images/logo.png" type="image/x-icon"> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
<link rel="stylesheet" href="../assets/fonts/tabler-icons.min.css" >
<link rel="stylesheet" href="../assets/css/style.css" id="main-style-link" >

</head>\
<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
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
        <span><?php echo "Xin chào" ;?></span>
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
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="mb-0">Danh sách sinh viên</h5>
            <ul class="nav nav-pills justify-content-end mb-0" id="chart-tab-tab" role="tablist">
            </ul>
          </div>
          <div class="card">
            <div class="dt-responsive table-responsive">
              <form action="" method="post">
              <table id="reorder-events" class="table table-striped table-bordered nowrap">
                <thead>
                  <tr>
                    <th>Tên sinh viên</th>
                                   </tr>
                </thead>
                <tbody>
                  
                      <?php 
            while ($r = $tblSP->fetch_assoc()) {
              echo '<tr>';
              echo '<td>' . $r['tensinhvien'] . '</td>';
              echo '</tr>';
              $id_hp=$r['id_hocphan'];
          }
        
?>                 
                </tbody>
                <tr>
  <th>
    <input type="text" name="bainop" placeholder="Tên bài nộp">
    <label for="ngaynop">Ngày nộp:</label>
    <input type="date" name="ngaynop" id="" value="<?php echo date('Y-m-d'); ?>">
    <label for="ngayketthuc">Ngày kết thúc nộp:</label>
    <input type="date" name="ngayketthuc" id="" value="<?php echo date('Y-m-d'); ?>">

    <button type="submit" name="btnLuu">Thêm bài nộp</button>
  </th>
</tr>

              </table>
              </form>
            </div>
            <div class="pc-content">
      </div>
    </section>
          </div>
          
        </div>
        <div class="col-md-12 col-xl-10">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="mb-0">Bài nộp</h5>
            <ul class="nav nav-pills justify-content-end mb-0" id="chart-tab-tab" role="tablist">

            </ul>
          </div>
          <div class="card">
            <div class="dt-responsive table-responsive">
              <form action="" method="post">
              <table id="reorder-events" class="table table-striped table-bordered nowrap">
              
                <tbody>
                  
                      <?php 
                      $tblSP2=$p->nopbaitap($idhp);
                      if($tblSP2===0){
                        echo '<tr>';
              echo '<td>Chưa có bài nào</td>';
              echo '</tr>';
                      }else{
 while ($r2 = $tblSP2->fetch_assoc()) {
              echo '<tr>';
              echo '<td>' . $r2['tieude'] . '</td>';
              echo '<td><button type="submit" name="btnXoa" value="'.$r2['id_btlt'].'">Xóa</button></td>
              <input type="hidden" name="td" value="'.$r2['tieude'].'">';
              echo '<td><button type="submit" name="btnTai" value="'.$r2['id_btlt'].'">Tải xuống file sinh viên nộp</button></td>';
              echo '</tr>';
          
          }
        }
           
?>                 
                </tbody>
                
              </table>
              </form>
            </div>
            <div class="pc-content">
      </div>
    </section>
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
            $p1 = new KetNoi();
            $conn = $p1->moketnoi();
          if(isset($_REQUEST['bainop'])){
if(empty($_REQUEST['bainop'])){
              echo '<script>alert("Vui lòng nhập tên bài nộp")</script>';
              exit;
            }else{
              
              $tieude=$_REQUEST['bainop'];
              $batdaunop=$_REQUEST['ngaynop'];
              $ketthucnop=$_REQUEST['ngayketthuc'];
              
            $sql = "INSERT INTO baitaplythuyet (tieude,batdaunop,ketthucnop,id_hocphan) VALUES ('$tieude','$batdaunop','$ketthucnop','$id_hp')";
            mysqli_query($conn, $sql); 
            echo '<script>
    alert("Cập nhật thành công");
    window.location.href = "chitietkhoahoc.php?sv=' . $_REQUEST['sv'] . '&idhp=' . $idhp . '&idlhp=' . $idlhp . '";
</script>';
            }
          }
          if(isset($_REQUEST['btnXoa'])){
            $id_btlt=$_REQUEST['btnXoa'];
$sql = "DELETE FROM baitaplythuyet where id_btlt ='$id_btlt' ";
            mysqli_query($conn, $sql); 
            echo '<script>
    alert("Xóa thành công");
    window.location.href = "chitietkhoahoc.php?sv=' . $_REQUEST['sv'] . '&idhp=' . $idhp . '&idlhp=' . $idlhp . '";
</script>';
          }
          include_once("ketnoi.php");

$p1 = new KetNoi();
$conn = $p1->moketnoi();

if (isset($_REQUEST['btnTai'])) {
  $td=$_REQUEST['td'];
    $idbtlt = $_REQUEST['btnTai']; // dùng đúng id được gửi từ nút bấm

    $sql = "SELECT filenop FROM filenopbtlt WHERE id_btlt = $idbtlt";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $zip = new ZipArchive();
        $zipFileName = "Baitap_$td.zip";
        $zipFilePath = __DIR__ . "/" . $zipFileName;

        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== TRUE) {
            die("Không thể tạo file ZIP.");
        }
        while ($row = mysqli_fetch_assoc($result)) {
            $fileName = $row['filenop'];
            $filePath = "../filebaitap/" . $fileName;
            if (file_exists($filePath)) {
                $zip->addFile($filePath, $fileName);
            }
        }
        $zip->close();
        // Xóa toàn bộ đệm trước khi gửi file
        if (ob_get_length()) {
            ob_end_clean();
        }
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . basename($zipFileName) . '"');
        header('Content-Length: ' . filesize($zipFilePath));
        flush();
        readfile($zipFilePath);
        // Xoá file ZIP sau khi gửi
        unlink($zipFilePath);
        exit;
    } else {
        echo "<script>alert('Không có file nào được nộp.')</script>";
    }
}

ob_end_flush();
            
          ?>