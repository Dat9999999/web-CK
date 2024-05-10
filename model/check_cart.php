<?php
function productInCart($barcode, $cart){
    $index = 0;
    foreach($cart as $item){
        if($item['barcode'] == $barcode) return $index;
        $index++;
    }
    return -1;
}

?>