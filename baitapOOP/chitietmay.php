<?php

    abstract class CHITIETMAY{
        protected $_maso;

        function KT($_MS){
            if(!empty($_MS) && is_numeric($_MS) && $_MS > 0 ){
                return 1;
            }
            return 0;
        }

        function Nhap(){
            //-------------------------old code-----------------------
//            print "Nhap ma so:";
//            fscanf(STDIN,"%d",$_maso);
//            if($this->KT($_maso) == 1){
//                $this->_maso = $_maso;
//            }else{
//                echo "Vui long nhap so duong \n";
//                $this->Nhap();
//            }

            do{
                print "Nhap ma so:";
                fscanf(STDIN,"%d",$_number);
            }while($this->KT($_number) != 1);
            $this->_maso = $_number;
        }

        function Xuat(){
            printf("Ma so vua nhap vao %d\n", $this->_maso);
        }

        abstract function TinhTien();
        abstract function TinhKL();
    }

    interface KT_GIA_KL{
        function KT_Gia($GIA);
        function KT_KL($KL);
    }

    class CHITIETDON extends CHITIETMAY implements KT_GIA_KL {
        protected $_Gia;
        protected $_KL;

        public function KT_Gia($GIA)
        {
            if(!empty($GIA) && $GIA >= 5000){
                return 1;
            }
            return 0;
        }

        public function KT_KL($KL)
        {
            if(!empty($KL) && $KL > 500){
                return 1;
            }
            return 0;
        }

        public function Nhap()
        {
            parent::Nhap();
            //-------------------------old code-----------------------
//            print "Nhap Gia Tien (Gia >=5000):";
//            fscanf(STDIN,"%d",$_Gia);
//            print "Nhap KL (KL >500g):";
//            fscanf(STDIN,"%d",$_KL);

//            if($this->KT_Gia($_Gia) == 1 && $this->KT_KL($_KL) == 1) {
//                $this->_Gia = $_Gia;
//                $this->_KL = $_KL;
//            }else {
//                echo "Vui long nhap gia tien >= 5000 hoac nhap KL > 500 \n";
//                $this->Nhap();
//            }

            do{
                print "Nhap Gia Tien (Gia >= 5000):";
                fscanf(STDIN,"%d",$_GIA);
                print "Nhap KL (KL > 500g):";
                fscanf(STDIN,"%d",$_KhoiLuong);
            }while($this->KT_Gia($_GIA) != 1 || $this->KT_KL($_KhoiLuong) != 1);
            $this->_Gia = $_GIA;
            $this->_KL = $_KhoiLuong;
        }

        public function Xuat()
        {
            parent::Xuat();
//            if($this->_Gia >= 5000 && $this->_KL > 500){
//                printf("Gia tien vua nhap vao %d \n", $this->_Gia);
//                printf("Khoi luong vua nhap vao %d \n", $this->_KL);
//            }
            printf("Gia tien vua nhap vao %d \n", $this->_Gia);
            printf("Khoi luong vua nhap vao %d \n", $this->_KL);
        }

        public function TinhTien()
        {
            return $this->_Gia;
        }

        public function TinhKL()
        {
            return $this->_KL;
        }
    }

    class CHITIETPHUC extends CHITIETMAY{
        protected $DS_ChiTiet = array();
        protected $DS_AllGia = array();
        protected $DS_AllKL = array();
        protected $SL_ChiTietCon;
        protected $Loai;
        public function Nhap()
        {
            print "Nhap So luong Chi Tiet Con:";
            fscanf(STDIN,"%d",$SL_ChiTietCon);
            if($SL_ChiTietCon > 0) {
                $item = NULL;
                for($i = 1; $i <= $SL_ChiTietCon; $i++){
                    print "Nhap Loai Chi Tiet (1-Chi tiet don / 2-Chi tiet phuc):";
                    fscanf(STDIN,"%d",$Loai);
                    if($Loai > 0 && $Loai <= 2){
                        if($Loai == 1){
                            $item = new CHITIETDON();
                        }else if($Loai == 2){
                            $item = new CHITIETPHUC();
                        }
                        $item->Nhap();
                        array_push($this->DS_ChiTiet,$item);
                        array_push($this->DS_AllGia,$item->TinhTien());
                        array_push($this->DS_AllKL,$item->TinhKL());
                    }else {
                        echo "Nhap lai sai rui";
                        $this->Nhap();
                    }
                }
            }else {
                echo "Vui long nhap So luong > 0 \n";
                $this->Nhap();
            }
        }

        public function Xuat()
        {
            parent::Xuat();
            print_r($this->DS_ChiTiet);
            echo "\nTong tien cua chi tiet may\t". $this->TinhTien();
            echo "\nTong khoi luong cua chi tiet may\t". $this->TinhKL();
        }

        public function TinhTien()
        {
            return array_sum($this->DS_AllGia);
        }

        public function TinhKL()
        {
            return array_sum($this->DS_AllKL);
        }
    }

    interface KTChuoiSo{
        public function KTChuoiSo($a);
    };

    class MAY extends CHITIETPHUC implements KTChuoiSo {
        protected $MaSoMay;

        public function KTChuoiSo($MSMay){
            if(is_numeric($MSMay)){
                return 1;
            }
            return 0;
        }

        public function NhapMay()
        {
            do{
                print "Nhap Ma So May\t";
                fscanf(STDIN,"%d",$MSMAY);
            }while($this->KTChuoiSo($MSMAY) == 0 );
            $this->MaSoMay = $MSMAY;
            parent::Nhap();
        }

        public function Xuat()
        {
            echo "\nMa so may\t\n". $this->MaSoMay;
            parent::Xuat(); // TODO: Change the autogenerated stub
        }
    }

//    $may = new MAY();
//    $may->NhapMay();
//    $may->Xuat();

