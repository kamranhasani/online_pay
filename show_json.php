<?php 

header('Content-Type: application/json;charset=utf-8');

require "vendor/autoload.php";
use Kamranhasani\Settarehpay\settareh\implement_online;
use Kamranhasani\Settarehpay\help\implement_help;
use Kamranhasani\Settarehpay\pay\pay_one;

$one=new implement_online();
$two=new implement_help();
$three=new pay_one();

    $three->show_pay();
    $showpay=$three->fetch_pay();

    foreach($showpay as $rows){

    $response['product_pay']=array(
     'name'=>$rows['name'],
     'size'=>$rows['size'],
     'color'=>$rows['color'],
     'num_order'=>$rows['num_order'],
     'data'=>$rows['data'],
     'price'=>$rows['price'],
    );

    }

    $all_price=40000;
    foreach($showpay as $rows){
        
        $all_price+=$rows['price'];
     
    }

    $id=$rows['id_user'];
    $show=$three->show_address( $id);

    foreach($show as $row_show){

    $user['address_user']=array(
        'name'=>$row_show['name'],
        'family'=>$row_show['family'],
        'phone'=>$row_show['phone'],
        'address'=>$row_show['address'],
        'zipcode'=>$row_show['zipcode'],
        'email'=>$row_show['email'],
        'send_price'=>'40000',   
        'all_price'=>$all_price,
        'buy'=>'online',
       );
    }
    
   echo json_encode( $response['product_pay']);
   echo json_encode(  $user['address_user']);

?>