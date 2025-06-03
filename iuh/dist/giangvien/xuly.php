<?php
include("ketnoi.php");
class xuly{
    public function checkDN($user, $password){
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con){
            $stmt = $con->prepare("SELECT * FROM user WHERE user_code = ? AND matkhau = ? AND vaitro = '1'");
            $stmt->bind_param("ss", $user, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            return false;
        }
    }

    public function checkPASS($user){
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con){
            $stmt = $con->prepare("SELECT * FROM user WHERE user_code = ? AND vaitro = '1'");
            $stmt->bind_param("s", $user);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            return false;
        }
    }

    public function getSESSION($id){
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con){
            $stmt = $con->prepare("SELECT * FROM user WHERE user_code = ?");
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            return false;
        }
    }

    public function getGV($user_id){
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con){
            $stmt = $con->prepare("SELECT * FROM user u JOIN giangvien s ON u.user_id = s.user_id WHERE u.user_code = ?");
            $stmt->bind_param("s", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            return false;
        }
    }

    public function getHP($idsv){
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con){
            // Vì $idsv được dùng trong md5(sv.masosinhvien)='$idsv' nên không thể bind param trực tiếp với LIKE md5(?) 
            // Cách an toàn là kiểm tra trước khi gọi hàm hoặc dùng chuẩn bị statement với hàm MD5 ở PHP (nếu có thể)
            $stmt = $con->prepare("SELECT * FROM sinhvien sv 
                JOIN hoctap h ON sv.id_sinhvien = h.id_sinhvien
                JOIN monlop m ON m.id = h.id
                JOIN hocphan hp ON hp.id_hocphan = m.id_hocphan
                JOIN lophocphan l ON l.id_lophocphan = m.id_lophocphan
                JOIN ct_hocphan c ON c.id_hocphan = hp.id_hocphan
                JOIN giangday gd ON gd.id = m.id
                JOIN giangvien gv ON gv.id_giangvien = gd.id_giangvien
                WHERE md5(sv.masosinhvien) = ?");

            $stmt->bind_param("s", $idsv);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            return false;
        }
    }

    public function getDIEM($idsv, $idhp, $idlhp){
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con){
            $stmt = $con->prepare("
                SELECT * FROM diem d
                JOIN ct_hocphan c ON d.id_hocphan = c.id_hocphan
                WHERE md5(d.id_sinhvien) = ? AND md5(d.id_lophocphan) = ? AND md5(d.id_hocphan) = ?");
            $stmt->bind_param("sss", $idsv, $idlhp, $idhp);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            return false;
        }
    }

    public function getnhapdiem($sql){
        // Lệnh này rất nguy hiểm, vì nhận truy vấn thô từ bên ngoài
        // Nếu vẫn phải giữ, hãy chắc chắn là truy vấn đã được kiểm tra hoặc hạn chế nguồn đầu vào
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con){
            $result = $con->query($sql);
            return $result;
        } else {
            return false;
        }
    }

    public function getALLHP(){
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con){
            $str = "SELECT 
                hp.id_hocphan,
                hp.mahocphan,
                hp.tenhocphan,
                chp.loaihp,
                chp.soTC,
                chp.TCLT,
                chp.TCTH,
                lh.tenlophocphan,
                ml.thuhocLT,
                ml.tietbatdauLT,
                ml.tietketthucLT,
                ml.phonghocLT,
                ml.thuhocTH,
                ml.tietbatdauTH,
                ml.tietketthucTH,
                ml.phonghocTH
                FROM hocphan hp
                LEFT JOIN ct_hocphan chp ON hp.id_hocphan = chp.id_hocphan
                LEFT JOIN monlop ml ON hp.id_hocphan = ml.id_hocphan
                LEFT JOIN lophocphan lh ON ml.id_lophocphan = lh.id_lophocphan";
            $tblSP = $con->query($str);
            return $tblSP;
        } else {
            return false;
        }
    }

    public function getALLCONGNO($idsv){
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con){
            $stmt = $con->prepare("SELECT *
                FROM sinhvien sv
                JOIN congno cn ON sv.id_sinhvien = cn.id_sinhvien
                WHERE md5(sv.masosinhvien) = ?");
            $stmt->bind_param("s", $idsv);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            return false;
        }
    }

    public function getALLHP_GV($idgv){
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con){
            $stmt = $con->prepare("SELECT * FROM giangvien gv
                JOIN giangday d ON gv.id_giangvien = d.id_giangvien
                JOIN monlop m ON m.id = d.id
                JOIN hocphan hp ON hp.id_hocphan = m.id_hocphan
                JOIN lophocphan l ON l.id_lophocphan = m.id_lophocphan
                JOIN ct_hocphan c ON c.id_hocphan = hp.id_hocphan
                WHERE md5(gv.magiangvien) = ?");
            $stmt->bind_param("s", $idgv);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            return false;
        }
    }

    public function getALLDSSV_HP($idhp, $idlhp){
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con){
            $stmt = $con->prepare("SELECT * FROM hocphan hp
                JOIN ct_hocphan c ON hp.id_hocphan = c.id_hocphan
                JOIN monlop m ON m.id_hocphan = hp.id_hocphan
                JOIN hoctap h ON h.id = m.id
                JOIN giangday d ON d.id = m.id
                JOIN sinhvien s ON s.id_sinhvien = h.id_sinhvien
                JOIN giangvien gv ON d.id_giangvien = gv.id_giangvien
                WHERE md5(m.id_hocphan) = ? AND md5(m.id_lophocphan) = ? AND gv.trangthai = '1'");
            $stmt->bind_param("ss", $idhp, $idlhp);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            return false;
        }
    }

    public function getALLDIEM_SV($idgv, $idhp, $idlhp){
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con){
            // idgv không được dùng trong điều kiện truy vấn, nếu cần thì thêm bind_param
            $stmt = $con->prepare("SELECT * FROM sinhvien sv JOIN diem d ON sv.id_sinhvien = d.id_sinhvien WHERE md5(d.id_hocphan) = ?");
            $stmt->bind_param("s", $idhp);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            return false;
        }
    }

    public function getnopbai($idhp){
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con){
            $stmt = $con->prepare("SELECT * FROM baitaplythuyet WHERE md5(id_hocphan) = ?");
            $stmt->bind_param("s", $idhp);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            return false;
        }
    }
}
?>
