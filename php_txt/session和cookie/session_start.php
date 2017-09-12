<?php

/*session_start — 启动新会话或者重用现有会话

session_start() 会创建新会话或者重用现有会话。 如果通过 GET 或者 POST 方式，或者使用 cookie 提交了会话 ID， 则会重用现有会话。
当会话自动开始或者通过 session_start() 手动开始的时候， PHP 内部会调用会话管理器的 open 和 read 回调函数。
 PHP 会自动反序列化数据并且填充 $_SESSION 超级全局变量。

要想使用命名会话，请在调用 session_start() 函数 之前调用 session_name() 函数。
如果启用了 session.use_trans_sid 选项， session_start() 函数会注册一个内部输出管理器， 该输出管理器完成 URL 重写的工作。

bool session_start ([ array $options = [] ] )

options:
此参数是一个关联数组，如果提供，那么会用其中的项目覆盖 会话配置指示 中的配置项。此数组中的键无需包含 session. 前缀。

返回值:
成功开始会话返回 TRUE ，反之返回 FALSE

*/

//Example #1 page1.php

<?php
// page1.php

session_start();

echo 'Welcome to page #1';

$_SESSION['favcolor'] = 'green';
$_SESSION['animal']   = 'cat';
$_SESSION['time']     = time();

// 如果使用 cookie 方式传送会话 ID
echo '<br /><a href="page2.php">page 2</a>';

// 如果不是使用 cookie 方式传送会话 ID，则使用 URL 改写的方式传送会话 ID
echo '<br /><a href="page2.php?' . SID . '">page 2</a>';
?>



/*
Session 函数 

session_abort — Discard session array changes and finish session
session_cache_expire — 返回当前缓存的到期时间
session_cache_limiter — 读取/设置缓存限制器
session_commit — session_write_close 的别名
session_create_id — Create new session id
session_decode — 解码会话数据
session_destroy — 销毁一个会话中的全部数据
session_encode — 将当前会话数据编码为一个字符串
session_gc — Perform session data garbage collection
session_get_cookie_params — 获取会话 cookie 参数
session_id — 获取/设置当前会话 ID
session_is_registered — 检查变量是否在会话中已经注册
session_module_name — 获取/设置会话模块名称
session_name — 读取/设置会话名称
session_regenerate_id — 使用新生成的会话 ID 更新现有会话 ID
session_register_shutdown — 关闭会话
session_register — Register one or more global variables with the current session
session_reset — Re-initialize session array with original values
session_save_path — 读取/设置当前会话的保存路径
session_set_cookie_params — 设置会话 cookie 参数
session_set_save_handler — 设置用户自定义会话存储函数
session_start — 启动新会话或者重用现有会话
session_status — 返回当前会话状态
session_unregister — Unregister a global variable from the current session
session_unset — 释放所有的会话变量
session_write_close — Write session data and end session

*/

//Example #2 page2.php

<?php
// page2.php

session_start();

echo 'Welcome to page #2<br />';

echo $_SESSION['favcolor']; // green
echo $_SESSION['animal'];   // cat
echo date('Y m d H:i:s', $_SESSION['time']);

// 类似 page1.php 中的代码，你可能需要在这里处理使用 SID 的场景
echo '<br /><a href="page1.php">page 1</a>';
?>

/*


Example #3 覆盖 Cookie 超时时间设定

<?php
// 设置 cookie 的有效时间为 1 天
session_start([
    'cookie_lifetime' => 86400,
]);
?>


Example #4 读取会话之后立即关闭会话存储文件

<?php
// 如果确定不修改会话中的数据，
// 我们可以在会话文件读取完毕之后立即关闭它
// 来避免由于给会话文件加锁导致其他页面阻塞
session_start([
    'cookie_lifetime' => 86400,
    'read_and_close'  => true,
]);

Note:
要使用基于 cookie 的会话， 必须在输出开始之前调用 session_start() 函数。

*/














