<?php
/*
开发每个WEB程序都会由配置文件开始，最重要的4个作用分别是：
1、定义常量
2、建立站点范围内的设置
3、创建用户自定义函数
4、管理错误
*/


/* 
 *  File name: config.inc.php
 *  Created by: Larry E. Ullman
 *  Contact: Larry@LarryUllman.com, LarryUllman.com
 *  Last modified: June 5, 2012
 *  
 *  Configuration file does the following things:
 *  - Has site settings in one location.
 *  - Stores URLs and URIs as constants.
 *  - Sets how errors will be handled.
 */

# ******************** #
# ***** SETTINGS ***** #

// Errors are emailed here:
$contact_email = 'address@example.com'; 

// Determine whether we're working on a local server
// or on the real server:
$host = substr($_SERVER['HTTP_HOST'], 0, 5);
if (in_array($host, array('local', '127.0', '192.1'))) {
    $local = TRUE;
} else {
    $local = FALSE;
}

// Determine location of files and the URL of the site:
// Allow for development on different servers.
if ($local) {

    // Always debug when running locally:
    $debug = TRUE;
    
    // Define the constants:
    define('BASE_URI', '/path/to/html/folder/');//站点根目录在服务器上的绝对路径
    define('BASE_URL', 'http://localhost/directory/');//主机名和目录地址
    define('DB', '/path/to/mysql.inc.php');//数据库文件连接的绝对路径
    
} else {

    define('BASE_URI', '/path/to/live/html/folder/');
    define('BASE_URL', 'http://www.example.com/');
    define('DB', '/path/to/live/mysql.inc.php');
    
}
    
/* 
 *  Most important setting!
 *  The $debug variable is used to set error management.
 *  To debug a specific page, add this to the index.php page:

if ($p == 'thismodule') $debug = TRUE;
require('./includes/config.inc.php');

 *  To debug the entire site, do

$debug = TRUE;

 *  before this next conditional.
 */

// Assume debugging is off. 
if (!isset($debug)) {
    $debug = FALSE;
}

# ***** SETTINGS ***** #
# ******************** #


# **************************** #
# ***** ERROR MANAGEMENT ***** #

// Create the error handler:
function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars) {

    global $debug, $contact_email;
    
    // Build the error message:
    $message = "An error occurred in script '$e_file' on line $e_line: $e_message";
    
    // Append $e_vars to the $message:
    $message .= print_r($e_vars, 1);
    
    if ($debug) { // Show the error.
    
        echo '<div class="error">' . $message . '</div>';
        debug_print_backtrace();
        
    } else { 

        // Log the error:
        error_log ($message, 1, $contact_email); // Send email.

        // Only print an error message if the error isn't a notice or strict.
        if ( ($e_number != E_NOTICE) && ($e_number < 2048)) {
            echo '<div class="error">A system error occurred. We apologize for the inconvenience.</div>';
        }

    } // End of $debug IF.

} // End of my_error_handler() definition.

// Use my error handler:
set_error_handler('my_error_handler');

# ***** ERROR MANAGEMENT ***** #
# **************************** #


