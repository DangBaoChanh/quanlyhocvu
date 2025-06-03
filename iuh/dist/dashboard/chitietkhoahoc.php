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
//$idsv= $_SESSION['user'];
$user = $_REQUEST['hp'];
$id_sv = $_SESSION['sinhvien'];
$tblSP = $p->danhsachHPCT($user);
$r = $tblSP->fetch_assoc();
$tblSP3 = $p->layID($id_sv);
$r3 = $tblSP3->fetch_assoc();
$idsv_bt = $r3['id_sinhvien'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Chi tiết khóa học</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="../assets/images/logo.png" type="image/x-icon"> <
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
              <span><?php echo $r['tensinhvien']; ?></span>
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
            <h5 class="mb-0">Khóa học của bạn</h5>
          </div>
          <div class="card">
            <div class="dt-responsive table-responsive">
              <table id="reorder-events" class="table table-striped table-bordered nowrap">
                <thead>
                  <tr>
                    <th>Tên học phần</th>
                    <th>Mã học phần</th>
                    <th>Lớp học phần</th>
                    <th>Giảng viên</th>
                    <th>Thời gian</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $r["tenhocphan"]; ?></td>
                    <td><?php echo $r["malophocphan"]; ?></td>
                    <td><?php echo $r["tenlophocphan"]; ?></td>
                    <td><?php echo $r["hotengiangvien"]; ?></td>
                    <td>
                      <?php echo "Thứ " . $r["thuhocLT"] . "<br>Tiết " . $r['tietbatdauLT'] . "-" . $r['tietketthucLT'] . "<br>Lớp " . $r['phonghocLT']; ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="pc-content">
            </div>
            </section>
          </div>

          <div class="card">
            <div class="dt-responsive table-responsive">
              <table id="reorder-events" class="table table-striped table-bordered nowrap">
                <thead>
                  <tr>
                    <th  colspan="3" style="text-align: center;">Bài tập</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $idhp = md5($r['id_hocphan']);
                  $tblSP2 = $p->nopbaitap($idhp);
                  if ($tblSP2 === 0) {
                    echo '<tr>';
                    echo '<td>Chưa có bài nào cần nộp</td>';
                    echo '</tr>';
                  } else {
                    while ($r2 = $tblSP2->fetch_assoc()) {
    $id_btlt = $r2['id_btlt'];
    $tblSP4 = $p->baitap_sv($idsv_bt, $idhp, $id_btlt);
    $currentDate = strtotime(date("Y-m-d"));
    $deadline = strtotime($r2["ketthucnop"]);
    if ($tblSP4 && $tblSP4->num_rows > 0) {
        $r4 = $tblSP4->fetch_assoc();
        echo '<form action="" method="post">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="mb-0">' . $r4['tieude'] . '</h5>
                  <p><a href="../filebaitap/' . $r4['filenop'] . '" download>' . $r4['filenop'] . '</a> (Đã nộp)</p>
                  <button type="submit" name="xoafile" value="' . $r4['id_filenopbtlt'] . '" class="btn btn-danger btn-sm">Xóa</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        </form>';
    } else {
        if ($currentDate <= $deadline) {
            echo '<form action="" class="dropzone" method="post" enctype="multipart/form-data">
            <div class="page-header">
              <div class="page-block">
                <div class="row align-items-center">
                  <div class="col-md-12">
                    <div class="page-header-title">
                      <h2 class="mb-0">' . $r2['tieude'] . '</h2>
                      <input type="hidden" name="tieude" value="' . $r2['tieude'] . '">
                      <input type="hidden" name="id_btlt" value="' . $r2['id_btlt'] . '">
                    </div>
                    <div>
                      <h5>Hạn nộp <a class="mb-0">từ ' . date("d-m-Y", strtotime($r2["batdaunop"])) . ' đến ' . date("d-m-Y", strtotime($r2["ketthucnop"])) . '</a></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5>File Upload</h5>
                  </div>
                  <div class="card-body">
                    <div class="fallback">
                      <input type="file" name="fileup" accept=".zip,.txt,.docx,.rar" class="form-control" required>
                    </div>
                    <div class="text-center m-t-2"><br>
                      <button class="btn btn-primary" type="submit" name="taifile">Upload Now</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </form>';
        } else {
            
            echo '
              <div class="alert alert-danger mt-3">
                <strong>' . $r2["tieude"] . ':</strong> Đã quá hạn nộp (đến ' . date("d-m-Y", $deadline) . '). Bạn không thể nộp bài.
              </div>';
        }
    }
}
                  }
                  ?>
                </tbody>
              </table>
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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/PHPMailer-master/src/SMTP.php';
include_once("ketnoi.php");
$p2 = new KetNoi();
$con = $p2->moketnoi();

$allowed_extensions = ['xlsx', 'docx', 'rar','zip'];

//$max_file_size = 10 * 1024 * 1024; 

if (isset($_REQUEST['taifile'])) {
  $file_name = $_FILES['fileup']['name'];
    $file_tmp_name = $_FILES['fileup']['tmp_name'];
    $file_size = $_FILES['fileup']['size'];
    $s = $_FILES['fileup']['size'];
    $name = $_FILES['fileup']['name'];
    $tmp = $_FILES['fileup']['tmp_name'];
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

    if ($s > 10 * 1024 * 1024) {
        echo "<script>alert('Kích thước file không được quá 10MB !')</script>";
        return;
    }

    $uploadDir = '../filebaitap/';
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

    // Hàm xóa thư mục và file con
    function deleteFolder($folder) {
        if (!is_dir($folder)) return;
        $items = array_diff(scandir($folder), ['.', '..']);
        foreach ($items as $item) {
            $path = "$folder/$item";
            is_dir($path) ? deleteFolder($path) : unlink($path);
        }
        rmdir($folder);
    }

    function containsMalware($content) {
        return preg_match('/(eval\s*\()|(system\s*\()|(exec\s*\()|(shell_exec\s*\()|(passthru\s*\()|(`.+`)|(base64_decode\s*\()|(phpinfo\s*\()|(chmod\s*\()/i', $content);
    }//01

    $malicious = false;
    $malicious_files = [];

    // Xử lý file ZIP hoặc RAR
    if (in_array($ext, ['zip', 'rar'])) {
        $targetPath = $uploadDir . $name; //dịa chi mới
        $filenameOnly = pathinfo($name, PATHINFO_FILENAME);
        $extractFolder = $uploadDir . $filenameOnly . '/';
        if (!is_dir($extractFolder)) mkdir($extractFolder, 0777, true);

        move_uploaded_file($tmp, $targetPath);

        // Giải nén và quét
        if ($ext === 'zip') {
            $zip = new ZipArchive;
            if ($zip->open($targetPath) === TRUE) {
                $zip->extractTo($extractFolder);
                $zip->close();
            } else {
                echo "<script>alert('Không thể giải nén file ZIP!')</script>";
                return;
            }
        } elseif ($ext === 'rar') {
            if (!class_exists('RarArchive')) {
                echo "<script>alert('Máy chủ chưa hỗ trợ giải nén RAR (cần bật RarArchive)')</script>";
                return;
            }
            $rar = RarArchive::open($targetPath);
            if ($rar === false) {
                echo "<script>alert('Không thể mở file RAR!')</script>";
                return;
            }
            $entries = $rar->getEntries();//ds file
            foreach ($entries as $entry) {//quét
                $entryPath = $extractFolder . $entry->getName();//link
                $entryDir = dirname($entryPath);
                if (!is_dir($entryDir)) mkdir($entryDir, 0777, true);
                $entry->extract($extractFolder);// giải từng file
            }
            $rar->close();
        }

        // Quét trong thư mục giải nén
        $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($extractFolder));//dq
        foreach ($rii as $file) {
            if ($file->isDir()) continue;//bỏ thư mục
            $ext2 = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            $path = $file->getPathname();
            $content = '';

            if ($ext2 === 'txt') {
                $content = file_get_contents($path);
           } elseif ($ext2 === 'docx') {
                $docx = new ZipArchive();
                if ($docx->open($path) === TRUE) {
                    $data = $docx->getFromName('word/document.xml');
                    $docx->close();
                    $content = strip_tags(html_entity_decode($data));//-html,xml deer thg,gi/m
                }
            } else {
                $content = file_get_contents($path);
            }

            if ($content && containsMalware($content)) {
                $malicious = true;
                $malicious_files[] = $path;
            }
        }

        if ($malicious) {
    deleteFolder($extractFolder);
    if (file_exists($targetPath)) unlink($targetPath);
    echo "<script>alert('Phát hiện mã độc! File và thư mục đã bị xoá.')</script>";


    $name = htmlspecialchars($r['tensinhvien']);
    $masv=$_SESSION['masosv'];
    $msv = htmlspecialchars($masv);
    $mail = new PHPMailer(true);
        // SMTP cấu hình Gmail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'chanhbao07@gmail.com';     
        $mail->Password = 'oybl baxm iadl yjsz';     
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        // Thiết lập người gửi và người nhận
        $mail->setFrom('chanhbao07@gmail.com', 'HỆ THỐNG');
        $mail->addAddress('baochanh120603@gmail.com', 'ADMIN');

        // Nội dung email
        $mail->isHTML(true);
        $mail->Subject = 'Cảnh báo⚠️';
        $mail->Body = "Đã có người cố upload file có chứa mã độc<br><br><b>Tên:</b> $name<br><b>Mã sinh viên:</b> $msv<br><b>Tin nhắn:</b>Vui lòng kiểm tra lại hệ thống!";

        $mail->send();
   
} else {
    deleteFolder($extractFolder);
    // File đã được lưu sẵn tại $targetPath

    $tieude = $_REQUEST['tieude'];
        $id_btlt = $_REQUEST['id_btlt'];
        $sql_insert = "INSERT INTO filenopbtlt (tieude, filenop, ngaynop, id_btlt, id_sinhvien)
                               VALUES ('$tieude', '$file_name', NOW(), $id_btlt, $idsv_bt)";

        $kq = mysqli_query($con, $sql_insert);

        if ($kq) {
          echo '<script>
    alert("Tải file và ghi vào cơ sở dữ liệu thành công");
    window.location.href = "chitietkhoahoc.php?sv=' . $id_sv . '&hp='.$user.'";
    </script>';
        }else{
          echo '<script>
    alert("Tải file thất bại");
    window.location.href = "chitietkhoahoc.php?sv=' . $id_sv . '&hp='.$user.'";
    </script>';
        }
}

    }
    // Xử lý file docx hoặc txt (quét trực tiếp không lưu file)
    elseif (in_array($ext, ['docx', 'txt'])) {
        $content = '';
        if ($ext === 'txt') {
            $content = file_get_contents($tmp);
        } elseif ($ext === 'docx') {
            $docx = new ZipArchive();
            if ($docx->open($tmp) === TRUE) {
                $data = $docx->getFromName('word/document.xml');
                $docx->close();
                $content = strip_tags(html_entity_decode($data));
            } else {
                echo "<script>alert('Không thể đọc file DOCX!')</script>";
                return;
            }
        }

        if (containsMalware($content)) {
            echo "<script>alert('Phát hiện mã độc trong file " . htmlspecialchars($name) . "! File không được lưu.')</script>";
        $name = htmlspecialchars($r['tensinhvien']);
    $masv=$_SESSION['masosv'];
    $msv = htmlspecialchars($masv);
    $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'chanhbao07@gmail.com';   
        $mail->Password = 'oybl baxm iadl yjsz';    
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->setFrom('chanhbao07@gmail.com', 'HỆ THỐNG');
        $mail->addAddress('baochanh120603@gmail.com', 'ADMIN');

        $mail->isHTML(true);
        $mail->Subject = 'Cảnh báo⚠️';
        $mail->Body = "Đã có người cố upload file có chứa mã độc<br><br><b>Tên:</b> $name<br><b>Mã sinh viên:</b> $msv<br><b>Tin nhắn:</b>Vui lòng kiểm tra lại hệ thống!";

        $mail->send();
          } else {
            // Lưu file sau khi quét
            $targetPath = $uploadDir . $name;
            if (move_uploaded_file($tmp, $targetPath)) {
              $tieude = $_REQUEST['tieude'];
        $id_btlt = $_REQUEST['id_btlt'];
        $sql_insert = "INSERT INTO filenopbtlt (tieude, filenop, ngaynop, id_btlt, id_sinhvien)
                               VALUES ('$tieude', '$file_name', NOW(), $id_btlt, $idsv_bt)";

        $kq = mysqli_query($con, $sql_insert);

        if ($kq) {
          echo '<script>
    alert("Tải file và ghi vào cơ sở dữ liệu thành công");
    window.location.href = "chitietkhoahoc.php?sv='.$id_sv.'&hp='.$user.'";
    </script>';
        }else{
          echo '<script>
    alert("Tải file thất bại");
    window.location.href = "chitietkhoahoc.php?sv='.$id_sv.'&hp='.$user.'";
    </script>';
        }
            } else {
                echo "<script>alert('Lưu file thất bại!')</script>";
            }
        }
    } else {
        echo "<script>alert('Chỉ chấp nhận file ZIP, RAR, DOCX hoặc TXT!')</script>";
    }
}
if (isset($_REQUEST['xoafile'])) {
    $id_filenopbtlt = $_REQUEST['xoafile'];

    $id_filenopbtlt = intval($id_filenopbtlt);

    $sql = "DELETE FROM filenopbtlt WHERE id_filenopbtlt = $id_filenopbtlt";

    if ($con->query($sql) === TRUE) {
        echo '<script>
    alert("Xóa file thành công");
    window.location.href = "chitietkhoahoc.php?sv='.$id_sv.'&hp='.$user.'";
    </script>';
    } else {
         echo "<script>alert('Không xóa được')</script>";
    }
}

?>