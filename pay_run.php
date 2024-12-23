<?php 
// page pay_run.php is only for abstract class
require "vendor/autoload.php";

use   Kamranhasani\Settarehpay\settareh\implement_online;
use   Kamranhasani\Settarehpay\help\implement_help;
use   Kamranhasani\Settarehpay\pay\pay_one;


$one=new implement_online();
$two=new implement_help();
$three=new pay_one();

$one->DB();


//start and check-page Spay.php 
// use abstract class
  
if (isset($_POST['paybuy']) && ($_POST['tokenfour'])){

    $card=intval($two->clear($_POST['card-number']));
    $CVV=intval($two->clear($_POST['CVV']));
    $month=intval($two->clear($_POST['month']));
    $year=intval($two->clear($_POST['year']));
    $Password=intval($two->clear($_POST['Password']));
    $email=$two->clear($_POST['email']);
   
    if (!empty($card)&& !empty($CVV)&& !empty($month) && !empty($year) && !empty($Password) && !empty($_POST['tokenfour']) && $two->checkfour($_POST['tokenfour'])==true) 
{

    $all= $three->delete_pay_all();
}

if($all){

    $dateone=date("Y/m/d");
    $TReone=mt_rand(111111,999999);

    $code=$_SESSION['code'];
    $iduser=$one->show_user($code);

    foreach($iduser as $rows){

        $user=$rows['id'];
        
    }
    

    $one->selectzero();
    $showzero=$one->fetchzero();

    foreach($showzero as $row){

        $id_online=$row['id_online'];
        $info_one=$row['info'];
        $name_one=$row['name']; 
        $size_one=$row['size'];
        $color_one=$row['color'];
        $number_one=$row['number'];
        $price_one=$row['price'];

        $pays=$three->insert_pay($name_one,$user,$id_online,$info_one,$TReone,$price_one,$dateone,$number_one,$size_one,$color_one);

        $delete_all=$one->deleteall();
     
        
    } 
   
     if ($pays && $delete_all) {

        unset($_SESSION['product']); 
        unset($_SESSION['displayone']); 
        unset($_SESSION['code']);
        unset($_SESSION['spaytoken']);
        unset($_SESSION['allprice']);
        
        unset($_SESSION['tokenone']); 
        unset($_SESSION['tokentwo']); 
        unset($_SESSION['tokenthree']); 
        unset($_SESSION['tokenfour']);  

     
      

    header('location:show_pay.php');

}
}else{

    header('location:productinvoice.php');
}


}else{



if (isset($_POST['CAone']) && ($_POST['tokenfour'])){

    if (!empty($_POST['tokenfour']) && $two->checkfour($_POST['tokenfour'])==true)

    {
        //unset($_SESSION['product']); 
        unset($_SESSION['displayone']); 
        unset($_SESSION['code']);
        unset($_SESSION['spaytoken']);
        unset($_SESSION['allprice']);
        
        unset($_SESSION['tokenone']); 
        unset($_SESSION['tokentwo']); 
        unset($_SESSION['tokenthree']); 
        unset($_SESSION['tokenfour']);  

    header('location:productlist.php');


}else{


    header('location:Spay.php');

}
}
}
//-----end-page Spay.php


//---submit-cancel   of class implement_online  for page productlist.php


//----end------ 







//---submit-json   for page show_json.php
if(isset($_GET['json']) && intval($_GET['json'])){


     header('location:show_json.php');
 
    }
    else{
 
     header('location:show_pay.php');
    }
     
//-----end----


?>