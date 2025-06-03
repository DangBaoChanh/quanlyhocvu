<?php
include("ketnoi.php");

class xuly {
    public function checkDN($user, $password) {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $stmt = $con->prepare("SELECT * FROM user WHERE user_code = ? AND matkhau = ? AND vaitro = '0'");
            $stmt->bind_param("ss", $user, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            return false;
        }
    }

    public function getID($id){
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con){
            $stmt = $con->prepare("SELECT * FROM sinhvien WHERE md5(masosinhvien) = ?");
            $stmt->bind_param("s", $id);
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

    public function checkPASS($user){
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con){
            $stmt = $con->prepare("SELECT * FROM user WHERE user_code = ? AND vaitro = '0'");
            $stmt->bind_param("s", $user);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            return false;
        }
    }

    public function getBTSV($id, $idhp, $idbtlt){
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con){
            $stmt = $con->prepare("SELECT * FROM filenopbtlt f
                JOIN baitaplythuyet b ON f.id_btlt = b.id_btlt
                WHERE f.id_sinhvien = ? AND md5(b.id_hocphan) = ? AND f.id_btlt = ?");
            $stmt->bind_param("sis", $id, $idhp, $idbtlt);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            return false;
        }
    }

    public function getSV($user_id){
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con){
            $stmt = $con->prepare("
                SELECT *
                FROM user u
                JOIN sinhvien s ON u.user_id = s.user_id
                JOIN chuyennganh c ON s.id_chuyennganh = c.id_chuyennganh
                WHERE u.user_code = ?
            ");
            $stmt->bind_param("s", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            return false;
        }
    }

    public function updateDKHP($idsv, $idhp){
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con){
            $stmt = $con->prepare("INSERT INTO hoctap(id_sinhvien, id_giangvienTH, id) VALUES (?, '8', ?)");
            $stmt->bind_param("si", $idsv, $idhp);
            $result = $stmt->execute();
            return $result;
        } else {
            return false;
        }
    }
    public function getUPCONGNO($idsv, $idhp,$tenhocphan){
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con){
            $stmt = $con->query("INSERT INTO congno(id_sinhvien, mahocphan, tenhocphan,sotinchi,tongtien) VALUES ('$idsv','$idhp','$tenhocphan', '3','1,300,000 VNĐ' )");
            return $stmt;
        } else {
            return false;
        }
    }

    public function getHP($idsv){
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con){
            $stmt = $con->prepare("
                SELECT *
                FROM sinhvien sv
                JOIN hoctap h ON sv.id_sinhvien = h.id_sinhvien
                JOIN monlop m ON m.id = h.id
                JOIN hocphan hp ON hp.id_hocphan = m.id_hocphan
                JOIN lophocphan l ON l.id_lophocphan = m.id_lophocphan
                JOIN giangday gd ON gd.id = m.id
                JOIN giangvien gv ON gv.id_giangvien = gd.id_giangvien
                WHERE md5(sv.masosinhvien) = ?
            ");
            $stmt->bind_param("s", $idsv);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            return false;
        }
    }

    public function getHPCT($idsv){
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con){
            $stmt = $con->prepare("
                SELECT *
                FROM sinhvien sv
                JOIN hoctap h ON sv.id_sinhvien = h.id_sinhvien
                JOIN monlop m ON m.id = h.id
                JOIN hocphan hp ON hp.id_hocphan = m.id_hocphan
                JOIN lophocphan l ON l.id_lophocphan = m.id_lophocphan
                JOIN ct_hocphan c ON c.id_hocphan = hp.id_hocphan
                JOIN giangday gd ON gd.id = m.id
                JOIN giangvien gv ON gv.id_giangvien = gd.id_giangvien
                WHERE md5(mahocphan) = ?
            ");
            $stmt->bind_param("s", $idsv);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            return false;
        }
    }

    public function getDIEM($idsv, $idlhp){
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con){
            $stmt = $con->prepare("SELECT * FROM diem WHERE md5(id_sinhvien) = ? AND md5(id_hocphan) = ?");
            $stmt->bind_param("ss", $idsv, $idlhp);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            return false;
        }
    }

    public function getALLHP(){
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con){
            // Đây là truy vấn không có tham số, an toàn rồi
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
                ml.phonghocTH,
                ml.id
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
            $stmt = $con->prepare("
                SELECT *
                FROM sinhvien sv
                JOIN congno cn ON sv.id_sinhvien = cn.id_sinhvien
                WHERE md5(sv.masosinhvien) = ?
            ");
            $stmt->bind_param("s", $idsv);
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
