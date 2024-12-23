<?php

namespace   Kamranhasani\Settarehpay\settareh;



class implement_online  implements  interface_settareh
{
    private $hostname="localhost";
    private $dbname="settareh_pay";
    private $username="root";
    private $password="";
    public $connect;
    private $tablename="online_pay";
    private $tabluser="user";
    private $tablebasket="basket";
    
    private $selectzero;
    private $selectone;
    private $selecttwo;
    private $rowzero;
    private $rows;
    private $rowstwo;
    private $countrows;
    private $selectuser;

    
    public function DB()
    {

        try{
           $this->connect= new \PDO ("mysql:host=$this->hostname;dbname=$this->dbname",$this->username,$this->password);
           $this->connect->exec("SET CHARACTER SET utf8");
           $this->connect->exec('set names utf8');
  
            session_start();

         

       }catch(\PDOException $error){

            return 'error';
                
            }

    }

    public function insertzero_pay($name,$size,$color,$price,$number,$info,$id_online)
    {


        $zero=$this->connect->prepare("INSERT INTO  `$this->tablebasket` (`name`, `size`, `color`, `price`, `number`, `info`,`id_online`)VALUES(?,?,?,?,?,?,?)");
        $zero->bindvalue(1 ,$name);
        $zero->bindvalue(2 ,$size);
        $zero->bindvalue(3 ,$color);
        $zero->bindvalue(4 ,$price);
        $zero->bindvalue(5 ,$number);
        $zero->bindvalue(6 ,$info);
        $zero->bindvalue(7 ,$id_online);
        $zero->execute();

        if($zero){

            return true;

        }else{

            return false;
        }
        }   
        
        public function searchzero($id)
        {

            $search=$this->connect->prepare("SELECT * FROM `$this->tablebasket` WHERE id_online=?");
            $search->bindvalue(1,$id);
            $search->execute();
            if($search->rowcount()>=1){

                return $search;
            }

            return false;
        }

        public function updatezwer($name,$size,$color,$price,$number,$info,$id_online)
        {
            $update=$this->connect->prepare("UPDATE  `$this->tablebasket`  SET   `name`=? , `size`=? , `color`=? , `price`=? , `number`=? , `info`=?  WHERE id_online=?  LIMIT 1 ");
           
            $update->bindvalue(1 ,$name);
            $update->bindvalue(2 ,$size);
            $update->bindvalue(3 ,$color);
            $update->bindvalue(4 ,$price);
            $update->bindvalue(5 ,$number);
            $update->bindvalue(6 ,$info);
            $update->bindvalue(7 ,$id_online);
            $update->execute();
    
            if($update){
    
                return true;
    
            }else{
    
                return false;
            }
            } 
        
        public function selectzero(){

            $this->selectzero=$this->connect->prepare("SELECT * FROM `$this->tablebasket`");
    
              $this->selectzero->execute();
    
                 if ($this->selectzero){
    
                     return true;
    
               }else {
    
                    return false;
            }

        }

    public function fetchzero()
    {

        if ($this->selectzero==true){

            $this->rowzero = $this->selectzero->fetchAll(\PDO::FETCH_ASSOC);
     
                 return $this->rowzero;
     
         }else{
             
                 return false;
     }  
     
      }


    public function selectone_pay()
    {

        $this->selectone=$this->connect->prepare("SELECT * FROM `$this->tablename`");

          $this->selectone->execute();

             if ($this->selectone){

                 return true;

           }else {

                return false;
        }

    }

    public function fetch_pay()
    {

        if ($this->selectone==true){

          $this->rows = $this->selectone->fetchAll(\PDO::FETCH_ASSOC);
   
               return $this->rows;
   
       }else{
           
               return false;
   }  
   
    }

    
    public function countrow()
    {
        $this->countrows=$this->connect->prepare("SELECT * FROM `$this->tablebasket`");

        $this->countrows->execute();

           if ($d=$this->countrows->rowCount()){

               return $d;

         }else {

              return false;
      }
    
    }


    public function selecttwo_pay ($name)
    {
        $this->selecttwo=$this->connect->prepare("SELECT * FROM `$this->tablename` WHERE name=? ");

        $this->selecttwo->bindvalue(1,$name);

        $this->selecttwo->execute();

          if($this->selecttwo->rowcount()>=1){

                 return $this->selecttwo;

           }else {

                return false;
        }
       

    }
    

     public function fetchtwo_pay(){

        if ($this->selecttwo==true){

            $this->rowstwo = $this->selecttwo->fetchAll();
     
                 return  $this->rowstwo;
     
         }else{
             
                 return false;
     }  
     }
     

     public function insertuser($name,$family,$email,$address,$phone,$zipcode,$date)
    {
        $_SESSION['code']=$zipcode;

        $user=$this->connect->prepare("INSERT INTO `$this->tabluser` (`name`, `family`, `email`, `address`, `phone`, `zipcode`, `date`)VALUES(?,?,?,?,?,?,?)");
        $user->bindvalue(1 ,$name);
        $user->bindvalue(2 ,$family);
        $user->bindvalue(3 ,$email);
        $user->bindvalue(4 ,$address);
        $user->bindvalue(5 ,$phone);
        $user->bindvalue(6 ,$zipcode);
        $user->bindvalue(7 ,$date);
        $user->execute();

        if($user){

            return true;

        }else{

            return false;
        }

    }


    public function show_user($code)
    {

        $this->selectuser=$this->connect->prepare("SELECT * FROM `$this->tabluser` WHERE zipcode=? ");

        $this->selectuser->bindvalue(1,$code);

        $this->selectuser->execute();

          if($this->selectuser->rowcount()>=1){

            $showtwo = $this->selectuser->fetchAll();

                 return  $showtwo;

           }else {

                return false;
        }

    }


    public function deleteall(){

        $delete=$this->connect->prepare("DELETE FROM `$this->tablebasket` ");
       
        $delete->execute();

        if(  $delete){

            return  true;
        }

        else{

            return false;
        }

    }


    public function delete_one($id){

        $delone=$this->connect->prepare("DELETE FROM `$this->tablebasket` WHERE id =? ");
        $delone->bindvalue(1,$id);
       
        $delone->execute();

        if(  $delone){

            return  true;
        }

        else{

            return false;
        }

    }

}