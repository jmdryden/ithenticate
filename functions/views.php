<?php

$person = $_SESSION['person'];    

function htmlHead($title) {
    
    $res ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US" xmlns:xhtml="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
<title>' . $htmlTitle . '</title>
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
<meta content="unm, university of new mexico, albuquerque, plagarism, antiplagarism, papers, academic integrity, iThenticate" name="keywords" />';

    $res .= '<style type="text/css">
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

</head>';

    return $res;
}

function htmlBody() {
    $res = '<body>
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
            <form action="http://search.unm.edu/search" id="unm_search_form" method="get">
                <fieldset>
                    <input accesskey="4" alt="input search query here" class="search_query" id="unm_search_form_q" maxlength="255" name="q" title="input search query here" type="text" />
                    <input accesskey="s" alt="search now" class="search_button" id="unm_search_for_submit" name="submit" src="http://webcore.unm.edu/v1/images/search.gif" type="image" value="search" />
                </fieldset>
            </form>
        </div>
    </div>
</div>';
    
$res .= '<div id="page">
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
                        <li><a href="../compare.html">iThenticate v. Turnitin</a></li></ul>
                </div>
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
        <p>';

return $res;

}
?>
