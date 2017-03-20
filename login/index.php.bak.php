<?php
    parse_str($_SERVER['QUERY_STRING'], $parseUrl);
    $token = '';
    $pattern="1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ";
    for($i=0;$i<32;$i++)
        $token .= $pattern[ rand(0,35) ];
    $url = "http://{$parseUrl['gw_address']}:{$parseUrl['gw_port']}/wifidog/auth?token={$token}";
    // $url = "http://pmgeco.com/wxwifidog/wx/";

    $secretkey =  "b12eebfba64c4b9f82fae7c6e21b79c2";
    $appId = "wx67beb514399c96ec";
    $shopId = "3697456";
    $authUrl = $url;
    $mac = $parseUrl['mac'];
    $extend = "";
    $timestamp = time();
    $ssid  = "PMGWork";
    $sign = md5($appId + $extend + $timestamp + $shopId + $authUrl + $mac + $ssid + $secretkey);
?>
<!DOCTYPE HTML>
<html>
<head lang="zh-CN">
    <meta charset="UTF-8">
    <title>黄花旅游</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="http://wifi.weixin.qq.com/resources/css/style-simple-follow.css"/>
    <script src="clipboard.min.js"></script>
</head>
<body class="mod-simple-follow">
<div class="mod-simple-follow-page">
    <div class="mod-simple-follow-page__banner">
        <img class="mod-simple-follow-page__banner-bg" src="http://wifi.weixin.qq.com/resources/images/background.jpg" alt=""/>
        <div class="mod-simple-follow-page__img-shadow"></div>
        <div class="mod-simple-follow-page__logo">
            <img class="mod-simple-follow-page__logo-img" src="http://wifi.weixin.qq.com/resources/images/t.weixin.logo.png" alt=""/>
            <p class="mod-simple-follow-page__logo-name"></p>
            <p class="mod-simple-follow-page__logo-welcome">欢迎您</p>
        </div>
    </div>
    <div class="mod-simple-follow-page__attention">
        <p class="mod-simple-follow-page__attention-txt">欢迎使用微信连Wi-Fi</p>
        <a class="mod-simple-follow-page__attention-btn btn" onclick="callWechatBrowser()" data-clipboard-text="黄花旅游">打开微信关注公众号</a>
    </div>
    <script type="text/javascript">
    new Clipboard('.btn');
    function callWechatBrowser(){
       
        var weixinUrl = "weixin://connectToFreeWifi/?apKey=_p33beta&appId='<?php echo $appId ?>'&shopId='<?php echo $shopId ?>'&authUrl='<?php echo urlencode($authUrl) ?>'&extend='<?php echo $extend ?>'&timestamp='<?php echo $timestamp ?>'&sign='<?php echo $sign ?>'";    
        window.location=weixinUrl;
    }
    </script>
</div>
</body>
</html>
