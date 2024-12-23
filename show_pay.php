<?php 
//---get of class implement_online and pay_one
require "vendor/autoload.php";
use   Kamranhasani\Settarehpay\settareh\implement_online;
use   Kamranhasani\Settarehpay\help\implement_help;
use   Kamranhasani\Settarehpay\pay\pay_one;


$one=new implement_online();
$two=new implement_help();
$three=new pay_one();

    $three->show_pay();
    $showpay=$three->fetch_pay();

    if($showpay==false){

        header('location:productlist.php');

   }else{

//--end        
?>

<html lang="en">
<head>
    <title>settareh Shop - product list</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 

    <link rel="stylesheet" href="assets/css/bootstrap.min.rtl.css">
 
    <link type="text/css" href="assets/css/style.css" rel="stylesheet" />

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
 
<!--
    

-->
</head>

<body style="direction: rtl; background-color:beige;">
    <!-- Start Top Nav -->

    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand text-success  " href="productlist.php" style="float: right;  "><span style="font-size: 24px;  "> 
                 SETTAREH
            </span>
            </a>
            <p style="float:left; color:red; margin-top:5px;">جزئیات سفارش<span style="float:left; color:blue;margin-right:7px; ">

</span>
      
</p>
        </div>
    </nav>
    <!-- Close Header -->


    <!-- Start Content -->
    <section style="width: auto; height:auto; margin-top: 25px; margin-bottom: 0px;">
    <div class="container">
                <div class="row">
    <div class=" col-lg-12 col-sm-12 col-md-12 col-xs-12 " >
    <div class="card ">
 
    <?php

foreach($showpay as $rows){

    ?>
            <p class="card-text" >
                <span  style="float:right;   font-size:15px; color:black;margin-bottom:15px;  margin-right:20px; color:red; margin-top:15px;"> نام محصول :  <?php echo $rows['name']?></span>  
                </p>

                <p class="card-text" >
                <span  style="float:right;   font-size:15px; color:black;margin-bottom:15px;  margin-right:20px;">سایز محصول  : <?php echo $rows['size']?></span>  
                </p>

                
                <p class="card-text" >
                <span  style="float:right;   font-size:15px; color:black;margin-bottom:15px;  margin-right:20px;">رنگ محصول  : <?php echo $rows['color']?></span>  
                </p>

                
                <p class="card-text" >
                <span  style="float:right;   font-size:15px; color:black;margin-bottom:15px;  margin-right:20px;">تعداد محصول  : <?php echo $rows['number']?></span>  
                </p>

                 <p class="card-text" >
                <span  style="float:right;   font-size:15px; color:black;margin-bottom:15px;  margin-right:20px;">شماره فاکتور : <?php echo $rows['num_order']?></span>  
                </p>

                <p class="card-text" >
                <span  style="float:right;   font-size:15px; color:black;margin-bottom:15px;  margin-right:20px;">شماره تراکنش : <?php echo $rows['num_trac']?></span>  
                </p>

                <p class="card-text" >
                <span  style="float:right;   font-size:15px; color:black; margin-bottom:15px; margin-right:20px;"> تاریخ خرید : <?php echo $rows['data']?></span>  
                </p>

                <p class="card-text" >
                <span  style="float:right;   font-size:15px; color:black; margin-bottom:15px; margin-right:20px;">مبلغ محصول : <?php echo $rows['price']?></span>  
                </p>

                </div>
                </div>

                </div>
   
                    </div>
              
    </section>


    <section style="width: auto; height:auto; margin-top: 25px;">
    <div class="container">
                <div class="row">
                <div class=" col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="card ">


<?php 
}
?>

<?php

	 $all_price=40000;
	    foreach($showpay as $rows){
			
            $all_price+=$rows['price'];
		 
	    }

?>

<?php
  $id=$rows['id_user'];
  $show=$three->show_address($id);
 foreach($show as $row_show){
?>



                <p class="card-text" >
                <span  style="float:right;   font-size:15px; color:black; margin-bottom:15px; margin-right:20px; margin-top:15px;"> تحویل گیرنده : <?php echo $row_show['name']?> <?php echo $row_show['family']?></span>  
                </p>
               
                <p class="card-text" >
                <span  style="float:right;   font-size:15px; color:black; margin-bottom:15px; margin-right:20px;">شماره تلفن : <?php echo $row_show['phone']?></span>  
                </p>
               
                <p class="card-text" >
                <span  style="float:right;   font-size:15px; color:black; margin-bottom:15px; margin-right:20px;">ادرس : <?php echo $row_show['address']?></span>  
                </p>

                <p class="card-text" >
                <span  style="float:right;   font-size:15px; color:black; margin-bottom:15px; margin-right:20px;">کد پستی : <?php echo $row_show['zipcode']?></span>  
                </p>

                <p class="card-text" >
                <span  style="float:right;   font-size:15px; color:black; margin-bottom:15px; margin-right:20px;"> ایمیل : <?php echo $row_show['email']?></span>  
                </p>

                <hr>
                <p class="card-text" >
                <span  style="float:right;   font-size:15px; color:black; margin-bottom:15px; margin-right:20px;"> هزینه  پستی : 40000 تومان  </span>  
                </p>

                <p class="card-text" >
                <span  style="float:right;   font-size:15px; color:black; margin-bottom:15px; margin-right:20px;">مبلغ کل  : <?php echo $all_price?></span>  
                </p>

                <p class="card-text" >
                <span  style="float:right;   font-size:15px; color:black; margin-bottom:15px; margin-right:20px;">شیوه پرداخت :  انلاین</span>  
                </p>
               

                </div>
                </div>
                </div>
                </div>

                </div>
   
                    </div>
              
    </section>

           
<?php 
}
?>

<?php 
}
?>
  

  
  
  <section style="width: auto; height:auto; margin-top: 25px;">
    <div class="container">
                <div class="row">
                
                <div class=" col-lg-3 col-sm-12 col-md-12 col-xs-12 " >

                   <a class="btn"  href="<?php echo "pay_run.php?json=380" ?>"  target="_blank" rel="nofollow"  title="more" style=" font-size:18px; width:100%; margin-top: 5px; margin-bottom:50px;color:white; background-color: black;  ">json</a>										
                   </div>

                   <div class=" col-lg-3 col-sm-12 col-md-12 col-xs-12 " >

                   <a class="btn"  href="<?php echo "show_xml.php?xml=300" ?>"  target="_blank" rel="nofollow"  title="more" style=" font-size:18px; width:100%; margin-top: 5px; margin-bottom:50px;color:white; background-color: black;  ">xml</a>										
                   </div>
                   <div class=" col-lg-3 col-sm-12 col-md-12 col-xs-12 " >


                <a class="btn"  href="<?php echo "show_pay.php" ?>"   rel="nofollow"  title="more" style=" font-size:18px; width:100%; margin-top: 5px; margin-bottom:50px; color:white; background-color: black;  " onclick = "window.print()">پرینت</a>										
           
               
                </div>
               
                <div class=" col-lg-3 col-sm-12 col-md-12 col-xs-12 " >

                <a class="btn"  href="<?php echo "productlist.php" ?>"   rel="nofollow"  title="more" style=" font-size:18px; width:100%; margin-top: 5px; margin-bottom:50px;color:white; background-color: black;  ">صحفه اول</a>										
                </div>
               

                </div>
                </div>
    </section>


   
 <!-- end Content -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>