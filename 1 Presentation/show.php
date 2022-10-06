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
function showMenuItem($link, $labeltext) {
    return '<div class="divh"><li class="menu"><a href="'.$link.'" class="menu">'.$labeltext.'</a></li></div>';
}

function showSideMenuItem($link, $labeltext) {
    return '<a href="'.$link.'" class="menu">'.$labeltext.'</a>';
}
function showHeader($data) {
    if($_SESSION['loggedin'] == true) {
        $register = '
        <div class="register">
            '.showSideMenuItem('index.php?page=logout', 'Log Out ' . ucfirst($_SESSION['username'])).'<br>
            '.showSideMenuItem('index.php?page=cart', 'Cart').'    
        </div>
        ';
    } else {
        $register = '
        <div class="register">
            '.showSideMenuItem('index.php?page=login', 'Log In').'
            '.showSideMenuItem('index.php?page=register', 'Sign up').'
        </div>
        ';
    }
   echo('
    <header>
        '.$register.'
        <h1 class="header">'. ucfirst($data['page']) .'</h1>
        
        <ul class="list">
        '.showMenuItem('index.php?page=home', 'HOME').'
        '.showMenuItem('index.php?page=about', 'ABOUT').'
        '.showMenuItem('index.php?page=contact', 'CONTACT').'
        '.showMenuItem('index.php?page=webshop', 'WEBSHOP').'
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