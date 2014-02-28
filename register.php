<?PHP    
    session_start();          
    include_once 'config.php';
    $person = $_SESSION['person'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US" xmlns:xhtml="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
<title> iThenticate | The University of New Mexico</title>
<meta content="Mon, 14 Oct 2013 09:28:36 -0440" name="date" />

<!-- <meta content="suDeBu3cQ5JEfYn92UdyZqkDPVCRI3QFK4dbV1tzUNk" name="google-site-verification" /> -->
<link href="https://webcore.unm.edu/v1/images/unm.ico" rel="shortcut icon" />
<link href="https://webcore.unm.edu/v1/css/styles.php" media="screen" rel="stylesheet" type="text/css" />
<link href="https://webcore.unm.edu/v1/css/styles.php?media=print" media="print" rel="stylesheet" type="text/css" />
<link href="../common/css/site.css" media="screen" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
<link href="https://webcore.unm.edu/v1/css/ie.css" rel="stylesheet" type="text/css" media="screen" />
<![endif]-->
<script src="https://webcore.unm.edu/v1/javascript/jquery.min.js" type="text/javascript" ></script>
<script src="https://webcore.unm.edu/v1/javascript/unm_scripts.php" type="text/javascript" ></script>

<!-- Site Meta - put site specific css, javascript, etc. here-->
<meta content="iThenticate allows faculty and students to check written work against a large database of academic materials for originality. 
      iThenticatei also checks written work against content that can be found on the internet." name="description" />
<meta content="unm, university of new mexico, albuquerque, plagarism, antiplagarism, papers, academic integrity, iThenticate" name="keywords" />

<style type="text/css">
    ._25 {
    width: 21%;
    display: inline;
    float: left;
    margin-left: 2%;
    margin-right: 2%;
}
._50 {
    width: 46%;
    display: inline;
    float: left;
    margin-left: 2%;
    margin-right: 2%;
}
._75 {
    width: 71%;
    display: inline;
    float: left;
    margin-left: 2%;
    margin-right: 2%;
}
._100 {
    width: 96%;
    display: inline;
    float: left;
    margin-left: 2%;
    margin-right: 2%;
}
label {
    width: 100%;
}

input {
    border: 2px solid #B3B3B3;
    /* width: 100%; */ /* Hide because of unm search form input at top */
    -moz-border-radius: 3px;
}

.myform {
    width: 100%; /* apply to content form */
    margin-bottom: -10%;
    margin-top: -10%;
}

textarea {
    border: 1px solid #B3B3B3;
    width: 100%;
    -moz-border-radius: 3px;
}
select {
    border: 1px solid #B3B3B3;
    width: 100%;
    -moz-border-radius: 3px;
}
</style>

</head>
    
<body>
    <div id="unm_header">
        <div class="header_content">
            <div id="skipnav">
                <a accesskey="2" href="#content" tabindex="1">Skip to Main Content</a> <span class="hide">|</span> <a accesskey="1" href="http://www.unm.edu">UNM Homepage</a> <span class="hide">|</span> <a accesskey="0" href="http://www.unm.edu/accessibility.html">Accessibility Statement</a>
            </div>
            <div class="unm_header_title">
                <a href="http://www.unm.edu" title="The University of New Mexico">The University of New Mexico</a>
            </div>
            <div id="unm_header_links">
                <ul title="global UNM navigation">
                    <li><a href="http://www.unm.edu/depart.html" title="UNM A to Z">UNM A-Z</a></li>
                    <li><a href="http://studentinfo.unm.edu" title="StudentInfo">StudentInfo</a></li>
                    <li><a href="http://fastinfo.unm.edu" title="FastInfo">FastInfo</a></li>
                    <li><a href="https://my.unm.edu" title="myUNM">myUNM</a></li>
                    <li><a href="http://directory.unm.edu" title="Directory">Directory</a></li>
                </ul>
                <form action="http://search.unm.edu/search" id="unm_search_form" method="get"><fieldset><input accesskey="4" alt="input search query here" class="search_query" id="unm_search_form_q" maxlength="255" name="q" title="input search query here" type="text" /> <input accesskey="s" alt="search now" class="search_button" id="unm_search_for_submit" name="submit" src="http://webcore.unm.edu/v1/images/search.gif" type="image" value="search" /></fieldset></form>
            </div>
        </div>
    </div>
    
    <div id="page">
        <div id="dept_header">
            <div id="dept_logo">
                <a href="http://ithenticate.unm.edu"><img alt="iThenticate" src="../common/images/unm-logo.gif" /></a>
            </div>
            <a href="http://ithenticate.unm.edu"><img alt="" height="138" src="images/ithenticate.gif" width="960" /></a>    
        </div>
        
        <div class="col2" id="container">
            <div id="primary_aside">
                <div class="content">
                    <div id="primary_aside_1">
                        <ul class="slidemenu" id="dept_nav">
                            <li><a class="active" href="../index.html">iThenticate</a></li>
                            <li><a href="../compare.html">iThenticate v. Turnitin</a></li></ul></div>
                    <div id="primary_aside_2" ></div>
                    <div id="primary_aside_3" ></div>
                    <div id="primary_aside_4" ></div>
                </div>
            </div>

            <div id="content_top">
                <div class="content">
                    <ul id="unm_breadcrumbs">
                        <li class="unm_home"><a href="http://www.unm.edu">UNM</a></li>
                        <li><span class="breadcrumb-div">&gt;</span><a href="http://ithenticate.unm.edu">iThenticate</a></li>
                        <li><span class="breadcrumb-div">&gt;</span>Registration</li>
                    </ul>        
                </div>
            </div>
 
            <div id="content">
                <div class="content">
                    <div id="before_default_1" ></div>
                    <div id="before_default_2" ></div>                    
                    <h1>
                        <?php echo ( isset($_SESSION['person']) ? 'iThenticate account registration'  : 'Access is restricted' );   ?>
                    </h1>
                    <hr />                  

                    <p>                                       
                    <?php                    
                    
                        if ($_POST['cmd'] != 'register') {
                            
                            //function does view decision making on 'staff' or 'faculty'.
                            echo(show_form($_SESSION['person']));
                            
                        } else {                                                          
                            
                            if ($_SESSION['person']) {
                                
                                $res = newUserEmail($_REQUEST);
                                adminEmail($_REQUEST, $tii_account, $tii_password);
                                insertToFile($_REQUEST);

                                if ($res)
                                    echo('Thank you, an email has been sent to: "'.$_SESSION['email'].'", with course registration instructions.<br />');                                    
                                session_destroy();
                                //header('Location: thankyou.php');
                            } else {
                                    echo('Your registration request is already completed.<br />');                                    
                            }
                        }
                    ?>
                    </p>

                    <img alt="" class="center full_bleed" height="293" src="./images/header_sm.jpg" width="720" />
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
    if ($person != 'staff' ) {
        
        if (DEBUG == 1) {
            echo "<strong>DEBUGGING</strong><br />";
            print_r($_REQUEST);
            print_r($_SESSION);
        }
        
        $form = '
            <p>
                <div style="margin-bottom: 150px; font-size:14px;">                    
                    <strong>Use of this service is available only to UNM teaching faculty</strong>. 
                    Please contact the <a href="http://it.unm.edu/support">IT CSS Service Desk</a> if you have a question.
                </div>
            </p>
            ';
    } else {
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
                <!--
                <div class="_25">
                    <p><input type="reset" value="clear form"></p>
                </div>
                -->
                

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
        $message .= "This message was generated via the iThenticate registration page. Please do not reply to this message.\r\n<br />";
        $message .= "\r\n<br />";        
                
        $headers = "From: ".$from."\r\n";
        $headers .= "Return-path: ".$from."\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html;\r\n charset=ISO-8859-1";
                
        //mail($_REQUEST['email_addr'],$subj,$message,$headers,"-f".$from);
        mail(ADMIN_EMAIL,$subj,$message,$headers);
        
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

