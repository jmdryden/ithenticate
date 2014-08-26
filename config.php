<?php    

    // Checklist for resetting from TEST to PROD:
    //1. ADMIN_EMAIL back to Libby's
    //2. service_api_password back to licensed account
    //3. DEBUG to 0
    //4. BASE_DIR from /ithenticate to / (virtual host is the base url)
    //5. $affiliation, if necessary (ithenticate is "staff" but just in case).
    //6. does MY_HEADER_REDIRECT break anything?? "/_app/"
    
    error_reporting(E_ALL);
    ini_set('display_errors', 0);                 
    define('DEBUG', 0);        
    define("LDAP_HOST","ldaps://ldap.unm.edu:636");    
    define("LDAP_BASEDN","ou=People,o=University of New Mexico,c=US");
    define("LDAP_BINDDN",",ou=People,o=University of New Mexico,c=US");    
    define("MY_FILE", __DIR__."/registrations.csv");    
    define("BASE_DIR","/"); //switch off for production host.
    define("MY_HEADER_REDIRECT", "/_app/register.php");
    //define('ADMIN_EMAIL','jdryden@unm.edu'); 
    define('ADMIN_EMAIL','swdist@unm.edu');    //switch for production
    $htmlTitle = "iThenticate | The University of New Mexico";
    $affiliation = array("student","employee","staff","faculty"); 
    
    //ITHENTICATE SERVICE CREDENTIALS
    $service_api_user = 'jdryden@unm.edu';
    $service_api_password = "dghLmP822"; //prod do not test
    //$service_api_password = 'br_549'; //switch to br_549 for testing
    $service_api_url = "api.ithenticate.com";         

?>