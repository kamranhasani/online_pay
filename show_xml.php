<?php 

require "vendor/autoload.php";
use Kamranhasani\Settarehpay\settareh\implement_online;
use Kamranhasani\Settarehpay\help\implement_help;
use Kamranhasani\Settarehpay\pay\pay_one;

$one=new implement_online();
$two=new implement_help();
$three=new pay_one();

$three->show_pay();
$showpay=$three->fetch_pay();


    $all_price=40000;
    foreach($showpay as $rows){
        
        $all_price+=$rows['price'];
     
    }

    $id=$rows['id_user'];
    $show=$three->show_address( $id);


   function x_m_l($showpay, $show,$all_price)  {

	$dom=new DOMDocument('1.0');

	$pay_product=$dom->appendChild($dom->createElement('SETTAREH'));
    
    foreach($showpay as $rows){
    $pay_product=$pay_product->appendChild($dom->createElement('show_product'));

    $name=$pay_product->appendChild($dom->createElement('name'));
    $name->appendChild($dom->createTextNode($rows['name']));

    $size=$pay_product->appendChild($dom->createElement('size'));
    $size->appendChild($dom->createTextNode($rows['size']));

    $color=$pay_product->appendChild($dom->createElement('color'));
    $color->appendChild($dom->createTextNode($rows['color']));

    $num_order=$pay_product->appendChild($dom->createElement('num_order'));
    $num_order->appendChild($dom->createTextNode($rows['num_order']));

    $num_trac=$pay_product->appendChild($dom->createElement('num_trac'));
    $num_trac->appendChild($dom->createTextNode($rows['num_trac']));

    $data=$pay_product->appendChild($dom->createElement('data'));
    $data->appendChild($dom->createTextNode($rows['data']));
  
    $price=$pay_product->appendChild($dom->createElement('price'));
    $price->appendChild($dom->createTextNode($rows['price']));

    }

 
    foreach($show as $row_show){
        $pay_product=$pay_product->appendChild($dom->createElement('user_info'));   

        $name=$pay_product->appendChild($dom->createElement('name'));
        $name->appendChild($dom->createTextNode($row_show['name']));
    
        $family=$pay_product->appendChild($dom->createElement('family'));
        $family->appendChild($dom->createTextNode($row_show['family']));
    
        $phone=$pay_product->appendChild($dom->createElement('phone'));
        $phone->appendChild($dom->createTextNode($row_show['phone']));
    
        $address=$pay_product->appendChild($dom->createElement('address'));
        $address->appendChild($dom->createTextNode($row_show['address']));
    
        $zipcode=$pay_product->appendChild($dom->createElement('zipcode'));
        $zipcode->appendChild($dom->createTextNode($row_show['zipcode']));
      
        $email=$pay_product->appendChild($dom->createElement('email'));
        $email->appendChild($dom->createTextNode($row_show['email']));

        $all_pricee=$pay_product->appendChild($dom->createElement('all_pricee'));
        $all_pricee->appendChild($dom->createTextNode($all_price));

        $send_price=$pay_product->appendChild($dom->createElement('post_price'));
        $send_price->appendChild($dom->createTextNode('40000'));

        $type_buy=$pay_product->appendChild($dom->createElement('type_buy'));
        $type_buy->appendChild($dom->createTextNode('online'));

}

	$dom->formatOutput=true;
 
	$domstring=$dom->saveXML();
 
	$dom->save('show_xml.xml');

    return true;

}


if(isset($_GET['xml']) && intval($_GET['xml'])){

 $xml=x_m_l($showpay, $show,$all_price);

if($xml){

    header('location:show_xml.xml');
}else{

    header('location:show_pay.php');
}
}
?>


