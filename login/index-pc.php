<?php
    parse_str($_SERVER['QUERY_STRING'], $parseUrl);
    $token = '';
    $pattern="1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ";
    // for($i=0;$i<32;$i++)
     for($i=0;$i<2;$i++)
        $token .= $pattern[ rand(0,35) ];
    //$url = "http://{$parseUrl['gw_address']}:{$parseUrl['gw_port']}/wifidog/auth?token={$token}";
     $url = "http://pmgeco.com/wxwifidog/wx/pc.php";

    $secretkey =  "b12eebfba64c4b9f82fae7c6e21b79c2";
    $appId = "wx67beb514399c96ec";
    $shopId = "3697456";
    $authUrl = $url;
    $mac = $parseUrl['mac'];
    $extend = "";
    // $timestamp = time();
    function getMillisecond() {
        list($t1, $t2) = explode(' ', microtime());
        return $t2  .  ceil( ($t1 * 1000) );
    }
    $timestamp = getMillisecond();
    $ssid  = "HHLY";
    $tmp=$appId . $extend . $timestamp . $shopId . $authUrl . $mac . $ssid . $secretkey;
    $sign = md5($appId . $extend . $timestamp . $shopId . $authUrl . $mac . $ssid . $secretkey);
?>
  <!DOCTYPE HTML>
<html>
<head lang="zh-CN">
    <meta charset="UTF-8">
    <title>微信连Wi-Fi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <script type="text/javascript" src="pcauth.js" ></script>
  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style-pcdemo.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="image-logo.png" class="header__logo" alt="商户logo">
            <!--建议图片大小为570x140 或 287x70-->
        </div>
    
        <div class="main" style="background-image: url(image-bg.jpg);">
            <!--建议图片大小为 1920x1200 或 1920x1080-->
            <div class="main__content">
                <h2 class="main__content-title">欢迎使用<em>免费Wi-Fi</em></h2>
                <div class="main__content-qrcode" id='qrcode_zone' style="text-align:center;margin:20px auto;width:250px;"></div>
                <div class="main__content-info">使用微信扫描二维码</div>
            </div>

        </div>
    
        <div class="footer">
            <div class="footer_copyright"><a href="http://wifi.weixin.qq.com">微信连Wi-Fi详细介绍</a> Copyright © 2011-2015 Tencent. All Rights Reserved.</div>
        </div>
    </div>
</body>
<script type="text/javascript">
        JSAPI.auth({
            target : document.getElementById('qrcode_zone'),
            appId : '<?php echo $appId ?>',
            shopId : '<?php echo $shopId ?>',
            extend : 'wechatpc',
            authUrl : '<?php echo $authUrl ?>'
        });

</script>
</html>