<?php 
 		function send($url,$api,$amount,$redirect,$name,$email){
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POSTFIELDS,"api=$api&amount=$amount&redirect=$redirect&name=$name&email=$email");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }
    function get($url,$api,$trans_id,$id_get){
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POSTFIELDS,"api=$api&id_get=$id_get&trans_id=$trans_id&json=1");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    } ;
    
    
	$url = $_POST['url']; 
	$api = $_POST['api'];
	$amount =  $_POST['amount'];
	$redirect = $_POST['redirect'];
	$name = $_POST['name'];//ekhtiari
	$email = $_POST['email'];//ekhtiari
 
	
	$result = send($url,$api,$amount,$redirect,$name,$email); 
	
	if($result > 0 && is_numeric($result))
	{
		$go = "https://bitpay.ir/payment/gateway-$result-get"; 
		header("Location: $go");
	} 
?>
