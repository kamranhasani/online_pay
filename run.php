
<?php
// page run.php is only for interface class

require "vendor/autoload.php";

use   Kamranhasani\Settarehpay\settareh\implement_online;
use   Kamranhasani\Settarehpay\help\implement_help;


$one=new implement_online();
$two=new implement_help();



 $one->DB();

/////////////////////////////////////////////////////////////////////

//---get of class implement_online and implement_help for page productdisplay.php

if(isset($_GET['sportswear'] ) && !empty($_GET['sportswear'])){


$name=$_GET['sportswear'];
 
$clear=$two->clear($name);

$one->selecttwo_pay(  $clear );
    
$showdisplay=$one->fetchtwo_pay();

$_SESSION['displayone']=$showdisplay;


header('location:productdisplay.php');


}else{

    header('location:productlist.php');
 
}

//----end------  

///////////////////////////////////////////////////////////////////////////

//---submit-insert data  of class implement_online and implement_help for page productdisplay.php

if (isset($_POST['btnone'])  && ($_POST['token'])){

       if (!empty($_POST['id_display']) && !empty($_POST['name']) && !empty($_POST['color']) && !empty($_POST['product-size']) && !empty($_POST['number']) && !empty($_POST['price']) && !empty($_POST['token']) && $two->checkone($_POST['token'])==true)
        {

    
        $name=$two->clear($_POST['name']);
        $size=$two->clear($_POST['product-size']);
        $color=$two->clear($_POST['color']);
        $number=$two->clear($_POST['number']);
        $price=$two->clear($_POST['price']);
        $info=mt_rand(111111,999999);
        $id_online=$two->clear($_POST['id_display']);
        
      
        $searchzero=$one->searchzero($id_online);

        if($searchzero){

            $updatezwer=$one->updatezwer($name,$size,$color,$price,$number,$info,$id_online);

            $_SESSION['product']=intval($id_online);

            header('location:productinvoice.php');
        }

        else{


        $insertzero=$one->insertzero_pay($name,$size,$color,$price,$number,$info,$id_online);
    }
        if($insertzero){
       
            $_SESSION['product']=intval($id_online);

          header('location:productinvoice.php');
      }

   
    }else{
        
        header('location:productlist.php');
    }
}
        
//----end------  

//////////////////////////////////////////////////////////////////////

//---submit-update data  of class implement_online and implement_help for page productdisplay.php

if ( isset($_POST['btntwo']) && ($_POST['token'])){

    if (!empty($_POST['id_display']) && !empty($_POST['name']) && !empty($_POST['color']) && !empty($_POST['product-size']) && !empty($_POST['number']) && !empty($_POST['price']) && !empty($_POST['token']) && $two->checkone($_POST['token'])==true)
     {

 
     $name=$two->clear($_POST['name']);
     $size=$two->clear($_POST['product-size']);
     $color=$two->clear($_POST['color']);
     $number=$two->clear($_POST['number']);
     $price=$two->clear($_POST['price']);
     $info=mt_rand(111111,999999);
     $id_online=$two->clear($_POST['id_display']);
     
   
     $search=$one->searchzero($id_online);

     if($search){


         $update=$one->updatezwer($name,$size,$color,$price,$number,$info,$id_online);
        
         $_SESSION['product']=intval($id_online);
    

         header('location:productlist.php');
     }

     else{


     $insert=$one->insertzero_pay($name,$size,$color,$price,$number,$info,$id_online);
 }
     if($insert){
      
        $_SESSION['product']=intval($id_online);

        header('location:productlist.php');
   }


 }else{
     
     header('location:productdisplay.php');
 }
}

//----end------  

///////////////////////////////////////////////////////////////////////////////

//---submit - page productdisplay.php -----

if (isset($_POST['btnthree'])  && ($_POST['token'])){

    if (!empty($_POST['token']) && $two->checkone($_POST['token'])==true)
     {
        $deleteall=$one->deleteall();

        if($deleteall){

            unset($_SESSION['product']); 
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
    header('location:productdisplay.php');
}
     }
}

//----end------  

///////////////////////////////////////////////////////////////////////

//---submit - page productinvoice.php -----

if ( isset($_POST['btnfour']) && ($_POST['tokenthree'])){

    if ( !empty($_POST['tokenthree']) && $two->checkthree($_POST['tokenthree'])==true)

    {

        header('location:productlist.php');

}else{
    header('location:productinvoice.php');
}

}
//----end------  
/////////////////////////////////////////////////////////////////////

//---submit - page productinvoice.php -----

if (isset($_POST['btnfive'])  && ($_POST['tokenthree'])){

    if (  !empty($_POST['tokenthree']) && $two->checkthree($_POST['tokenthree'])==true)
     {
        $delete=$one->deleteall();

        if($delete){

            unset($_SESSION['product']); 
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
    header('location:productinvoice.php');
}
     }
}

//----end------  

///////////////////////////////////////////////////////////////////////

//---submit-insert address  of class implement_online and implement_help for page productinvoice.php

if (isset($_POST['btnsix']) && ($_POST['tokentwo'])){

    if (!empty($_POST['fname'])&& !empty($_POST['family'])&& !empty($_POST['email']) && !empty($_POST['address']) && !empty($_POST['phone']) && !empty($_POST['code'])&& !empty($_POST['tokentwo']) && $two->checktwo($_POST['tokentwo'])==true) 
{
    $name=$two->clear($_POST['fname']);
    $family=$two->clear($_POST['family']);
    $email=$two->clear($_POST['email']);
    $address=$two->clear($_POST['address']);
    $phone=$two->clear($_POST['phone']);
    $zipcode=$two->clear($_POST['code']);
    $date=date("Y/m/d");

    
    
  $insert=$one->insertuser($name,$family,$email,$address,$phone,$zipcode,$date);
    
  if($insert){
   
        $_SESSION['spaytoken']=$two->set_token();

        header('location:Spay.php');


    }
    
}else{

    $_SESSION['message']='fill form';

 header('location:productinvoice.php');
}

}

//----end------  

///////////////////////////////////////////////////////////////////////////////

//---submit cancel address- page productinvoice.php -----

if (isset($_POST['btnseven']) && ($_POST['tokentwo'])){

    if (!empty($_POST['tokentwo']) && $two->checktwo($_POST['tokentwo'])==true)

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
    header('location:productinvoice.php');
}

}
//----end------ 

///////////////////////////////////////////////////////////////////////////////

//---link delete data  of class implement_online and implement_help for page productinvoice.php

if(isset($_GET['delleswear'])){

    $id=$_GET['delleswear'];

    $id_one=$two->clear($id);

   $delete=$one->delete_one(   $id_one );

   if($delete)
   {
   
    header('location:productinvoice.php');

   }
   else{
  
    header('location:productlist.php');
   }
    

}

//----end------  
///////////////////////////////////////////////////////////////////

//---submit-cancel   of class implement_online  for page productlist.php
if(isset($_GET['cancel']) && intval($_GET['cancel'])){


    $cancelall=$one->deleteall();
 
    if($cancelall)
    {
    
     unset($_SESSION['product']); 
     unset($_SESSION['displayone']); 
     unset($_SESSION['code']);
     unset($_SESSION['spaytoken']);
     unset($_SESSION['allprice']);
     
     unset($_SESSION['tokenone']); 
     unset($_SESSION['tokentwo']); 
     unset($_SESSION['tokenthree']); 
     unset($_SESSION['tokenfour']); 


     header('location:productlist.php');
 
    }
    else{
 
     header('location:productinvoice.php');
    }
     
 
 }
//----end------  


?>
