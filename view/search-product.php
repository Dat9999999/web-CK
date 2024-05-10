<?php
session_start();
if(isset($_POST['btn-search-product']) && $_POST['btn-search-product']){
                    include_once("./model/get_product.php");
                    if(isset($_POST['product-name-barcode']) && $_POST['product-name-barcode'] && 
                    isset($_POST['product-quantity']) && $_POST['product-quantity']){

                        $key_product = $_POST['product-name-barcode'];
                        unset($_POST['product-name-barcode']);
                        //check if string cointain digit or not
                        if(!ctype_digit($key_product)){
                            // search by name 
                            $product = getProductByName($key_product);

                        }
                        else{
                            //search by barcode
                            $product = getProductByBarcode($key_product);
                        }
                        if($product){
                            include_once("./model/check_cart.php");
                            //check if the product is in session cart or not
                            if(isset($_SESSION['cart']) && $_SESSION['cart']){
                                $index = productInCart($product['barcode'], $_SESSION['cart']);
                                // duplicate product in cart 
                                if($index >= 0){
                                    $_SESSION['cart'][$index]['quantity'] += $_POST['product-quantity'];
                                    $_SESSION['cart'][$index]['total'] += $product['price'] * $_POST['product-quantity'];
                                }
                                else{
                                    // new product 
                                    $_SESSION['cart'][] = array(
                                        'barcode' => $product['barcode'],
                                        'product_name'=>$product['product_name'],
                                        'quantity'  => $_POST['product-quantity'],
                                        'price' => $product['price'],
                                        'total' => $product['price'] * $_POST['product-quantity'],
                                        'product_id' => $product['id']
                                    );

                                }
                            }
                            // fisrt product
                            else{
                                $_SESSION['cart'][] = array(
                                    'barcode' => $product['barcode'],
                                    'product_name'=>$product['product_name'],
                                    'quantity'  => $_POST['product-quantity'],
                                    'price' => $product['price'],
                                    'total' => $product['price'] * $_POST['product-quantity'],
                                    'product_id' => $product['id']
                                );
                            }
                        }
                        else{
                            echo 'Không tồn tại sản phẩm này';
                        }
                    }
                }
header("location: index.php?pg=payment");
?>