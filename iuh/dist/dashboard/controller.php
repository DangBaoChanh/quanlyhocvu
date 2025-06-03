<?php
    include('xuly.php');
    class controller{
        public function ThongtinUSER($user_id){
            $p = new xuly();
            $tblSP = $p ->getSV($user_id);
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
        public function capnhatcongno($idsv,$mahocphan,$tenhp){
            $p = new xuly();
            $tblSP = $p ->getUPCONGNO($idsv,$mahocphan,$tenhp);
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
         public function layID($id){
            $p = new xuly();
            $tblSP = $p ->getID($id);
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
        public function baitap_SV($id,$idhp,$idbtlt){
            $p = new xuly();
            $tblSP = $p ->getBTSV($id,$idhp,$idbtlt);
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
        public function capnhatDKHP($idsv,$idhp){
            $p = new xuly();
            $tblSP = $p ->updateDKHP($idsv,$idhp);
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
        public function danhsachHP($idsv){
            $p = new xuly();
            $tblSP = $p ->getHP($idsv);
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
        public function danhsachHPCT($idsv){
            $p = new xuly();
            $tblSP = $p ->getHPCT($idsv);
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
        public function danhsachDIEM($idsv,$idlhp){
            $p = new xuly();
            $tblSP = $p ->getDIEM($idsv,$idlhp);
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
        public function nopbaitap($idhp){
            $p = new xuly();
            $tblSP = $p ->getnopbai($idhp);
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
        
    }
?>
