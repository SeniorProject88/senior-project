<?php
function validate($input){
    return trim(htmlspecialchars($input)) ;
}
//validation

function required($input){
    if(empty($input)){
        return false;
    }
    else{
        return true;
    }
}

function minRange($input,$length){
    if(strlen($input)<$length){
        return false;
    }else{
        return true;
    }
}
function maxRange($input,$length){
    if(strlen($input)>$length){
        return false;
    }else{
        return true;
    }
}

function emailvalidate($email){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        return false ;
    }else{
        return true ;
    }
}

?>
