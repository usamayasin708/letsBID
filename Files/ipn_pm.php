<?php
require_once('function.php');
connectdb();
session_start();


$gatewayData = mysqli_fetch_array(mysqli_query($conms,"SELECT val1, val2, name FROM deposit_method WHERE id='2'"));


$passphrase=strtoupper(md5($gatewayData[1]));


define('ALTERNATE_PHRASE_HASH',  $passphrase);
define('PATH_TO_LOG',  '/somewhere/out/of/document_root/');
$string=
      $_POST['PAYMENT_ID'].':'.$_POST['PAYEE_ACCOUNT'].':'.
      $_POST['PAYMENT_AMOUNT'].':'.$_POST['PAYMENT_UNITS'].':'.
      $_POST['PAYMENT_BATCH_NUM'].':'.
      $_POST['PAYER_ACCOUNT'].':'.ALTERNATE_PHRASE_HASH.':'.
      $_POST['TIMESTAMPGMT'];

$hash=strtoupper(md5($string));
$hash2 = $_POST['V2_HASH'];

if($hash==$hash2){

$amo = $_POST['PAYMENT_AMOUNT'];
$unit = $_POST['PAYMENT_UNITS'];
$depoistTrack = $_POST['PAYMENT_ID'];

$DepositData = mysqli_fetch_array(mysqli_query($conms,"SELECT usid, method, amount, charge, amountus, status FROM deposit_data WHERE track='".$depoistTrack."'"));


if($_POST['PAYEE_ACCOUNT']=="$gatewayData[0]" && $unit=="USD" && $amo ==$DepositData[4]){


//////////---------------------------------------->>>> ADD THE BALANCE 
$ct = mysqli_fetch_array(mysqli_query($conms,"SELECT mallu FROM users WHERE id='".$DepositData[0]."'"));
$ctn = $ct[0]+$DepositData[2];
mysqli_query($conms,"UPDATE users SET mallu='".$ctn."' WHERE id='".$DepositData[0]."'");
//////////---------------------------------------->>>> ADD THE BALANCE

$trx = $txn_id;

/////////////------------------------->>>>>>>>>>> UPDATE `deposit_data`
mysqli_query($conms,"UPDATE deposit_data SET trx='".$trx."', trx_ext='".$_POST['PAYMENT_BATCH_NUM']."', status='1' WHERE track='".$depoistTrack."'");





}
}


$to = "abirkhan75@gmail.com";
$subject = 'PM notify Ewallet';
$message = "   $string ---- $hash ---- $hash2";
$headers = 'From: ' . "i@abir.biz \r\n" .
    'Reply-To: ' . "i@abir.biz \r\n" .
    'X-Mailer: PHP/' . phpversion();
mail($to, $subject, $message, $headers);
?>


