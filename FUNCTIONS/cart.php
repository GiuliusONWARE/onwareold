<?php 

if(!isset($_SESSION['carrinho'])) {
	$_SESSION['carrinho'] = array();
}

function addCart($id_produto, $quantidade) {
	if(!isset($_SESSION['carrinho'][$id_produto])){ 
		$_SESSION['carrinho'][$id_produto] = $quantidade; 
	}
}

function deleteCart($id_produto) {
	if(isset($_SESSION['carrinho'][$id_produto])){ 
		unset($_SESSION['carrinho'][$id_produto]); 
	} 
}

function updateCart($id_produto, $quantidade) {
	if(isset($_SESSION['carrinho'][$id_produto])){ 
		if($quantidade > 0) {
			$_SESSION['carrinho'][$id_produto] = $quantidade;
		} else {
		 	deleteCart($id_produto);
		}
	}
}

function getContentCart($pdo) {
	
	$results = array();
	
	if($_SESSION['carrinho']) {
		
		$cart = $_SESSION['carrinho'];
		$products =  getProductsById_produtos($pdo, implode(',', array_keys($cart)));

		foreach($products as $product) {

			$results[] = array(
							  'id_produto' => $product['id_produto'],
							  'modelo' => $product['modelo'],
							  'preco' => $product['preco'],
							  'quantidade' => $cart[$product['id_produto']],
							  'subtotal' => $cart[$product['id_produto']] * $product['preco'],
						);
		}
	}
	
	return $results;
}

function getTotalCart($pdo) {
	
	$total = 0;

	foreach(getContentCart($pdo) as $product) {
		$total += $product['subtotal'];
	} 
	return $total;
}