
<?php 
//-********--get of class implement_online
require "vendor/autoload.php";
use   Kamranhasani\Settarehpay\settareh\implement_online;
use   Kamranhasani\Settarehpay\help\implement_help;
use   Kamranhasani\Settarehpay\pay\pay_one;


$one=new implement_online();
$two=new implement_help();
$three=new pay_one();


$one->DB();

if(isset($_SESSION['spaytoken'])){

    $tokenfour=$two->set_token();
    $_SESSION['tokenfour']=$tokenfour;
    
}else{

    unset($_SESSION['spaytoken']); 

    header('location:productlist.php');

    exit;
    
}

//--end

?>
<!DOCTYPE html>
<html  lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>settareh - صحفه پرداخت</title>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="pay/css/bootstrap.min.rtl.css">
    <link rel="stylesheet" href="pay/css/style.css">

</head>
<body >



<div class="container"  >

<div class="row">

<div class=" col-lg-12 col-sm-12 col-md-12 col-xs-12 " >

<div class="card-container"   style="width: auto; margin-top:50px;">

<div class="front"  >
    <div class="image" >
        <img src="image/chip.png" alt="" >
        <div class="card-number"  style="color: white; font-size: 20px; ">pay settareh
          
        </div>
    </div>
    <div class="card-number-box" >
      **** **** **** ****
    </div>
   
    <div class="flexbox">
        <div class="box">
            <span>CCv2</span>
            <div class="card-holder-name">***</div>
        </div>
        <div class="box">
            <span>انقضا</span>
            <div class="expiration">
                <span class="exp-month">00</span>
                <span class="exp-year">00</span>
            </div>
        </div>
    </div>
</div>
</div>





    <form  method="post" action="pay_run.php"  style="width: auto; height:750px;  margin-top:40px;" autocomplete="off">

    <label class="description" style="float:left;text-transform:lowercase;">

   مبلغ : <span style="color:red;font-size:larger; "> <?php echo $_SESSION['allprice']; ?> </span><span style="color:red;font-size:larger; ">تومان</span>

   <br style="margin-bottom:7px;">
   
   <?php  echo date("Y/m/d"). '    '; ?>
   </label>
 
  <br style="margin-bottom:40px;">

        <div class="inputBox"  >
            <span>شماره کارت </span>
            <input type="text"  name="card-number" id="card-number"  maxlength="16" class="card-number-input" placeholder="16 عدد" style="text-transform:lowercase;" autocomplete="off">
        </div>
        
        <div class="flexbox">
            <div class="inputBox">
                <span>CVV2</span>
                <input type="text" name="CVV" id="CVV" maxlength="3" class="cvv-input"  placeholder="3 عدد" style="text-transform:lowercase;" autocomplete="off">
            </div>
            <div class="inputBox">
                <span>ماه</span>
                <input type="text"  name="month" id="month" maxlength="2" class="month-input" placeholder="2 عدد" style="text-transform:lowercase;" autocomplete="off">
            </div>
            <div class="inputBox">
                <span>سال</span>
                <input type="text" name="year" id="year" maxlength="2" class="year-input" placeholder="2 عدد" style="text-transform:lowercase;" autocomplete="off">
            </div>
           
        </div>
        <div class="inputBox">
            <span>پسورد </span>
            <input type="Password" name="Password" id="Password" maxlength="6" class="card-holder-input" style="width: 40%; text-transform:lowercase; " placeholder="6 عدد"  autocomplete="off"/>
      									

        </div>

        <div class="inputBox">
            <span>ایمیل </span>
            <input type="email" name="email" id="email" class="card-number-input" style="width: 60%;  text-transform:lowercase;"  placeholder="اختیاری" autocomplete="off">
            <input type="hidden"    name="tokenfour" id="tokenfour" value="<?php echo  $tokenfour; ?>"/>
                               
                           
        </div>
       <br>
        <input type="submit" class="btn btn-success col-lg-5 col-sm-5 col-md-5 col-xs-12 "  name="paybuy" id="paybuy"  value="پرداخت"    style=" font-size:18px; width:100%; color: black;  margin-bottom: 10px; float:right; margin-top: 10px;"/>
           <input type="submit" class="btn btn-success col-lg-5 col-sm-5 col-md-5 col-xs-12 "  name="CAone" id="CAone"  value="لغو"    style=" font-size:18px; width:100%; color: black; margin-bottom: 10px;  float:left; margin-top: 10px;"/>

							
    </form>
</div>
    </div> 
    </div>
   


<script>

document.querySelector('.card-number-input').oninput = () =>{
    document.querySelector('.card-number-box').innerText = document.querySelector('.card-number-input').value;
}

document.querySelector('.cvv-input').oninput = () =>{
    document.querySelector('.card-holder-name').innerText = document.querySelector('.cvv-input').value;
}

document.querySelector('.month-input').oninput = () =>{
    document.querySelector('.exp-month').innerText = document.querySelector('.month-input').value;
}

document.querySelector('.year-input').oninput = () =>{
    document.querySelector('.exp-year').innerText = document.querySelector('.year-input').value;
}



</script>







</body>
</html>