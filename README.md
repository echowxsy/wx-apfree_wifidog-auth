# wx-apfree_wifidog-auth
基于Apfree_wifidog的微信认证服务端

### 接口说明

#### auth

index.php 此接口用于确认网关返回到信息，通过返回`Auth: 1`（注意 1 前面的空格是必须的）。

#### login

index.php 用于判断客户端类型，跳转不同的页面

index-pc.php PC端认证页面，需要使用手机扫描二维码

index-phone.php 手机端认证页面，会跳转到微信连 Wi-Fi 的界面

#### portal

index.php 跳转认证完成之后的页面

#### ping

index.php 判断认证服务器是否在线的接口