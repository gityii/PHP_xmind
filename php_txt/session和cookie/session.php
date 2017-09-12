<?php

/*
session就是一种工作机制，是一个全局变量

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




/*

无状态性

Http是一种无状态性的协议。这是因为此种协议不要求浏览器在每次请求中标明它自己的身份，并且浏览器以及服务器之间并没有保持一个持久性的连接用于多个页面之间的访问。当一个用户访问一个站点的时候，用户的浏览器发送一个http请求到服务器，服务器返回给浏览器一个http响应。其实很简单的一个概念，客户端一个请求，服务器端一个回复，这就是整个基于http协议的通讯过程。

因为web应用程序是基于http协议进行通讯的，而我们已经讲过了http是无状态的，这就增加了维护web应用程序状态的难度, 对于开发者来说，是一个不小的挑战。Cookies是作为http的一个扩展诞生的，其主要用途是弥补http的无状态特性，提供了一种保持客户端与服务器端之间状态的途径，但是由于出于安全性的考虑，有的用户在浏览器中是禁止掉cookie的。这种情况下，状态信息只能通过url中的参数来传递到服务器端，不过这种方式的安全性很差。事实上，按照通常的想法，应该有客户端来表明自己的身份，从而和服务器之间维持一种状态，但是出于安全性方面的考虑，我们都应该明白一点 – 来自客户端的信息都是不能完全信任的。

尽管这样，针对维持web应用程序状态的问题，相对来说，还是有比较优雅的解决方案的。不过，应该说是没有完美的解决方案的，再好的解决方案也不可能适用所有的情况。这篇文章将介绍一些技术。这些技术可以用来比较稳定地维持应用程序的状态以及抵御一些针对session的攻击，比如会话劫持。并且你可以学习到cookie是怎样工作的，php 的session做了那些事情，以及怎样才能劫持session。


HTTP 概览
如何才能保持web应用程序的状态以及选择最合适的解决方案呢？在回答这个问题之前，必须得先了解web的底层协议 – Hypertext Transfer Protocol (HTTP)。
当用户访问http://example.com这个域名的时候，浏览器就会自动和服务器建立tcp/ip连接，然后发送http请求到example.com的服务器的80端口。该个请求的语法如下所示：

GET / HTTP/1.1
Host: example.org
以上第一行叫做请求行，第二个参数（一个反斜线在这个例子中）表示所请求资源的路径。反斜线代表了根目录；服务器会转换这个根目录为服务器文件系统中的一个具体目录。

Apache的用户常用DocumentRoot这个命令来设置这个文档根路径。如果请求的url是http://example.org/path/to/script.php,那么请求的路径就是/path/to/script.php。假如document root 被定义为usr/lcoal/apache/htdocs的话,整个请求的资源路径就是/usr/local/apache/htdocs/path/to/script.php。

第二行描述的是http头部的语法。在这个例子中的头部是Host, 它标识了浏览器希望获取资源的域名主机。还有很多其它的请求头部可以包含在http请求中，比如user-Agent头部，在php可以通过$_SERVER['HTTP_USER_AGENT']获取请求中所携带的这个头部信息。

但是遗憾的是，在这个请求例子中，没有任何信息可以唯一标识当前这个发出请求的客户端。有些开发者借助请求中的ip头部来唯一标识发出此次请求的客户端，但是这种方式存在很多问题。因为，有些用户是通过代理来访问的，比如用户A通过代理B连接网站www.example.com, 服务器端获取的ip信息是代理B分配给A的ip地址，如果用户这时断开代理，然后再次连接代理的话，它的代理ip地址又再次改变，也就说一个用户对应了多个ip地址，这种情况下，服务器端根据ip地址来标识用户的话，会认为请求是来自不同的用户，事实上是同一个用户。 还用另外一种情况就是，比如很多用户是在同一个局域网里通过路由连接互联网，然后都访问www.example.com的话，由于这些用户共享同一个外网ip地址，这会导致服务器认为这些用户是同一个用户发出的请求，因为他们是来自同一个ip地址的访问。

保持应用程序状态的第一步就是要知道如何来唯一地标识每个客户端。因为只有在http中请求中携带的信息才能用来标识客户端，所以在请求中必须包含某种可以用来标识客户端唯一身份的信息。Cookie设计出来就是用来解决这一问题的。



Cookies:
如果你把Cookies看成为http协议的一个扩展的话，理解起来就容易的多了，其实本质上cookies就是http的一个扩展。有两个http头部是专门负责设置以及发送cookie的,它们分别是Set-Cookie以及Cookie。当服务器返回给客户端一个http响应信息时，其中如果包含Set-Cookie这个头部时，意思就是指示客户端建立一个cookie，并且在后续的http请求中自动发送这个cookie到服务器端，直到这个cookie过期。如果cookie的生存时间是整个会话期间的话，那么浏览器会将cookie保存在内存中，浏览器关闭时就会自动清除这个cookie。另外一种情况就是保存在客户端的硬盘中，浏览器关闭的话，该cookie也不会被清除，下次打开浏览器访问对应网站时，这个cookie就会自动再次发送到服务器端。一个cookie的设置以及发送过程分为以下四步：

客户端发送一个http请求到服务器端
服务器端发送一个http响应到客户端，其中包含Set-Cookie头部
客户端发送一个http请求到服务器端，其中包含Cookie头部
服务器端发送一个http响应到客户端


在客户端的第二次请求中包含的Cookie头部中，提供给了服务器端可以用来唯一标识客户端身份的信息。这时，服务器端也就可以判断客户端是否启用了cookies。尽管，用户可能在和应用程序交互的过程中突然禁用cookies的使用，但是，这个情况基本是不太可能发生的，所以可以不加以考虑，这在实践中也被证明是对的。

GET and POST Data:
除了cookies,客户端还可以将发送给服务器的数据包含在请求的url中，比如请求的参数或者请求的路径中。 我们来看一个例子：

GET /index.php?foo=bar HTTP/1.1
Host: example.org

以上就是一个常规的http get 请求，该get请求发送到example.org域名对应的web 服务器下的index.php脚本, 在index.php脚本中，可以通过$_GET['foo']来获取对应的url中foo参数的值，也就是’bar’。大多数php开发者都称这样的数据会GET数据，也有少数称它为查询数据或者url变量。但是大家需要注意一点，不是说GET数据就只能包含在HTTP GET类型的请求中，在HTTP POST类型的请求中同样可以包含GET数据，只要将相关GET数据包含在请求的url中即可，也就是说GET数据的传递不依赖与具体请求的类型。 
另外一种客户端传递数据到服务器端的方式是将数据包含在http请求的内容区域内。 这种方式需要请求的类型是POST的，看下面一个例子：

POST /index.php HTTP/1.1
Host: example.org
Content-Type: application/x-www-form-urlencoded 
Content-Length: 7 

foo=bar

在这种情况下，在脚本index.php可以通过调用$_POST['foo']来获取对应的值bar。开发者称这个数据为POST数据,也就是大家熟知的form以post方式提交请求的方式。


在一个请求中，可以同时包含这两种形式的数据：

POST /index.php?myget=foo HTTP/1.1
Host: example.orgContent-Type: application/x-www-form-urlencoded 
Content-Length: 11 

mypost=bar

这两种传递数据的方式，比起用cookies来传递数据更稳定，因为cookie可能被禁用，但是以GET以及POST方式传递数据时，不存在这种情况。我们可以将PHPSESSID包含在http请求的url中，就像下面的例子一样：


GET /index.php?PHPSESSID=12345 HTTP/1.1
Host: example.org

尽管以POST的方式来传递session id的话，相对GET的方式来说，会安全的多。但是，这种方式的缺点就是比较麻烦，因为这样的话，在你的应用程序中比较将所有的请求都转换成post的请求，这显然是不太合适的。


Session的管理:
直到现在，我只讨论了如何维护应用程序的状态，只是简单地涉及到了如果保持请求之间的关系。接下来，我阐述下在实际中用到比较多的技术 – Session的管理。涉及到session的管理，就不是单单地维持各个请求之间的状态，还需要维持会话期间针对每个特定用户使用到的数据。我们常常把这种数据叫做session数据，因为这些数据是跟某个特定用户与服务器之间的会话相关联的。如果你使用php内置的session的管理机制，那么session数据一般是保存在/tmp这个服务器端的文件夹中，并且其中的session数据会被自动地保存到超级数组$_SESSION中。一个最简单的使用session的例子，就是将相关的session数据从一个页面传递(注意：实际传递的是session id)到另一个页面。下面用示例代码1, start.php, 对这个例子加以演示：

<?php
session_start();
$_SESSION['foo'] = 'bar';
?>
<a href="continue.php">continue.php</a>
假如用户点击start.php中的链接访问continue.php,那么在continue.php中就可以通过$_SESSION['foo']获取在start.php中的定义的值’bar’。看下面的示例代码2:

示例代码2 – continue.php

<?php
session_start();
echo $_SESSION['foo']; // bar
?>

是不是非常简单，但是我要指出的话，如果你真的这样来写代码的话，说明你对php底层的对于session的实现机制还不是非常了解透彻。在不了解php内部给你自动做了多少事情的情况下，你会发现如果程序出错的话，这样的代码将变的很难调试，事实上，这样的代码也完全没有安全性可言。 


Session的安全性问题:
一直以来很多开发者都认为php内置的session管理机制是具有一定的安全性，可以对一般的session攻击起到防御。事实上，这是一种误解，php团队只实现了一种方便有效的机制。具体的安全措施，应该有应用程序的开发团队来实施。 就像开篇谈到的，没有最好的解决方案，只有最合适你的方案。

现在，我们来看下一个比较常规的针对session的攻击：
用户访问http://www.example.org，并且登录。
example.org的服务器设置指示客户端设置相关cookie – PHPSESSID=12345
攻击者这时访问http://www.example.org/,并且在请求中携带了对应的cookie – PHPSESSID=12345
这样情况下，因为example.orge的服务器通过PHPSESSID来辨认对应的用户的，所以服务器错把攻击者当成了合法的用户。

当然这种攻击的方式，前提条件是攻击者必须通过某种手段固定，劫持或者猜测出某个合法用户的PHPSESSID。虽然这看起来难度很高，但是也不是不可能的事情。



安全性的加强:
有很多技术可以用来加强Session的安全性，主要思想就是要使验证的过程对于合法用户来说，越简单越好，然后对于攻击者来说，步骤要越复杂越好。当然，这似乎是比较难于平衡的，要根据你应用程序的具体设计来做决策。

最简单的居于HTTP/1.1请求包括请求行以及一些Host的头部：

GET / HTTP/1.1
Host: example.org
如果客户端通过PHPSESSID传递相关的session标识符，可以将PHPSESSID放在cookie头部中进行传递:


GET / HTTP/1.1
Host: example.org
Cookie: PHPSESSID=12345
同样地，客户端也可以将session标识符放在请求的url中进行传递。

GET /?PHPSESSID=12345 
HTTP/1.1Host: example.org
当然，session标识符也可以包含在POST数据中，但是这对用户体验有影响，所以这种方式很少采用。

作为一个开发者，可以肯定session ID是不能被猜测出来的，但是还是有可能被攻击者使用某些方法获取到。所以，必须采取一些额外的安全措施来防止此类情况在你的应用程序中发生。

实际上，一个标准的HTTP请求中除了Host等必须包含的头部，还包含了一些可选的头部.举一个例子，看下面的一个请求：

GET / HTTP/1.1
Host: example.org
Cookie: PHPSESSID=12345
User-Agent: Mozilla/5.0 (Macintosh; U; Intel Mac OS X; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1
Accept: text/html;q=0.9, ;q=0.1
Accept-Charset: ISO-8859-1, utf-8;q=0.66, *;q=0.66
Accept-Language: en


我们可以看到，在以上的一个请求例子中包含了四个额外的头部，分别是User-Agent, Accept, Accept-Charset以及Accept-Language。因为这些头部不是必须的，所以完全依赖他们在你的应用程序中发挥作用是不太明智的。但是，如果一个用户的浏览器确实发送了这些头部到服务器，那么可以肯定的是在接下来的同一个用户通过同一个浏览器发送的请求中，必然也会携带这些头部。当然，这其中也会有极少数的特殊情况发生。假如以上例子是由一个当前的跟服务器建立了会话的用户发出的请求，考虑下面的一个请求：

GET / HTTP/1.1
Host: example.org
Cookie: PHPSESSID=12345
User-Agent: Mozilla/5.0


像这种情况下，发现浏览器的头部改变了，但是不能肯定这是否是一次来自攻击者的请求的话，比较好的措施就是弹出一个要求输入密码的输入框让用户输入，这样的话，对用户体验的影响不会很大，又能很有效地防止攻击。

当然，你可以在系统中加入核查User-Agent头部的代码，类似示例3中的代码：


示例代码3

<?php 

session_start(); 

if (md5($_SERVER['HTTP_USER_AGENT']) != $_SESSION['HTTP_USER_AGENT']) 
{&nbsp;&nbsp;/* 弹出密码输入框 */&nbsp;&nbsp;exit;
} 

?>













































