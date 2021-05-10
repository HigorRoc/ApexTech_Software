<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/produtos.class.php';
require_once '../../App/Models/fabricante.class.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">';
echo '<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Adicionar <small>Produtos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Produtos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">';

echo '
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Produto</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
  
            <form role="form" enctype="multipart/form-data" action="../../App/Database/insertitens.php" method="POST" autocomplete="off">
              <div class="box-body">
              	<div class="form-group">
                  <label for="exampleInputEmail1">Nome da Categoria</label>
                  


            <select class="form-control" name="codProduto">
            ';
            $produtos->listProdutos();
            echo '</select>
            </div>

            <div class="form-group">
                  <label for="exampleInputEmail1">Fabricante</label>

            <select class="form-control" name="idFabricante">
            ';
            $fabricante->listfabricante();
            echo '</select>
            </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Quantidade</label>
                  <input type="text" name="QuantItens" class="form-control" id="exampleInputEmail1" placeholder="Quantidade">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Valor de Compra</label>
                  <input type="text" name="ValCompItens" class="form-control" id="exampleInputEmail1" placeholder="Valor Compra">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Valor de Venda</label>
                  <input type="text" name="ValVendItens" class="form-control" id="exampleInputEmail1" placeholder="Valor Venda">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Data de Compra</label>
                  <input type="text" name="DataCompraItens" class="form-control" id="exampleInputEmail1" placeholder="Data de Compra">
                </div>
   
                <div class="form-group">
                  <label for="exampleInputEmail1">Imagem</label>
                  <input type="file" name="arquivo" class="form-control">
                </div>
                 <input type="hidden" name="valor" value="#">
                           
                 <input type="hidden" name="iduser" value="'.$idUsuario.'">


              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="upload" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../views/itens/">Cancelar</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
          </div>
</div>';

echo '</div>';
echo '</div>';
echo '</section>';
echo '</div>';
echo  $footer;
echo $javascript;
?>
