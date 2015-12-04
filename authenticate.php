<?PHP    
    session_start();     
    include 'config.php';      

    if ($_POST['submit'] == 'LOGIN')  {
        if ($_POST['username'] == '' || $_POST['password'] == '')    {
            $_error = '<div id="status" class="errors">Username is a required field.
                <br/><br />
                Password is a required field.
                </div><br />';
        } else {               

            //need some sanitization here before go live...
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];

            if (verifyCredentials($username,$password,$affiliation)) {
              
                header('Location: ' . MY_HEADER_REDIRECT);
                //$_error = '<div id="status" class="errors">Debug: Verified Credential, go on to registration: http://turnitin.unm.edu/register.php? </div><br/>';                

            } else {      

                    $_error = '<div id="status" class="errors">Sorry, the NetID or Password that was entered is invalid or expired.</div><br />';

            }
        } //END POST submission
    }    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <title>iThenticate | The University of New Mexico</title>        		
        <link type="text/css" rel="stylesheet" href="https://login.unm.edu/cas/css/cas.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="icon" href="https://login.unm.edu/cas/favicon.ico" type="image/x-icon" />
    </head>
    <body id="cas" class="fl-theme-iphone">
    <div class="flc-screenNavigator-view-container">
        <div class="fl-screenNavigator-view">
            <div id="header" class="flc-screenNavigator-navbar fl-navbar fl-table">
				<h1 id="company-name">The University of New Mexico</h1>
                <h1 id="app-name" class="fl-table-cell"><strong>iThenticate Authentication</strong> </h1>
            </div>		
            <div id="content" class="fl-screenNavigator-scroll-container">

            <div class="box fl-panel" id="login">
                <form id="fm1" class="fm-v clearfix" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                                        
                <?php echo $_error; ?>
                
                    <h2>Enter your Username and Password</h2>
                    <div class="row fl-controls-left">
                            <label for="username" class="fl-label"><span class="accesskey">U</span>sername:</label>						
                            <input id="username" name="username" class="required" tabindex="1" accesskey="u" type="text" value="" size="25" autocomplete="false"/>

                    </div>
                    <div class="row fl-controls-left">
                            <label for="password" class="fl-label"><span class="accesskey">P</span>assword:</label>
                            <input id="password" name="password" class="required" tabindex="2" accesskey="p" type="password" value="" size="25" autocomplete="off"/>
                    </div>
                    <div class="row check">
                            <input id="warn" name="warn" value="true" tabindex="3" accesskey="w" type="checkbox" />
                            <label for="warn"><span class="accesskey">W</span>arn me before logging me into other sites.</label>
                    </div>
                    <div class="row btn-row">
                        <input type="hidden" name="lt" value="_cB4A1B38D-DE2F-7129-E99B-BD9999EBD7E7_kEADAC7DC-CF12-E4D3-A060-1D6A407C7F87" />
                        <input type="hidden" name="_eventId" value="submit" />
                        <input class="btn-submit" name="submit" accesskey="l" value="LOGIN" tabindex="4" type="submit" />
                        <input class="btn-reset" name="reset" accesskey="c" value="CLEAR" tabindex="5" type="reset" />
                    </div>
                </form>
            </div>
            
            <div id="sidebar">
	      <div class="sidebar-content">
                <p class="fl-panel fl-note fl-bevel-white fl-font-size-80"><b>For security reasons, quit your web browser when you are done accessing services that require authentication!</b><p>Be wary of any program or web page that asks you for your NetID and password. Secure UNM web pages that ask you for your NetID and password will generally have URLs that begin with "https://login.unm.edu" </b> In addition, your browser should visually indicate that you are accessing a secure page.</p>
                <div class="box" id="login_info"> 
                <h3>Need help with your NetID?:</h3>
                
                  <li><a href="http://netid.unm.edu">Create a UNM NetID</a></li>
                  <li><a href="http://netid.unm.edu">Reset Password</a></li>
                  <li><a href="http://netid.unm.edu">Change Password</a></li>
                
                </div>
              </div>
            </div>
    </div>
</div>


    <div class="GroupLargeMargin">
        <div class="TextSizeLarge">
            <span id="STSFooter">
                <b>Sensitive and Protected Information Statement:</b>
                <br><br>
                When using UNM online services, you agree to act in accordance with applicable laws, regulations, and also in accordance with The University of New Mexico policies, procedures and operational controls regarding UNM sensitive and protected data as identified in UNM Policy <a href='http://policy.unm.edu/university-policies/2000/2520.html'>2520</a>, which states: &quotUsers are responsible for proper use and protection of University information and are prohibited from sharing information with unauthorized individuals.&quot <a href='http://policy.unm.edu/university-policies/2000/2520.html'>2520</a> also states &quotAccess to ... sensitive and protected information must be authorized by the department head and approved by the University designated data custodian.&quot
                <br><br>
                For assistance with the operational controls for HIPAA information, please consult the HSC Privacy Office; for assistance with FERPA information, please consult the UNM Registrar. For all other sensitive or protected data, please open a HELP ticket, and the UNM Information Security and Privacy team will assist you in identifying the appropriate data steward.

            </span>
        </div>
    </div>
</div>
	<script type="text/javascript" src="/cas/js/custom.js"></script>
    </body>
</html>

<?php 
    function verifyCredentials($username,$password,$affiliation) {        
        $success = false; // to return true, supplied username/password must bind
        if (empty($username) || empty($password))
            return false;

        $connect = ldap_connect(LDAP_HOST);                        

        if ($connect) {
            
            // Bind with aci account credentials 
            //$bind = ldap_bind($connect, 'UID=' . $username . '' . LDAP_BINDDN, $password);
            $bind = ldap_bind($connect, 'uid=webteamapps,ou=SystemAccounts,o=university of new mexico,c=us', '3vT#mgb4');
            if ($bind) {            

                $read = ldap_search($connect, LDAP_BASEDN, "UID=".$username);                    
                $info = ldap_get_entries($connect, $read);

                if ($info['count'] != 1) {
                    // Username not found or multiple found
                    return false;							
                } elseif (@ldap_bind($connect, $info[0]['dn'], $password)) {

                    $key = array_search($affiliation, $info[0]['edupersonaffiliation']);

                    foreach ($affiliation as $i => $val) {
                        if (in_array(strtoupper($val), $info[0]['edupersonaffiliation'])) {
                            $_SESSION['person'] = $val;
                            break;
                        } else {
                            $_SESSION['person'] = "NOTFOUND";
                        }   

                    }

                    $_SESSION['fname'] = $info[0]['givenname'][0];
                    $_SESSION['lname'] = $info[0]['sn'][0];
                    $_SESSION['mail'] = $info[0]['mail'][0];
                    $_SESSION['dept'] = $info[0]['ou'][0];

                    $success = true;                       

                }
            }

            ldap_close($connect);                   
        } 

        if ($success)
            return true;
        else
            return false;					
    }