<?php    
   error_reporting(E_ALL);
    ini_set('display_errors', 0);                 
    define('DEBUG', 0);        
    define("LDAP_HOST","ldaps://ldap.unm.edu:636");    
    define("LDAP_BASEDN","ou=People,o=University of New Mexico,c=US");
    define("LDAP_BINDDN",",ou=People,o=University of New Mexico,c=US");    
    define("MY_FILE", __DIR__."/registrations.csv");    
    //define('ADMIN_EMAIL','jdryden@unm.edu');
    define('ADMIN_EMAIL','swdist@unm.edu');    
    $affiliation = 'STAFF'; //third parameter to verifyCredentials and returned as $_SESSION['person'].
    
    
?>