<?php 
function showWebshopContent($data) {
    showItems($data);
}

function showDetailsContent($data) {
    $data['page'] = getVarFromArray($_GET, 'page', 'home');
    $data['id'] = getVarFromArray($_GET, 'id', 1);
    showDetails($data);
}

function showCartContent() {
    if(checkCart()) {
        showCart();
    } else {
        echo('<div>Cart is empty</div>');
    }
}
?>