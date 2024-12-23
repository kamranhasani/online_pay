<?php 

//---get of page run.php and implement_online and implement_help
require "vendor/autoload.php";

use   Kamranhasani\Settarehpay\settareh\implement_online;
use   Kamranhasani\Settarehpay\help\implement_help;

$one=new implement_online();
$two=new implement_help();

$one->DB();

if(isset($_SESSION['displayone'])){

    $show=$_SESSION['displayone'];
 
    $token= $two->set_token();
    $_SESSION['tokenone']=$token;

}else{

    unset($_SESSION['displayone']); 
    header('location:productlist.php');
    exit;
    
}

$showone=$one->countrow(); 

//----end------  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>settareh - بررسی محصول</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link rel="stylesheet" href="assets/css/bootstrap.min.rtl.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link type="text/css" href="assets/css/style.css" rel="stylesheet" />

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    
    <!-- Slick -->

<!--
    


-->
</head>

<body style="direction: rtl; background-color:beige;"   >
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand text-success  " href="productlist.php" style="float: right;  "><span style="font-size: 24px;  "> 
                 SETTAREH
            </span>
            </a>

            <p style="float:left; color:red; margin-top:5px;">سبد کالا<span style="float:left; color:blue;margin-right:7px; ">

<?php echo $showone;?></span>
      
</p>
        </div>
    </nav>
    <!-- Close Top Nav -->





    <!-- Open Content -->
    <section style="width: auto; height:auto; margin-top: 20px; margin-bottom: 10px; ">
        <div class="container-fluid">
                    <div class="row">
                <div class="col-lg-5 mt-0">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="assets/img/product_single_10.jpg" alt="settareh_shop" id="product-detail">
                    </div>
                    <div class="row">
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_01.jpg" alt="settareh_shop">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_02.jpg" alt="settareh_shop">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_03.jpg" alt="settareh_shop">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.First slide-->

                                <!--Second slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_04.jpg" alt="settareh_shop">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_05.jpg" alt="settareh_shop">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_06.jpg" alt="settareh_shop">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Second slide-->

                                <!--Third slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_07.jpg" alt="settareh_shop">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_08.jpg" alt="settareh_shop">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_09.jpg" alt="settareh_shop">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Third slide-->
                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->
            


                <div class="col-lg-7 mt-0">
                    <div class="card">
                        <div class="card-body">
                        <?php
                        foreach($show as $row){
                            ?>
                            <h1 class="h2"><?php echo $row['name']?></h1>
                            <p class="h3 py-2"> <?php echo $row['price']?><span style="margin-right:5px;">تومان</span></p>
               
                            <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark" style="margin-right:5px;">Rating 4.8 </span>
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6 style="margin-top:10px; margin-bottom:5px;"><strong>Brand:</strong></h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>Easy Wear</strong></p>
                                </li>
                            </ul>

                           
                            <h6 style="margin-top:10px; margin-bottom:5px;"><strong >Description</strong></h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse. Donec condimentum elementum convallis. Nunc sed orci a diam ultrices aliquet interdum quis nulla.</p>


                            <h6 style="margin-top:10px; margin-bottom:5px;"><strong >Specification</strong></h6>
                          
                            <ul class="list-unstyled pb-3">
                                <li>Lorem ipsum dolor sit</li>
                                <li>Amet, consectetur</li>
                                <li>Adipiscing elit,set</li>
                                <li>Duis aute irure</li>
                                <li>Ut enim ad minim</li>
                                <li>Dolore magna aliqua</li>
                                <li>Excepteur sint</li>
                            </ul>


                            <form action="run.php"  method="post">

                              
                                <div class="row">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item">سایز کالا
                                                <input type="hidden" name="product-size" id="product-size" value="S">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">S</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">M</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">L</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">XL</span></li>
					
                                        </ul>
                                    </div>
                                    </div>

                                    <label class="description" style="margin-bottom:7px;">رنگ کالا</label>

                                    <select name="color" id="color" class="form-control" style=" font-size:20px; width:50%; margin-bottom:1px;"  >
                               
                                    <option class="list-inline-item " value="white"> سفید</option>
                                    <option class="list-inline-item" value="red">قرمز</option>
                                    <option class="list-inline-item" value="blue">ابی</option>
                                    <option class="list-inline-item" value="green">سبز</option>
                                    <option class="list-inline-item" value="black">سیاه</option>
                                  
                                    </select> 

                                
                                <input type="hidden" name="id_display" id="id_display" value="<?php echo $row['id']?>">
                                <input type="hidden" name="price" id="price" value="<?php echo $row['price']?>">
                                <input type="hidden" name="name" id="name" value="<?php echo $row['name']?>">
                                      
                                <label class="description" >تعداد کالا </label>  <input type="number"  name="number" id="number"  class="list-inline-item" value="1"  min="1" max="5"  style=" font-size:20px; width:10%; margin-top:20px; margin-right:3px;"/>
                                <input type="hidden"    name="token" id="token" value="<?php echo  $token; ?>"/>
                               <br >  <br >
                                <input type="submit" class="btn btn-success col-lg-3 col-sm-3 col-md-3 col-xs-3 "  name="btnone" id="btnone"    value="بعدی"    style="  width:100%; margin-top:25px;float:left;margin-left:10px; font-size:17px; "/>	
                                <input type="submit" class="btn btn-success col-lg-3 col-sm-3 col-md-3 col-xs-3 "  name="btntwo" id="btntwo"    value="محصولات دیگر"     style="  width:100%; margin-top:25px;float:left;margin-left:10px; font-size:17px;"/>	
                                <input type="submit" class="btn btn-success col-lg-3 col-sm-3 col-md-3 col-xs-3 "  name="btnthree" id="btnthree"  value="لغو سفارش"     style="  width:100%; margin-top:25px; float:left; margin-left:10px; font-size:17px;"/>	

                            </form>
                            <?php
                }
                ?>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </section>
    <!-- Close Content -->




    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->

  

</body>

</html>