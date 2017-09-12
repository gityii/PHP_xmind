<?php

/*

Session 的工作机制是：为每个访问者创建一个唯一的 id (UID)，并基于这个 UID 来存储变量。UID 存储在 cookie 中，亦或通过 URL 进行传导。

session用来存储用户登录信息和用在跨页面传值。
1）常用在用户登录成功后，将用户登录信息赋值给session；
2）用在验证码图片生成，当随机码生成后赋值给session。

session在web开发中具有非常重要的份量。它可以将用户正确登录后的信息记录到服务器的内存中，当用户以此身份访问网站的管理后台时，无需再次登录即可得到身份确认。而没有正确登录的用户则不分配session空间，即便输入了管理后台的访问地址也不能看到页面内容。通过session确定了用户对页面的操作权限。


使用session的时候，通过什么来表示当前用户，从而与其他用户进行区分？
sessionid，通过session_id()函数可以取得当前的session_id。
*/


/*
开始 PHP Session
在您把用户信息存储到 PHP session 中之前，首先必须启动会话。
注释：session_start() 函数必须位于 <html> 标签之前：
*/
<?php session_start(); ?>

<html>
<body>

</body>
</html>


//上面的代码会向服务器注册用户的会话，以便您可以开始保存用户信息，同时会为用户会话分配一个 UID。


/*
存储 Session 变量
存储和取回 session 变量的正确方法是使用 PHP $_SESSION 变量：
*/
<?php
session_start();
// store session data
$_SESSION['views']=1;
?>

<html>
<body>

<?php
//retrieve session data
echo "Pageviews=". $_SESSION['views'];
?>

</body>
</html>



//如果您希望删除某些 session 数据，可以使用 unset() 或 session_destroy() 函数。
//unset() 函数用于释放指定的 session 变量：
<?php
unset($_SESSION['views']);
?>
//您也可以通过 session_destroy() 函数彻底终结 session：
<?php
session_destroy();
?>
//注释：session_destroy() 将重置 session，您将失去所有已存储的 session 数据。


