<?php # Script 2.4 - index.php

/* 
 *  This is the main page.
 *  This page includes the configuration file, 
 *  the templates, and any content-specific modules.
 */

// Require the configuration file before any PHP code:
require('./includes/config.inc.php');

// Validate what page to show:
if (isset($_GET['p'])) {
    $p = $_GET['p'];
} elseif (isset($_POST['p'])) { // Forms，当大部分表单提交时，这个值会通过$_POST发送
    $p = $_POST['p'];
} else {
    $p = NULL;
}

// Determine what page to display:
switch ($p) {

    case 'about':
        $page = 'about.inc.php';
        $page_title = 'About This Site';
        break;
    
    case 'contact':
        $page = 'contact.inc.php';
        $page_title = 'Contact Us';
        break;
    
    case 'search':
        $page = 'search.inc.php';
        $page_title = 'Search Results';
        break;
    
    // Default is to include the main page.
    default:
        $page = 'main.inc.php';
        $page_title = 'Site Home Page';
        break;
        
} // End of main switch.

// Make sure the file exists:
if (!file_exists('./modules/' . $page)) {
    $page = 'main.inc.php';
    $page_title = 'Site Home Page';
}

// Include the header file:
include('./includes/header.html');

// Include the content-specific module:
// $page is determined from the above switch.
include('./modules/' . $page);

// Include the footer file to complete the template:
include('./includes/footer.html');

?>