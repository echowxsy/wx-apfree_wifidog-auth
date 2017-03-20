<?php
//认证前用户访问任意url，然后被重定向登录页面，session记录的是这个“任意url”.
$url = "http://pmgeco.com";
//跳转到登陆前页面.
 header("Location: ".$url);
?>
