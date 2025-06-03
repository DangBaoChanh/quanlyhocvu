<?php
    include('xuly.php');
    class controller{
        public function ThongtinGV($user_id){
            $p = new xuly();
            $tblSP = $p ->getGV($user_id);
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
        public function nhapdiem($sql){
            $p = new xuly();
            $tblSP = $p ->getnhapdiem($sql);
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
