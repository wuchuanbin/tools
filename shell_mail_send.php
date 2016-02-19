<?php
	date_default_timezone_set('Asia/Shanghai');
	$str = file_get_contents('数据来源地址 通常是可展示的HTML');
	//$arr = json_decode($str,true);
	$filename = '/shell/html/'.date('Ymd').'.html';
	file_put_contents($filename,$str);
//print_r($arr);
	//组合邮件格式
	$to = "xxx;xxx;xxx";//收件人 可用;间隔
        $subject = date('Y-m-d').'daily info';
	//$subject = "=?GBK?B?".base64_encode($subject)."?=";
        $subject = "=?utf-8?B?".base64_encode($subject)."?=";
        $message = $str;

	
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\n";
	$headers .= 'Content-Transfer-Encoding:8bit'."\n";

// Additional headers
//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\n";
$headers .= 'From:哪里的提醒发那个是<xxx@xxx.ccc>' . "\r\n";
//$headers .= 'Cc: birthdayarchive@example.com' . "\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\n";	


    	mail($to,$subject,$message,$headers);
