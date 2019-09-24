<?php
    // lop truu tuong Animal
    abstract class Animal
    {
        protected $name;

        function Setname($name){
            $this->name = $name;
        }

        function Layname(){
            return $this->name;
        }

        //khai báo 1 biến static toàn cục
        static $name2 = "animal";

        //Hàm static
        static function GetName(){
            echo Animal::$name2." Là 1 bài hát rất nổi tiếng của Maroon5";
        }
        
        // phuong thuc truu tuong voi khai báo với tu khoa abstract và không có thân hàm
        abstract function run();  
        abstract function ngu();
    }

    //Lop interface biểu hiện hành động
    interface Bay
    {
        public function Bay();
    }

    interface LeoCay
    {
        public function LeoCay();
    }

    //Trong interface có thể kế thừa 1 interface khác
    interface Boi extends LeoCay
    {
        public function Boi();
    }

    // lớp Dog kế thừa từ lớp trừu tượng Animal  
    class Dog extends Animal
    {
        public function run () //phương thức này được override lại và viết thân hàm cho nó
        {
            echo "Con ".$this->name." chạy bằng 4 chân"."<br/>";
        }

        public function ngu () //phương thức này được override lại và viết thân hàm cho nó
        {
            echo "Con ".$this->name." ngủ theo tư thế cuộn tròn "."<br/>";
        }
    }

    // lớp Person extends từ lớp trừu tượng Animal và  implements hàm interface Boi
    // Khi lớp person implements hàm interface Boi, mặc định lớp cũng implements hàm interface LeoCay
    class Person extends Animal implements Boi
    {
        //phương thức này được override lại và viết thân hàm cho nó
        public function run ()
        {
            echo "Con ".$this->name. " chạy bằng 2 chân";
        }

        public function ngu ()
        {
            echo "Con ".$this->name." ngủ mọi lúc "."<br/>";
        }

        public function Boi(){
            echo $this->name. " Chỉ cần luyện tập là biết bơi";
        }

        public function LeoCay(){
            echo $this->name. " Leo cây cũng được";
        }
    }

    // lớp Chim extends từ lớp trừu tượng Animal và implements hamf interface Bay
    class Chim extends Animal implements Bay
    {
         //phương thức này được override lại và viết thân hàm cho nó
        public function run ()
        {
            echo "Con ".$this->name. " chạy bằng 2 chân";
        }

        public function ngu ()
        {
            echo "Con ".$this->name." chả biết có ngủ ko";
        
        }

        public function Bay(){
            echo "Con ".$this->name. " Bay lượn rất giỏi";
        }
    }

    // lớp Chim extends từ lớp trừu tượng Animal và implements hamf interface LeoCay
    class Khi extends Animal implements LeoCay
    {
        public function run () //phương thức này được override lại và viết thân hàm cho nó
        {
            echo "Con ".$this->name. " chạy bằng 4 chi";
        }
        public function ngu () //phương thức này được override lại và viết thân hàm cho nó
        {
            echo "Con ".$this->name." ngủ trên cây";
        
        }
        public function LeoCay(){
            echo "Con ".$this->name. " Leo cây hơi bị giỏi";
        }
    }

//     $chim = new Chim();
//     $chim->setname("Chim đại bàng");
//     $chim->Bay();
//
//     $khi = new Khi();
//     $khi->setname("Khỉ đít đỏ");
//     $khi->LeoCay();

    //Trường hợp lỗi
//     $concho = new ConCho();
//     $concho->setname("Chó");
//     $concho->Bay();

//    $connguoi = new Person();
//    $connguoi->setname("con người");
//    $connguoi->Layname();
//    $connguoi->boi();
//    $connguoi->LeoCay();


    //Ví dụ gọi lại hàm static
    // Animal::GetName();
