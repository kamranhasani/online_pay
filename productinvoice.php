<?php 
//---get of page run.php and implement_online and implement_help
require "vendor/autoload.php";
use   Kamranhasani\Settarehpay\settareh\implement_online;
use  Kamranhasani\Settarehpay\help\implement_help;
$one=new implement_online();
$two=new implement_help();

$one->DB();

if(!isset ($_SESSION['product'])){

	unset($_SESSION['product']); 

	$product=$one->deleteall();

	if($product){

	header('location:productlist.php');
	}

}else{

$one->selectzero();
$showzero=$one->fetchzero();

$tokentwo= $two->set_token();
$_SESSION['tokentwo']=$tokentwo;

$tokenthree= $two->set_token();
$_SESSION['tokenthree']=$tokenthree;

$show=$one->countrow();

}
//----end------  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>settareh - فاکتور و ثبت ادرس</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.rtl.css">
	<link type="text/css" href="assets/css/style.css" rel="stylesheet" />
</head>
<body style="background-color:beige; direction: rtl;" >
	
    <!-- Start Top Nav -->
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
    <!-- Close Top Nav -->
	<br>

	<section >

		<div class="container">
		<div class="row">
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">


		<table class="table table-striped ">
  <thead>
    <tr>
	    <th class="">شماره فاکتور </th>
		<th class="">نام کالا</th>
		<th class="">تعداد</th>
		<th class="">قیمت</th>
		<th class="">حذف</th>
    </tr>
  </thead>
  <tbody>
  <?php

foreach($showzero as $row){

    ?>
  <tr style="background-color: rgb(174, 245, 133); color:black;" >
							  
	<td class=""><?php echo $row['info'];?></td>
	<td class=""><?php echo $row['name'];?><span>-(<?php echo $row['size'];?>)</span><span>-(<?php echo $row['color'];?>)</span></td>
	<td class=""><?php echo $row['number'];?></td>
	<td class=""><?php echo $row['price'];?></td>
	<td class="">  <a class="btn btn-outline-success"  href="<?php echo "run.php?delleswear=$row[id]" ?>"   rel="nofollow"  title="حذف کالا" style=" font-size:13px; ;color:black;"> کنسل  </a></td>
	</tr>
	<?php

}

?>
  </tbody>
</table>


		</div>
		</div>

		<table class="table" >
  <thead >
    <tr style="float:right;">
	    <th class="">مجموع قیمت + هزینه ارسال</th>
		<?php
		$pr=0;
	    foreach($showzero as $rows){
			
			$pr+=$rows['price'];
	
		 
	    }
		$_SESSION['allprice']=$pr+40000;
?>
<th class="" ><span><?php echo $pr;?> + 40000   تومان</span></th>
		
    </tr>
  </thead>

</table>



<form action="run.php"  method="post" autocomplete="off">
						
						<div class="row" style="margin-bottom:20px;">
					

						<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style=" float:left;">
						<input type="hidden"    name="tokenthree" id="tokenthree" value="<?php echo  $tokenthree; ?>"/>
						<input type="submit" class="btn btn-success col-lg-3 col-sm-3 col-md-3 col-xs-3 "  name="btnfour" id="btnfour"    value="محصولات دیگر"     style="  width:100%; margin-top:25px;float:left;margin-left:10px; font-size:17px;"/>	
                        <input type="submit" class="btn btn-success col-lg-3 col-sm-3 col-md-3 col-xs-3 "  name="btnfive" id="btnfive"   value="لغو سفارش"     style="  width:100%; margin-top:25px; float:left; margin-left:10px; font-size:17px;"/>	

						
						</div>
						      

						</div>

		
						
						
					</form>

		<section  style="margin-bottom:15px;">
       <div class="row" > 
          <div class=" col-lg-12 col-sm-12 col-md-12 col-xs-12 " >
          <div class="alert alert-dark "  >
        
		  <h2 style="font-size: 20px;   margin-top:5px; color: black;">گرفتن آدرس</h2> 
		
           	</div> 
			   <?php
		  if (isset($_SESSION['message'])){

                echo $_SESSION['message']; 
								
				unset($_SESSION['message']);

                                 }
        ?>
                 </div> 
                </div>
	                 </section>

					 <form action="run.php"  method="post" autocomplete="off">
						
						<div class="row" style="margin-bottom:20px;">
					

						<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
						<div class=" ">
						<input type="text" class="form-control "  placeholder="نام" name="fname" id="fname" style="margin-bottom: 20px;" autocomplete="off" >
						<input type="text" class="form-control "  placeholder="نام خانوادگی" name="family" id="family" style="margin-bottom: 20px;" autocomplete="off">
						<input type="email" class="form-control "  placeholder="ایمیل" name="email" id="email" style="margin-bottom: 20px;" autocomplete="off">
						<input type="text" class="form-control "  placeholder=" تلفن" name="phone" id="phone" style="margin-bottom: 20px;" autocomplete="off">
						<input type="text" class="form-control "  placeholder="کدپستی" name="code" id="code" style="margin-bottom: 20px;" autocomplete="off">
						</div>
						</div>

						<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
						<div class=" ">
						<textarea  class="form-control "  placeholder=" آدرس" name="address" id="address" style="width:100%; height:180px; margin-bottom: 30px;" autocomplete="off"></textarea>
						<script>
                           CKEDITOR.replace( 'address' );
                             </script>
                              <input type="hidden"    name="tokentwo" id="tokentwo" value="<?php echo  $tokentwo; ?>" autocomplete="off"/>
                               
                           
						</div>
						<input type="submit" class="btn btn-success col-lg-4 col-sm-12 col-md-12 col-xs-12 "  name="btnsix" id="btnsix"    value="بعدی"    style=" font-size:20px; width:100%; margin-top:20px;float:left;margin-left:10px; font-size:15px;  "/>	

                          <input type="submit" class="btn btn-success col-lg-4 col-sm-12 col-md-12 col-xs-12 "  name="btnseven" id="btnseven"  value="لغو "     style=" font-size:20px;  width:100%; margin-top:20px; float:left; margin-left:10px; font-size:15px; "/>	

						
						</div>
						      

						</div>
						
					</form>

			
		</div>
		</section>
	
	             
 <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script src="assets/js/editor/build-config.js"></script>
<script src="assets/js/editor/ckeditor.js"></script>
<script src="assets/js/editor/config.js"></script>
<script src="assets/js/editor/styles.js"></script>
</body><!-- This template has been downloaded from Webrubik.com -->
</html>

