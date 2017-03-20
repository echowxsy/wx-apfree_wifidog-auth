<?php
parse_str($_SERVER['QUERY_STRING'], $parseUrl);
$secretkey =  "b12eebfba64c4b9f82fae7c6e21b79c2"; //秘钥
$appId = "wx67beb514399c96ec";
$shopId = "3697456";
$authUrl = "http://pmgeco.com/wxwifidog/wx/index.php";
$mac = $parseUrl['mac'];
$extend = "wechatphone";
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
    <title>欢迎使用黄花旅游WiFi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="style-simple-follow.css" />
    <script type="text/javascript" src="wechatutil.js"></script>
    <script type="text/javascript"    
src="http://wifi.weixin.qq.com/resources/js/wechatticket/wechatutil.js" ></script>
  </head>

  <body class="mod-simple-follow">
    <div class="mod-simple-follow-page">
      <div class="mod-simple-follow-page__banner">
        <img class="mod-simple-follow-page__banner-bg" src="background.jpg" alt="" />
        <div class="mod-simple-follow-page__img-shadow"></div>
        <div class="mod-simple-follow-page__logo">
          <img class="mod-simple-follow-page__logo-img" src="t.weixin.logo.png" alt="" />
          <p class="mod-simple-follow-page__logo-name"></p>
          <p class="mod-simple-follow-page__logo-welcome">欢迎您</p>
        </div>
      </div>
      <div class="mod-simple-follow-page__attention">
        <p class="mod-simple-follow-page__attention-txt">欢迎使用微信连Wi-Fi</p>
        <a class="mod-simple-follow-page__attention-btn btn" onclick="callWechatBrowser()">打开微信关注公众号</a>
      </div>

      <script type="text/javascript">
        function callWechatBrowser() {
          Wechat_GotoRedirect(
            '<?php echo $appId ?>',
            '<?php echo $extend ?>',
            '<?php echo $timestamp ?>',
            '<?php echo $sign ?>',
            '<?php echo $shopId ?>',
            '<?php echo $authUrl ?>',
            '<?php echo $mac ?>',
            '<?php echo $ssid ?>');
        }
      </script>
      <script type="text/javascript">
        document.addEventListener('visibilitychange', putNoResponse, false);
      </script>
    </div>
  </body>

  </html>