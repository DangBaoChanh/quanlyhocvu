<?php
    class Ketnoi{
        public function moketnoi(){
            return mysqli_connect("localhost","user","123456","truonghoc_iuh");
        }
        public function readDB($sql){
            $conn = $this->moketnoi();
            if(mysqli_query($conn,$sql)){
                return 1;
            }else{
                return 0;
            }
        }

    }


?>