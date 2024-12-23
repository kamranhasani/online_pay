<?php 
//---get of class implement_online
require "vendor/autoload.php";
use   Kamranhasani\Settarehpay\settareh\implement_online;
use  Kamranhasani\Settarehpay\help\implement_help;
$one=new implement_online();
$two=new implement_help();
$one->DB();

$one->selectone_pay();
$showlist=$one->fetch_pay();

$show=$one->countrow();

//----end------  
?>

<html lang="en">
<head>
    <title>settareh - محصولات</title>
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

            <p style="float:left; color:red; margin-top:5px;">سبد کالا<span style="float:left; color:blue;margin-right:7px; ">

<?php echo $show;?></span>
      
</p>
        </div>
    </nav>
    <!-- Close Header -->


    <!-- Start Content -->
    <section style="width: auto; height:auto; margin-top: 20px; ">
    <div class="container-fluid">
                <div class="row">

<?php

foreach($showlist as $row){

    ?>
    <div class=" col-lg-3 col-sm-12 col-md-12 col-xs-12 " >
    <div class="card ">
        <div class="card-img ">
            <img class="img-thumbnail" src="<?php echo $row['image']?>" alt="settareh_shop"  style=" background-size:cover; width:100%; height:300px; background-attachment:fixed;  background-repeat:no-repeat;">
        </div>
        <div class="card-body">
            <h2  class="card-title" style=" font-size:23px;" ><span   style="color:black; "></span><?php echo $row['name'];?>   </h2>
            <p class="card-text" >
                <span  style="float:right;   font-size:15px; color: #566573">M/L/S/XL </span>  
         
                <span  style="float:left;  font-size:17px; color:red; padding-bottom: 5px;"><?php echo $row['price']?></span>
            </p>
           
             

            <a class="btn btn-outline-success"  href="<?php echo "run.php?sportswear=$row[name]" ?>"  target="_blank"  rel="nofollow"  title="more" style=" font-size:18px; width:100%; margin-top: 5px;"> بیشتر </a>										
        </div>
    </div>
</div>



<?php

}

?>
                    
                    </div>
                </div>
    </section>

    <section style="width: auto; height:auto; margin-top: 20px; ">
    <div class="container-fluid">
                <div class="row">

                <div class=" col-lg-3 col-sm-12 col-md-12 col-xs-12 " >

                <a class="btn btn-outline-success"  href="<?php echo "productinvoice.php" ?>"   rel="nofollow"  title="more" style=" font-size:18px; width:100%; margin-top: 5px; margin-bottom:10px;">   کالا های انتخاب شده </a>										
           
               
                </div>
                <div class=" col-lg-3 col-sm-12 col-md-12 col-xs-12 " >

               <a class="btn btn-outline-success"  href="<?php echo "run.php?cancel=8256" ?>"   rel="nofollow"  title="more" style=" font-size:18px; width:100%; margin-top: 5px; margin-bottom:20px;">لغو کالا های انتخابی</a>										

               </div>

               <div class=" col-lg-3 col-sm-12 col-md-12 col-xs-12 " >

               <a class="btn btn-outline-success"  href="<?php echo "show_pay.php" ?>"   rel="nofollow"  title="more" style=" font-size:18px; width:100%; margin-top: 5px; margin-bottom:20px;">محصولات خریداری شده</a>										

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