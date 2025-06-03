<?php
    include('xuly.php');
    class controller{
        public function ThongtinGV($user_id){
            $p = new xuly();
            $tblSP = $p ->getCHITIET($user_id);
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows > 0){
                    return $tblSP;
                }else{
                    return 0;
                }
            }
        }
        public function ThongtinSV($user_id){
            $p = new xuly();
            $tblSP = $p ->getCHITIETSV($user_id);
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows > 0){
                    return $tblSP;
                }else{
                    return 0;
                }
            }
        }
        public function checkIDUSER($user_id,$password){
            $p = new xuly();
            $tblSP = $p ->checkID($user_id,$password);
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows > 0){
                    return $tblSP;
                }else{
                    return 0;
                }
            }
        }
        public function sql1($user_id){
            $p = new xuly();
            $tblSP = $p ->sql($user_id,);
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows > 0){
                    return $tblSP;
                }else{
                    return 0;
                }
            }
        }
        public function layCN(){
            $p = new xuly();
            $tblSP = $p ->getCN();
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows > 0){
                    return $tblSP;
                }else{
                    return 0;
                }
            }
        }
        
        public function timGiangVienTheoTen($user){
            $p = new xuly();
            $tblSP = $p ->checkGV($user);
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows > 0){
                    return $tblSP;
                }else{
                    return 0;
                }
            }
        }
        public function kiemtradangnhap($user,$password){
            $p = new xuly();
            $tblSP = $p ->checkDN($user,$password);
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows > 0){
                    return $tblSP;
                }else{
                    return 0;
                }
            }
        }
        public function xoagiangvien($id){
            $p = new xuly();
            $tblSP = $p ->xoaGV($id);
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows > 0){
                    return $tblSP;
                }else{
                    return 0;
                }
            }
        }
        public function testALLTHONGTIN($id){
            $p = new xuly();
            $tblSP = $p ->getTESTALL($id);
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows > 0){
                    return $tblSP;
                }else{
                    return 0;
                }
            }
        }
        public function danhsachLHP(){
            $p = new xuly();
            $tblSP = $p ->getLHP();
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows > 0){
                    return $tblSP;
                }else{
                    return 0;
                }
            }
        }
        public function xoasinhvien($id){
            $p = new xuly();
            $tblSP = $p ->xoaSV($id);
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows > 0){
                    return $tblSP;
                }else{
                    return 0;
                }
            }
        }
        public function doicongno($id){
            $p = new xuly();
            $tblSP = $p ->doiCN($id);
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows > 0){
                    return $tblSP;
                }else{
                    return 0;
                }
            }
        }
        public function danhsachGV(){
            $p = new xuly();
            $tblSP = $p ->getGV();
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows > 0){
                    return $tblSP;
                }else{
                    return 0;
                }
            }
        }
        public function danhsachSV(){
            $p = new xuly();
            $tblSP = $p ->getSV();
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows > 0){
                    return $tblSP;
                }else{
                    return 0;
                }
            }
        }
        public function checkSV($user,$password){
            $p = new xuly();
            $tblSP = $p ->checkSV1($user,$password);
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows > 0){
                    return $tblSP;
                }else{
                    return 0;
                }
            }
        }
        public function danhsachDIEM($idsv,$idhp,$idlhp){
            $p = new xuly();
            $tblSP = $p ->getDIEM($idsv,$idhp,$idlhp);
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows > 0){
                    return $tblSP;
                }else{
                    return 0;
                }
            }
        }
        public function danhsachALLHP(){
            $p = new xuly();
            $tblSP = $p ->getALLHP();
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows > 0){
                    return $tblSP;
                }else{
                    return 0;
                }
            }
        }
        public function danhsachALLCONGNO($idsv){
            $p = new xuly();
            $tblSP = $p ->getALLCONGNO($idsv);
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows > 0){
                    return $tblSP;
                }else{
                    return 0;
                }
            }
        }
        public function danhsachALLHP_GV($idgv){
            $p = new xuly();
            $tblSP = $p ->getALLHP_GV($idgv);
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows > 0){
                    return $tblSP;
                }else{
                    return 0;
                }
            }
        }
        public function laySESSION($id){
            $p = new xuly();
            $tblSP = $p ->getSESSION($id);
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows > 0){
                    return $tblSP;
                }else{
                    return 0;
                }
            }
        }
        public function laypass($user){
            $p = new xuly();
            $tblSP = $p ->checkPASS($user);
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows > 0){
                    return $tblSP;
                }else{
                    return 0;
                }
            }
        }
        public function danhsachALLSV_HP($idhp,$idlhp){
            $p = new xuly();
            $tblSP = $p ->getALLDSSV_HP($idhp,$idlhp);
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows > 0){
                    return $tblSP;
                }else{
                    return 0;
                }
            }
        }
        public function danhsachALLDIEM_SV($idgv,$idhp,$idlhp){
            $p = new xuly();
            $tblSP = $p ->getALLDIEM_SV($idgv,$idhp,$idlhp);
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows > 0){
                    return $tblSP;
                }else{
                    return 0;
                }
            }
        }
        
    }
?>
