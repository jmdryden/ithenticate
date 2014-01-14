<?PHP    
    session_start();     
    include 'config.php';    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php

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
            
                 header('Location: /_app/register.php?');
                //$_error = '<div id="status" class="errors">Debug: Verified Credential, go on to registration: http://turnitin.unm.edu/register.php? </div><br/>';                
                    
        } else {      

                $_error = '<div id="status" class="errors">Sorry, the NetID or Password that was entered is invalid or expired.</div><br />';
              
        }
    } //END POST submission
}    
?>


<?PHP
// PRE-POST
echo '    
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>The University of New Mexico</title>
        <!--[if gte IE 6]><style type="text/css" media="screen">
            @import \'https://login.unm.edu/cas/css/ie_cas.css\';</style>
        <![endif]-->
        <script type="text/javascript" src="https://login.unm.edu/cas/js/common_rosters.js"></script>
        <link rel="icon" href="https://login.unm.edu/cas/favicon.ico" type="image/x-icon" />
        <link href="https://login.unm.edu/cas/css/cas.css" rel="stylesheet" type="text/css" />

        <script>
            (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');

            ga(\'create\', \'UA-208XXXXX-XX\', \'unm.edu\');
            ga(\'send\', \'pageview\');
        </script>
    </head>
    <body id="cas" onload="init();">
    
    <div id="login_area" style="padding-bottom: 30px;>
        <a href="http://www.unm.edu">
            <img src="https://www.unm.edu/common/images/unm_logo.gif" alt="The University of New Mexico" />
        </a>
        <div id="login_action" >
            <form method="post" action="' . $_SERVER['PHP_SELF'] . '">
                 ' . $_error . '
                <div class="box" id="login">                
                    <h2>Enter your NetID and Password</h2>                                                       
                    <div class="row">
                        <label for="username"><span class="accesskey">N</span>etID:</label>
                        <input id="username" name="username" class="required" tabindex="1" accesskey="n" type="text" value="" size="25
    " autocomplete="false"/>
                    </div>
                    <div class="row">
                        <label for="password"><span class="accesskey">P</span>assword:</label>
                        <input id="password" name="password" class="required" tabindex="2" accesskey="p" type="password" value="" size
    ="25" autocomplete="off"/>
                    </div>
                    <div class="row check">
                        <input id="warn" name="warn" value="true" tabindex="3" accesskey="w" type="checkbox" />
                        <label for="warn"><span class="accesskey">W</span>arn me before logging me into other sites.</label>
                    </div>
                    <div class="row btn-row">
                        <input type="hidden" name="lt" value="_cB4A1B38D-DE2F-7129-E99B-BD9999EBD7E7_kEADAC7DC-CF12-E4D3-A060-1D6A407C
    7F87" />
                        <input type="hidden" name="_eventId" value="submit" />
                        <input class="btn-submit" name="submit" accesskey="l" value="LOGIN" tabindex="4" type="submit" />
                        <input class="btn-reset" name="reset" accesskey="c" value="CLEAR" tabindex="5" type="reset" />
                    </div>
                </div>
            </form>
        </div>
        <div class="box" id="login_info" >
            <ul>
                <li> <a href="http://netid.unm.edu">Create a UNM NetID</a></li>
                <li> <a href="http://netid.unm.edu">Reset Password</a></li>
                <li> <a href="http://netid.unm.edu">Change Password</a></li>
            </ul>
            <p><strong>For security reasons, quit your web browser when you are done accessing services that require authentication!</
    strong></p>
            <p style="font-size:.9em">
                Be wary of any program or web page that asks you for your
                NetID and password. Secure UNM web pages that ask you for
                your NetID and password will generally have URLs that begin
                with &quot;https://login.unm.edu&quot;.<br/><br/>
                In addition, your browser should visually indicate that you
                are accessing a secure page.
            </p>
        </div>
    </div>
    </body>
</html>
';

function verifyCredentials($username,$password,$affiliation) {
    
    $success = false; // to return true, supplied username/password must bind
    if (empty($username) || empty($password))
        return false;    
    
    $connect = ldap_connect(LDAP_HOST);                    
    
    if ($connect) {        
        
        $bind = ldap_bind($connect, 'UID=' . $username . '' . LDAP_BINDDN, $password);
        if ($bind) {   
            //$read = ldap_search($connect, 'ou=People,o=University of New Mexico,c=US', "UID=".$username);
            $read = ldap_search($connect, LDAP_BASEDN, "UID=".$username);
            $info = ldap_get_entries($connect, $read);
            
            if ($info['count'] != 1) {                                 
                return false;							
            } elseif (ldap_bind($connect, $info[0]['dn'], $password)) {	
                
                $key = array_search($affiliation, $info[0]['edupersonaffiliation']);
                    
                // 'person' will not be set if needle is not matched.
                $_SESSION['person'] = strtolower($info[0]['edupersonaffiliation'][$key]);
                $_SESSION['fname'] = $info[0]['givenname'][0];
                $_SESSION['lname'] = $info[0]['sn'][0];
                $_SESSION['mail'] = $info[0]['mail'][0];
                $_SESSION['dept'] = $info[0]['ou'][0];
                
                $success = true;                    
                
            }
        }
        
        ldap_close($connect);           // Close ldap connection
        
    } //end CONNECT

    if ($success)  {        
        return true;        
    } else {
        return false;	
    
    }
}

?>