<?PHP    
    session_start();          
    include_once('config.php');
    $person = $_SESSION['person'];    
    include("xmlrpc-3.0.0.beta/lib/xmlrpc.inc"); //the xml toolkit for sending/parsing xml.                                   
    include('functions/views.php');
    $errmsg = '';
?>

<?php
    echo(htmlHead($title));
    echo(htmlBody());    
                    
    if ($_REQUEST['cmd'] !== 'register') { //Pre-Post or trying to logout.                                   
        
        if ($_REQUEST['action'] == 'logout') {
                $_SESSION = array();
                if (ini_get("session.use_cookies")) {
                    $params = session_get_cookie_params();
                    setcookie(
                                session_name(), '', time() - 42000,
                                $params["path"], $params["domain"],
                                $params["secure"], $params["httponly"]
                    );
                }
                session_destroy();
                
                print('<h1>Logged out</h1>');
                die('Return to <a href="http://ithenticate.unm.edu">ithenticate.unm.edu</a>');
                
        }
        
        //function does view decision making on 'staff' or 'faculty'.                             
        echo(isset($_SESSION['person']) ? '<h1>iThenticate account registration</h1><hr />'  : '<h1>Access is restricted<hr></h1>');
        echo(show_form($person));                            
        
        
    } else { //We are POSTING and calling service.                            
                            
        $v = new xmlrpcval( array(			                            
                                    "password" => new xmlrpcval($service_api_password), //account #36346 is prod
                                    "username" => new xmlrpcval($service_api_user)
                                  ), "struct");        
                            
        $action = new xmlrpcmsg('login', array(php_xmlrpc_encode($v))); //returns the formatted xmlrpcval		
                            
        //$client=new xmlrpc_client($server_path, $server_hostname, $server_port);
        $c = new xmlrpc_client("/rpc", "api.ithenticate.com", 443, "https");

        //$c->return_type = 'phpvals';
        $c->setDebug(DEBUG); //1 will print contents of response header.            
        $c->setSSLVerifyPeer(1);
        $c->setSSLVerifyHost(1);                            

        $r =& $c->send($action);
                            
        if(!$r->faultCode()) { //4 Login call is good, make list user call.                
                                
            $v = $r->value(); //this is a xmlrpcval object that will be decoded.                
            $call_id = php_xmlrpc_decode($v); // $call['sid'] needs to be msg in subsequent calls.                                                                                            
    
            $msg_val = new xmlrpcval( 
                    array("sid" => new xmlrpcval($call_id['sid']) ), "struct"
                        );
                                
            $msgStatus = new xmlrpcmsg('user.list', array(php_xmlrpc_encode($msg_val)));

            $userList = $c->send($msgStatus); //Get list of users to check against current user request.
            $errmsg = array(); //stack error mesgs for display.
                                
            if ($userList->faultCode()) {
                                    $errmsg[] = printf('<strong>Userlist Fault Code:</strong>%s<br />',$userList->faultCode());            
                                    $errmsg[] = printf('<strong>Userlist Fault string:</strong>%s<br />',$userList->faultString());                                                          
            }

            $list = php_xmlrpc_decode($userList->value()); //my userlist
                                
            foreach ($list['users'] as $i => $v) {
                //if ($v['email'] == $_REQUEST['email']) {
                if (strtolower($v['email']) == strtolower($_REQUEST['mail'])) {
                    echo "<h2>Error: cannot create account.</h2>";            
                    die("<h4><strong>Your email address is already associated with a user account, perhaps you have previously
                        created a registration. Please <a href=\"".$_SERVER['PHP_SELF']."?action=logout\">logout</a> and contact Software Distribution Staff if you have a question.</h3>");
                }
            }                                                                   
                                
            $my_password = randomPassword();
            //compose call to create a user--
            $msg_val = new xmlrpcval( array(	                
                                            "sid" => new xmlrpcval($call_id['sid']),                                    
                                            "first_name" => new xmlrpcval($_SESSION['fname']),
                                            "last_name" => new xmlrpcval($_SESSION['lname']),                                            
                                            "email" => new xmlrpcval($_SESSION['mail']),
                                            "password" => new xmlrpcval($my_password),
                                            "timezone" => new xmlrpcval('371')
                                            ), "struct");

            $userAdd = new xmlrpcmsg('user.add', array(php_xmlrpc_encode($msg_val)));
            $res = $c->send($userAdd);

            if ($res->faultCode()) {
                        $errmsg[] = $res->faultCode();
                        $errmsg[] = $res->faultString();
            } 


        }  else { //Login failed and display error
                    printf('<strong>Service Login Failed with code:</strong>%s<br />',$r->faultCode());            
                    printf('<strong>Service Failure message:</strong>%s<br />',$r->faultString());            
        }
        
        if ($errmsg) {
            foreach ($errmsg as $val) {
                echo("Error: " . $val);
            } 
        } else { //user add completed
                        
            adminEmail($_REQUEST);
            
            echo "<h2>Thank you. Your ithenticate.com account has been created!</h2>";            
            echo('An email message has been sent to: "'.$_SESSION['mail'].'", with login instructions.
                If you have questions, please contact the IT Software distribution desk. 
                Please <a href=\"'.$_SERVER['PHP_SELF'].'"?action=logout\">logout</a><br />');
                
        }

    } //END of POST
                            
    
       
        
?>
        </p>

        <img alt="" class="center full_bleed" height="293" src="./common/images/header_sm.jpg" width="720" />
        <div id="after_default_1" ></div>
        <div id="after_default_2" ></div>            
        </div>
        </div> <!-- end of id=content -->
      
        <div id="secondary_aside">
            <div class="content">
                <div id="secondary_aside_1" ></div>
                <div id="secondary_aside_2" ></div>
                <div id="secondary_aside_3" ></div>
                <div id="secondary_aside_4" ></div>
            </div>
        </div>
        </div> <!-- end class=col2, id=container -->
    
        <div id="footer">
            <div class="content">
                <p>&#169; The University of New Mexico, Albuquerque, NM 87131, (505) 277-0111 <br />
                  New Mexico's Flagship University
                </p>
                <ul id="unm_footer_links">
                    <li><a href="http://www.unm.edu/accessibility.html">Accessibility</a></li><li><a href="http://www.unm.edu/legal.html">Legal</a></li><li><a href="http://www.unm.edu/contactunm.html">Contact UNM</a></li>
                </ul>
            </div>
        </div>
  
    </div> <!-- end page -->
</body>
</html>
<!-- End of Page view -->

<?php
//Utility functions

function show_form($person) { 
    
    //if ($person != ('faculty' || 'staff') ) {    
    if ($person == 'NOTFOUND' ) {        
 
        if (DEBUG == 1) {
            echo "<strong>DEBUGGING</strong><br />";
            print_r($_REQUEST);
            echo "<br />";
            print_r($_SESSION);
            
        }
        
        $form = '
            <p>
                <div style="margin-bottom: 150px; font-size:14px;">                    
                    <strong>Sorry, use of this service is available only to UNM teaching faculty.</strong> 
                    Please contact the <a href="http://it.unm.edu/support">IT CSS Service Desk</a> if you have a question.
                </div>
            </p>
            ';
    } else {
        
        if (DEBUG == 1) {
            echo "<strong>DEBUGGING</strong><br />";
            print_r($_REQUEST);
            echo "<br />";
            echo('Session: '.print_r($_SESSION));
            
        }
        
        $form = '
            <fieldset>
            <legend>iThenticate registration</legend>        
            <form name="frm1" id="frm1" action="'.$_SERVER['PHP_SELF'].'" method="POST">                        
                <div class="_25">
                    <p><label for="fname">First name:</label><div class="myform"><strong>'.$_SESSION['fname'].'</strong></div></p>
                </div>                        
                <div class="_25">
                    <p><label for="lname">Last name:</label><div class="myform"><strong>'.$_SESSION['lname'].'</strong></div></p>            
                </div>
                
                <div class="_25">
                    <p><label for="email_addr">Email address:</label><div class="myform"><strong>'.$_SESSION['mail'].'</strong></div></p>
                </div>
                <div class="_25">
                    <p><label for="college">College:</label><div class="myform"><strong>'.$_SESSION['dept'].'</strong></div></p>
                </div>
                
                <div class="_25">                
                    <p>
                    <input type="submit" value="register"></td>
                    <td><input type="hidden" name="cmd" value="register"></p>                    
                    <td><input type="hidden" name="fname" value="'.$_SESSION['fname'].'"></p>
                    <td><input type="hidden" name="lname" value="'.$_SESSION['lname'].'"></p>
                    <td><input type="hidden" name="mail" value="'.$_SESSION['mail'].'"></p>                    
                    <td><input type="hidden" name="dept" value="'.$_SESSION['dept'].'"></p>
                </div>               
            </fieldset>                   
            </form>
            ';
    }
        
    return $form;
    
}

function newUserEmail($_REQUEST){        
                
        $from = "swdist@unm.edu";                                                
        $subj =  "Your iThenticate set-up is almost complete!";
        
        $message = "Your iThenticate registration request will soon be processed and you will receive an email containing your iThenticate password.            
            You will receive specific instructions for resetting your password and accessing your new account.\r\n<br />";  
        $message .= "\r\n<br />";                                       
        $message .= "Please do not reply to this message. If you need assistance, please contact UNM IT Software Distribution (<a href=\"http://it.unm.edu/software/\">http://it.unm.edu/software/</a>) or call (505) 277-8122.\r\n<br />";
        $message .= "\r\n<br />";
        $message .= "UNM IT Software Distribution\r\n<br />";                
                
        $headers = "From: ".$from."\r\n";
        $headers .= "Return-path: ".$from."\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html;\r\n charset=ISO-8859-1";                
        
        mail($_SESSION['mail'],$subj,$message,$headers);        
        
        if (DEBUG == 1) {
            print_r($_REQUEST);
        }            
        
        echo '<div style="margin-bottom: 150px; font-size:14px;">
                    <h2>Thank you for your registration request!</h2>
                    Your iThenticate request has been sent. An email message containing the password and instructions
                    for completing your iThenticate setup will follow. If you have questions, please contact the IT Service Desk.
              </div>';
    
}    

function adminEmail($_REQUEST){        
    
        $today = date('Y-m-d H:i:s');
                
        $from = "<no_reply@unm.edu>";                                        
        $subj =  "New ithenticate account submission!";
        
        $message = "For your information, the following information was registered on the UNM iThenticate account registration page:\r\n<br />";          
        $message .= "\r\n<br />";                         
        $message .= "date: " . $today;
        $message .= "\r\n<br />";                         
        $message .= "Name: " . $_SESSION['fname'] . " " . $_SESSION['lname'] . "\r\n<br />";
        $message .= "Email address: " . $_SESSION['mail'] . "\r\n<br />";
        $message .= "Department: " . $_SESSION['dept'] . "\r\n<br />";                          
        $message .= "\r\n<br />";                         
        $message .= "If you are an account administrator, please login to the <a href=\"http://ithenticate.com\">http://ithenticate.com</a> page with your iThenticate admin account and review this 
            UNM affiliate's information.\r\n<br />";
        $message .= "This message was generated via the iThenticate registration page. Please do not reply to this message.\r\n<br />";
        $message .= "\r\n<br />";        
                
        $headers = "From: ".$from."\r\n";
        $headers .= "Return-path: ".$from."\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html;\r\n charset=ISO-8859-1";
                
        //mail($_REQUEST['email_addr'],$subj,$message,$headers,"-f".$from);
        mail(ADMIN_EMAIL,$subj,$message,$headers);
        
}

function randomPassword() {
    
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            
    for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n]; //grab the random character up to 8 chars.
    }
            
    return implode($pass); //turn the array into a string
}    

function insertToFile($_POST) {        
    
    //create the file if not there, then close handle.
    /*
      if (!file_exists('registrationshdd.csv')) {
     
        $fhandle = fopen('registrations.csv', 'w') or die("Cannot create file. "  );    
        fclose($fhandle);
    }
     * 
     */        
    
    foreach($_POST as $key => $value) {
            if(!is_array($value)) {
                $_POST[$key] = trim(htmlspecialchars(strip_tags($value),ENT_QUOTES,"ISO-8859-1"));
            }else if(is_array($value)) {
                $new_array = array();
                foreach ($value as $index=>$val) {
                    array_push($new_array, trim(htmlspecialchars(strip_tags($val),ENT_QUOTES,"ISO-8859-1")));
                }
                $_POST[$key] = $new_array;
            }

    }
    
    $row = '';           
    $row .= '"'.$_POST['fname'].'",';
    $row .= '"'.$_POST['lname'].'",';
    $row .= '"'.$_POST['mail'].'",';
    $row .= '"'.$_POST['dept'].'",';
    $row .= '"'.$_POST['cmd'].'",';
    $row .= '"'.date('Y-m-d H:i').'"';    
    $row .= "\r\n";
    
    file_put_contents('registrations.csv', $row, FILE_APPEND);    
}
                        
?>