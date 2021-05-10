<?php
require_once '../../App/auth.php';
require_once '../../App/Models/vendas.class.php';

          if(isset($_POST['idItem']) > 0 && 
      		 !empty($_POST['qtd']) &&
      		 isset($_POST['nomeCliente']) != NULL &&
      		 isset($_POST['emailCliente']) != NULL &&
      		 isset($_POST['cpfcliente']) != NULL){

            
            $cliente = $_POST['nomeCliente'];
            $email = $_POST['emailCliente'];
            $cpfCliente = connect::limpaCPF_CNPJ($_POST['cpfcliente']);
            $cart = $_SESSION['cart'];
            
    foreach ($_POST['idItem'] as $key => $error) {
    
    $id = $_POST['idItem'][$key];
    $quant = $_POST['qtd'][$key];
    
    $vendas = new Vendas;
    $result = $vendas->itensVerify($id, $quant, $perm);

    if($result['status'] == 0){

        $_SESSION['msg'] = '<div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>Ops!</strong> O Produto <b>' . $result['NomeProduto'] . '</b> não pode ser vendido nessa quantidade! <br/> Quantidade em estoque <b>'. $result['estoque'] .'. </b><br/></div>';
        header('Location: ../../views/vendas/index.php');
        exit;

        
    }

}


foreach ($_POST['idItem'] as $key => $error) {
    
    $id = $_POST['idItem'][$key];
    $quant = $_POST['qtd'][$key];

    $vendas = new Vendas;
    $vendas->itensVendidos($id, $quant, $cliente, $email, $cpfCliente, $cart, $idUsuario, $perm);

}     

}else{
    $_SESSION['alert'] = 0;
    header('Location: ../../views/vendas/index.php');
}

?>
