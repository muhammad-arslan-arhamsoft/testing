<?php  
use Vinkla\Hashids\Facades\Hashids;
if(!function_exists('encode')){
    function encode($string){
           if(!empty($string)){
                try{
                    return Hashids::encode($string);
                }catch(Exception $ex){
                   return false;
                }
            }
            return false;
    }
}



?>