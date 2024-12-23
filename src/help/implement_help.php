<?php

namespace Kamranhasani\Settarehpay\help;

class implement_help implements interface_help{


    public function clear($data)
    {

        $data = trim($data);
        $data = strip_tags($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);

        return $data;

    }
    public function checkone($value)
    {

        if(isset($_SESSION['tokenone']) && !empty($_SESSION['tokenone']) && $_SESSION['tokenone']==$value){

           unset($_SESSION['tokenone']);

         return true;

        }

         else{

            return false;
         }

    }


    public function checktwo($value)
    {

        if(isset($_SESSION['tokentwo']) && !empty($_SESSION['tokentwo']) && $_SESSION['tokentwo']==$value){

           unset($_SESSION['tokentwo']);

         return true;

        }

         else{

            return false;
         }

    }

    
    public function checkthree($value)
    {

        if(isset($_SESSION['tokenthree']) && !empty($_SESSION['tokenthree']) && $_SESSION['tokenthree']==$value){

           unset($_SESSION['tokenthree']);

         return true;

        }

         else{

            return false;
         }

    }

    public function checkfour($value)
    {

        if(isset($_SESSION['tokenfour']) && !empty($_SESSION['tokenfour']) && $_SESSION['tokenfour']==$value){

           unset($_SESSION['tokenfour']);

         return true;

        }

         else{

            return false;
         }

    }

    public function set_token()
    
    {

        $rand = base64_encode( openssl_random_pseudo_bytes(32));
       
        return $rand;

    }
    
    
}

?>