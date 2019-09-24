<?php
    require_once 'chitietmay.php';
    class KHO implements KTChuoiSo {
        private $MSKho;
        private $SL_May;
        private $may;
        private $DS_May = array();

        public function getMSKho(){
            return $this->MSKho;
        }


        public function KTChuoiSo($MSMay){
            if(is_numeric($MSMay)){
                return 1;
            }
            return 0;
        }

        public function NhapTTKho(){
            do{
                print "Nhap Ma So Kho\t";
                fscanf(STDIN,"%d",$MSKho);
            }while($this->KTChuoiSo($MSKho) == 0 );
            $this->MSKho = $MSKho;

            do{
                print "Nhap So Luong May\t";
                fscanf(STDIN,"%d",$SL_May);
            }while( $SL_May < 0 );
            $this->SL_May = $SL_May;

            for($i_bien = 1; $i_bien <= $this->SL_May; $i_bien++){
                $may = new MAY();
                $may->NhapMay();
                array_push($this->DS_May, $may);
            }
        }

        public function XuatTTKho(){
            echo "\nMa So Kho\t" . $this->getMSKho() . "\n";
            print_r($this->DS_May);
        }
    }

    $kho = new KHO();
    $kho->NhapTTKho();
    $kho->XuatTTKho();/home/user/PHP_OOP