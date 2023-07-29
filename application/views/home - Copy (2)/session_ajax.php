<?php
if (!isset($_SESSION)) {
    session_start();
}  
$lang=post("lang");

if($lang=='ar'){
$_SESSION["lang"]='ar';
$_SESSION["dir"]='rtl';
}else if($lang=='en'){
$_SESSION["lang"]='en';
$_SESSION["dir"]='ltr';

};
function post($input){
    return($_POST[$input]);
}
?>