<?php
error_reporting(0);
$n=4;

function getName($n) {
    $characters = '0123456789';
    $randomString = '';
 
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
 

    return $randomString;
}

$mnk = getName($n);
$rd = rand(0,999);
$vvv = "Mozilla/5.0 (Linux; Android 2.3.6) AppleWebKit/533.1 (KHTML, like Gecko) edge X/".$mnk."";

function solveCaptcha(){
	global $vvv;
a:
$sit = "c198aabb-6f02-486e-acbd-0663ccb32b93";
$login = "http://sctg.xyz/in.php?key=Gjd5MbFADqP0DlrurYrAmdIlQ9owqctV|onlyxevil&method=hcaptcha&sitekey=".$sit."&json=1&pageurl=https://hatecoin.me/faucet/verify";
$ua[] = "User-Agent: ".$vvv."";
$ua[] = "Content-Type: application/json";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $login);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$result = curl_exec($ch);

$re = json_decode($result);
$id = $re->request;
if($id==''){goto a;}
c:
$url = "http://sctg.xyz/res.php?key=Gjd5MbFADqP0DlrurYrAmdIlQ9owqctV|onlyxevil&action=get&id=".$id."";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$proxy = 'socks5://lgekvzsx:cn78dlxqoz27@38.154.227.167:5868';
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
curl_setopt($ch, CURLOPT_PROXY, $proxy);       
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
$res = curl_exec($ch);

if ($res == 'CAPCHA_NOT_READY') {          
        sleep(6);
        goto c;
    }
if($res=="ERROR_CAPTCHA_UNSOLVABLE"){sleep(80);goto a;}
$captcha = str_replace("OK|", "", $res);
curl_close($ch);
return $captcha;
}

function curl($url, $method, $data = null) {
	global $vvv;
    $header = array(        
        "Content-Type: application/json",
        "User-Agent: ".$vvv.""
    );
    $proxy = 'socks5://lgekvzsx:cn78dlxqoz27@185.199.229.156:7492';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIE, "");
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
    curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
    curl_setopt($ch, CURLOPT_PROXY, $proxy);       
    curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
function curl_request($url, $method, $data = null) {
    $header = array(
        "Host: hatecoin.me",
        "upgrade-insecure-requests: 1",
        "content-type: application/x-www-form-urlencoded",
        "X-Requested-With: XMLHttpRequest",
        "X-Forwarded-For: 202.145.6.155",
        "cookie: bitmedia_fid=eyJmaWQiOiJlMmUzMDQxZGZiYjM1ZWRiNDY5NTkyODdiMGY1ZWM5MiIsImZpZG5vdWEiOiJlNmFhYmMxMzZmZGI0YzQwMzM0NGM3M2M5ZTQ2YTM0ZSJ9; _ga=GA1.1.1473213038.1715662491; ci_session=ike51vruf3gafvck36nauel6qphg2glu; csrf_cookie_name=4f895001514d79585eb4fa7a47354b64; _ga_5RXM6JMJCV=GS1.1.1715662490.1.1.1715662969.0.0.0",
        "user-agent: Mozilla/5.0 (Linux; Android 11; V2043) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Mobile Safari/537.36",
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIE,TRUE);     
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

while(true):
$url = "https://hatecoin.me/faucet/";
$r = curl_request($url, 'GET');

$tim = explode(' - 1' ,explode('var wait = ', $r)[1])[0];
$lef = explode('</p>' ,explode('<p class="lh-1 mb-1 font-weight-bold">', $r)[3])[0];


$csf = explode('">' ,explode('<input type="hidden" name="csrf_token_name" id="token" value="', $r)[1])[0];
$tok = explode('">' ,explode('<input type="hidden" name="token" value="', $r)[1])[0];



$bot1=explode('\"',explode('rel=\"',$r)[1])[0];
    $bot2=explode('\"',explode('rel=\"',$r)[2])[0];
    $bot3=explode('\"',explode('rel=\"',$r)[3])[0];
    $main = explode('"',explode('data:image/png;base64,', $r)[1])[0];
    $img1 = explode('"',explode('data:image/png;base64,', $r)[2])[0];
    $img2 = explode('"',explode('data:image/png;base64,', $r)[3])[0];
    $img3 = explode('"',explode('data:image/png;base64,', $r)[4])[0];

$url = "http://sctg.xyz/in.php";
$data = array(
        'key' => 'Gjd5MbFADqP0DlrurYrAmdIlQ9owqctV',
        'method' => 'antibot',
        'main' => $main,
        $bot1 => $img1,
        $bot2 => $img2,
        $bot3 => $img3
        );
$options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);
$task = explode('OK|', $response)[1];

c:
$url = "http://sctg.xyz/res.php?key=Gjd5MbFADqP0DlrurYrAmdIlQ9owqctV&id=".$task."";
$res = curl($url, 'GET');

if ($res == 'CAPCHA_NOT_READY') {          
        sleep(6);
        goto c;
    }
    	$hasil = explode('OK|', $res)[1];
       $antb = explode(',', $hasil);
       
$bot1 = $antb[0];   
$bot2 = $antb[1];     
$bot3 = $antb[2];    


$capv = solveCaptcha();

$url = 'https://hatecoin.me/faucet/verify';
$data = "antibotlinks=+".$bot1."+".$bot2."+".$bot3."&csrf_token_name=".$csf."&token=".$tok."&captcha=hcaptcha&g-recaptcha-response=&h-captcha-response=".$capv."";
$response = curl_request($url, 'POST', $data);
$suc = explode("to your balance" ,explode("Good job!', '", $response)[1])[0];
date_default_timezone_set('Asia/Jakarta');
$timestamp = time();
$wak = date("[H:i]", $timestamp);

echo " ".$wak." ".$suc." \n";
if (strpos($suc, "added") !== false) {sleep(361);}
if($lef=="1/120"){echo "Complete!!! \n";}
endwhile;

