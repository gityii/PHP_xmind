<?php # Script 2.6 - search.inc.php

/* 
 *  This is the search content module.
 *  This page is included by index.php.
 *  This page expects to receive $_GET['terms'].
 */

// Redirect if this page was accessed directly:
if (!defined('BASE_URL')) {

    // Need the BASE_URL, defined in the config file:
    require('../includes/config.inc.php');
    
    // Redirect to the index page:
    $url = BASE_URL . 'index.php?p=search';
    
    // Pass along search terms?
    if (isset($_GET['terms'])) {
        $url .= '&terms=' . urlencode($_GET['terms']);
    }
    
    header ("Location: $url");
    exit;
    
} // End of defined() IF.

// Print a caption:
echo '<h1>Search Results</h1>';

// Display the search results if the form
// has been submitted.
if (isset($_GET['terms']) && ($_GET['terms'] != 'Search...') ) {

    // Query the database.
    // Fetch the results.
    // Print the results:
    for ($i = 1; $i <= 10; $i++) {
        echo <<<EOT
<h4><a href="#">Search Result #$i</a></h4>
<p>This is some description. This is some description. This is some description. This is some description.</p>\n
EOT;
    }

} else { // Tell them to use the search form.
    echo '<p class="error">Please use the search form to search this site.</p>';
}