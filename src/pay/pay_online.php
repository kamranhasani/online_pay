<?php
namespace Kamranhasani\Settarehpay\pay;



abstract class pay_online{
    private $hostname="localhost";
    private $dbname="settareh_pay";
    private $username="root";
    private $password="";
    private $tablpay="pay";
    private $tabluser="user";
    public $connect;
    private $insertone;
    private $selectpay;
    private $fetchpay;
    private $show;

public function __construct()
{

        $this->connect= new \PDO ("mysql:host=$this->hostname;dbname=$this->dbname",$this->username,$this->password);
        $this->connect->exec("SET CHARACTER SET utf8");
        $this->connect->exec('set names utf8');


}

public function insert_pay($name,$user, $id_one,$info,$TReone,$price,$data,$number,$size,$color)
{
 
        $insert_pay=$this->connect->prepare("INSERT INTO  `$this->tablpay`  (`name`, `id_user`, `id_online`, `num_order`, `num_trac`, `price`, `data`, `number`, `size`, `color`) VALUES(?,?,?,?,?,?,?,?,?,?)");
       
        $insert_pay->bindvalue(1 ,$name);
        $insert_pay->bindvalue(2 ,$user);
        $insert_pay->bindvalue(3 , $id_one);
        $insert_pay->bindvalue(4 ,$info);
        $insert_pay->bindvalue(5 ,$TReone);
        $insert_pay->bindvalue(6 ,$price);
        $insert_pay->bindvalue(7 ,$data);
        $insert_pay->bindvalue(8 ,$number);
        $insert_pay->bindvalue(9 ,$size);
        $insert_pay->bindvalue(10 ,$color);
        
        $insert_pay->execute();

        if($insert_pay){

            return true;

        }else{

            return false;
        }
    


        }




public function show_pay()
{
    $this->selectpay=$this->connect->prepare("SELECT * FROM `$this->tablpay`");

    $this->selectpay->execute();

       if ($this->selectpay){

           return true;

     }else {

          return false;
  }

}

public function fetch_pay(){

if ($this->selectpay==true){

    $this->fetchpay = $this->selectpay->fetchAll(\PDO::FETCH_ASSOC);

         return $this->fetchpay;

 }else{
     
         return false;
}  

}

public function show_address($id)

{
    $this->show=$this->connect->prepare("SELECT * FROM `$this->tabluser` WHERE id=? ");

    $this->show->bindvalue(1,$id);

    $this->show->execute();

      if($this->show->rowcount()>=1){

        $show_two = $this->show->fetchAll();

             return  $show_two;

       }else {

            return false;
    }
}

public function delete_pay_all(){

    $delete=$this->connect->prepare("DELETE FROM `$this->tablpay` ");
   
    $delete->execute();

    if($delete){

        return  true;
    }

    else{

        return false;
    }
}

}
?>