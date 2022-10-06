<?php 
include_once('includeDir.php');
includeOnceDir('./2 Business/');

//INDEX
function beginDocument() {
    echo('
        <!DOCTYPE html>
        <html>
    ');
}

function showHead() {
    echo('<head>');
    linkExternalCss();
    echo('</head>');
}

function showBody($data) {
    echo('<body> <div class="container">');
    showHeader($data);
    showContent($data);
    showFooter();
    echo('</div> </body>');
    

}

function showHeader($data) {
    if($_SESSION['loggedin'] == true) {
        $register = '
        <div class="register">
            <a href="index.php?page=logout" class="menu">Log Out ' . ucfirst($_SESSION['username']) . '</a> <br>
            <a href="index.php?page=cart" class="menu"> Cart </a>
        </div>
        ';
    } else {
        $register = '
        <div class="register">
            <a href="index.php?page=login" class="menu">Log In</a>
            <a href="index.php?page=register" class="menu">Sign up</a>
        </div>
        ';
    }
   echo('
    <header>
        '.$register.'
        <h1 class="header">'. ucfirst($data['page']) .'</h1>
        
        <ul class="list">
        <div class="divh"><li class="menu"><a href="index.php?page=home" class="menu">HOME</a></li></div>
        <div class="divh"><li class="menu"><a href="index.php?page=about"class="menu">ABOUT</a></li></div>
        <div class="divh"><li class="menu"><a href="index.php?page=contact"class="menu">CONTACT</a></li></div>
        <div class="divh"><li class="menu"><a href="index.php?page=webshop"class="menu">WEBSHOP</a></li></div>
    </ul>
    </header>
   ');
}



function showContent($data) {
    
    switch($data['page']) {
        case "home":
            showHomeContent();
            break;
        case "about":
            showAboutContent();
            break;
        case "contact":
            showContactContent();
            break;
        case "register":
            showRegisterContent();
            break;
        case "login":
            showLoginContent($data);
            break;
        case 'thanks':
            showContactThanks($data);
            break;
        case 'logout':
            showHomeContent();
        case 'webshop':
            showWebshopContent($data);
            break;
        case 'details':
            showDetailsContent($data);
            break;
        case 'cart':
            showCartContent();
            break;
        default:
            showPageError();
    }
}

function endDocument() {
    echo('</html>');
}

function linkExternalCss() {
    echo('<link rel="stylesheet" href="./CSS/css.css">');
}


//WEBSHOP


//LOGIN




function ShowFormStart() {
    echo('<form action="index.php" method="post" class="body">');
}

function ShowFormEnd($page, $submitText) {
    echo('<input type="hidden" name="page" value="'.$page.'">');
    echo('<button type="submit">'.$submitText.'</button></form>');
}

function showPageError() {
    echo('
        <h1 class="error">PAGE ERROR</h1>
    ');
}

function showFooter() {
    echo('
    <footer>
        &#169;
        <p>' . date("Y") . '</p>
        <p>Tobias The</p>
    </footer>
    ');
}


?>