<?php
include("ketnoi.php");
class xuly {
    public function checkDN($user, $password) {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $stmt = $con->prepare("SELECT * FROM user WHERE user_code = ? AND matkhau = ? AND vaitro = '2'");
            $stmt->bind_param("ss", $user, $password);
            $stmt->execute();
            return $stmt->get_result();
        } else {
            return false;
        }
    }
    public function checkID($user, $password) {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $stmt = $con->prepare("SELECT * FROM user WHERE user_code = ? AND matkhau = ? ");
            $stmt->bind_param("ss", $user, $password);
            $stmt->execute();
            return $stmt->get_result();
        } else {
            return false;
        }
    }
    public function checkGV($tukhoa) {
    $p = new ketnoi();
    $con = $p->moketnoi();
    if ($con) {
        
        $sql = "SELECT * FROM giangvien gv 
                JOIN chuyennganh cn ON gv.id_chuyennganh = cn.id_chuyennganh 
                WHERE gv.trangthai = 1 and gv.hotengiangvien LIKE ?";
        $stmt = $con->prepare($sql);
        $like = "%" . $tukhoa . "%";
        $stmt->bind_param("s", $like);
        $stmt->execute();
        return $stmt->get_result();
    } else {
        return false;
    }
}
public function checkSV1($user, $password) {
    $p = new ketnoi();
    $con = $p->moketnoi();
    if ($con) {
        $stmt = $con->prepare("SELECT * FROM sinhvien WHERE masosinhvien = ? AND matkhau = ?");
        $stmt->bind_param("ss", $user, $password);
        $stmt->execute();
        return $stmt->get_result();
    } else {
        return false;
    }
}


    
    public function sql($sql) {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $tblSP = $con ->query($sql);
            return $tblSP;
        } else {
            return false;
        }
    }

    public function getSESSION($id) {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $stmt = $con->prepare("SELECT * FROM user WHERE user_code = ?");
            $stmt->bind_param("s", $id);
            $stmt->execute();
            return $stmt->get_result();
        } else {
            return false;
        }
    }

    public function checkPASS($user) {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $stmt = $con->prepare("SELECT * FROM user WHERE user_code = ? AND vaitro = '2'");
            $stmt->bind_param("s", $user);
            $stmt->execute();
            return $stmt->get_result();
        } else {
            return false;
        }
    }

    public function getGV() {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $str = "SELECT * FROM giangvien gv JOIN chuyennganh cn ON gv.id_chuyennganh = cn.id_chuyennganh WHERE gv.trangthai = 1";
            return $con->query($str);
        } else {
            return false;
        }
    }
public function getCN() {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $str = "SELECT * FROM chuyennganh";
            return $con->query($str);
        } else {
            return false;
        }
    }
    public function getSV() {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $str = "SELECT * FROM sinhvien sv JOIN chuyennganh cn ON sv.id_chuyennganh = cn.id_chuyennganh WHERE sv.trangthai = 1";
            return $con->query($str);
        } else {
            return false;
        }
    }

    public function xoaGV($id) {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $stmt = $con->prepare("UPDATE giangvien SET trangthai = 0 WHERE md5(id_giangvien) = ?");
            $stmt->bind_param("s", $id);
            $stmt->execute();
            return $stmt;
        } else {
            return false;
        }
    }

    public function xoaSV($id) {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $stmt = $con->prepare("UPDATE sinhvien SET trangthai = 0 WHERE md5(id_sinhvien) = ?");
            $stmt->bind_param("s", $id);
            $stmt->execute();
            return $stmt;
        } else {
            return false;
        }
    }

    public function doiCN($id) {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $stmt = $con->prepare("UPDATE congno SET trangthai = 1 WHERE md5(id_sinhvien) = ?");
            $stmt->bind_param("s", $id);
            $stmt->execute();
            return $stmt;
        } else {
            return false;
        }
    }

    public function getTESTALL($id) {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $stmt = $con->prepare("
                SELECT * FROM monlop m 
                JOIN hocphan hp ON hp.id_hocphan = m.id_hocphan
                JOIN lophocphan l ON l.id_lophocphan = m.id_lophocphan
                JOIN giangday gd ON gd.id = m.id
                JOIN giangvien gv ON gv.id_giangvien = gd.id_giangvien
                WHERE md5(hp.id_hocphan) = ?");
            $stmt->bind_param("s", $id);
            $stmt->execute();
            return $stmt->get_result();
        } else {
            return false;
        }
    }

    public function getCHITIET($user_id) {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $stmt = $con->prepare("SELECT * FROM giangvien WHERE md5(id_giangvien) = ?");
            $stmt->bind_param("s", $user_id);
            $stmt->execute();
            return $stmt->get_result();
        } else {
            return false;
        }
    }

    public function getLHP() {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $str = "SELECT * FROM lophocphan";
            return $con->query($str);
        } else {
            return false;
        }
    }

    public function getCHITIETSV($user_id) {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $stmt = $con->prepare("
                SELECT * FROM user u
                JOIN sinhvien s ON u.user_id = s.user_id
                JOIN chuyennganh c ON s.id_chuyennganh = c.id_chuyennganh
                WHERE u.user_code = ?");
            $stmt->bind_param("s", $user_id);
            $stmt->execute();
            return $stmt->get_result();
        } else {
            return false;
        }
    }

    public function getHP($idsv) {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $stmt = $con->prepare("
                SELECT * FROM sinhvien sv 
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
            return $stmt->get_result();
        } else {
            return false;
        }
    }

    public function getDIEM($idsv, $idhp, $idlhp) {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $stmt = $con->prepare("
                SELECT * FROM diem d
                JOIN ct_hocphan c ON d.id_hocphan = c.id_hocphan
                WHERE md5(d.id_sinhvien) = ? AND md5(d.id_lophocphan) = ? AND md5(d.id_hocphan) = ?");
            $stmt->bind_param("sss", $idsv, $idlhp, $idhp);
            $stmt->execute();
            return $stmt->get_result();
        } else {
            return false;
        }
    }

    public function getALLHP() {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $str = "SELECT 
                hp.id_hocphan,
                hp.mahocphan,
                hp.tenhocphan,
                hp.trangthai,
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
                LEFT JOIN lophocphan lh ON ml.id_lophocphan = lh.id_lophocphan
                WHERE hp.trangthai = 1";
            return $con->query($str);
        } else {
            return false;
        }
    }

    public function getALLCONGNO($idsv) {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $stmt = $con->prepare("
                SELECT * FROM sinhvien sv
                JOIN congno cn ON sv.id_sinhvien = cn.id_sinhvien
                WHERE md5(sv.id_sinhvien) = ?");
            $stmt->bind_param("s", $idsv);
            $stmt->execute();
            return $stmt->get_result();
        } else {
            return false;
        }
    }
    public function getALLHP_GV($idgv) {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $stmt = $con->prepare("
                SELECT * FROM giangvien gv
                JOIN giangday d ON gv.id_giangvien = d.id_giangvien
                JOIN monlop m ON m.id = d.id
                JOIN hocphan hp ON hp.id_hocphan = m.id_hocphan
                JOIN lophocphan l ON l.id_lophocphan = m.id_lophocphan
                JOIN ct_hocphan c ON c.id_hocphan = hp.id_hocphan
                WHERE md5(gv.magiangvien) = ?");
            $stmt->bind_param("s", $idgv);
            $stmt->execute();
            return $stmt->get_result();
        } else {
            return false;
        }
    }

    public function getALLDSSV_HP($idhp, $idlhp) {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $stmt = $con->prepare("
                SELECT * FROM hocphan hp
                JOIN ct_hocphan c ON hp.id_hocphan = c.id_hocphan
                JOIN monlop m ON m.id_hocphan = hp.id_hocphan
                JOIN hoctap h ON h.id = m.id
                JOIN giangday d ON d.id = m.id
                JOIN sinhvien s ON s.id_sinhvien = h.id_sinhvien
                JOIN giangvien gv ON d.id_giangvien = gv.id_giangvien
                WHERE md5(m.id_hocphan) = ? AND md5(m.id_lophocphan) = ?");
            $stmt->bind_param("ss", $idhp, $idlhp);
            $stmt->execute();
            return $stmt->get_result();
        } else {
            return false;
        }
    }

    public function getALLDIEM_SV($idgv, $idhp, $idlhp) {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $stmt = $con->prepare("
                SELECT * FROM sinhvien sv
                JOIN diem d ON sv.id_sinhvien = d.id_sinhvien
                WHERE md5(d.id_hocphan) = ?");
            $stmt->bind_param("s", $idhp);
            $stmt->execute();
            return $stmt->get_result();
        } else {
            return false;
        }
    }
}
?>
