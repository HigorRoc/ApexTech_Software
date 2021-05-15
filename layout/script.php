<?php

$url = 'http://localhost/projetos/website/views/';

$head = '<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-language" content="pt-br"/> 

    <!-- ICONE NA ABA -->
    <link rel="sortcut icon" href="'.$url.'dist/img/Apex.ico" type="image/x-icon"/>

    <!-- TITULO DA ABA -->
    <title>Produtos</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="'.$url.'bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="'.$url.'dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="'.$url.'dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="'.$url.'plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="'.$url.'plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="'.$url.'plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="'.$url.'plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="'.$url.'plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="'.$url.'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <script src="http://code.jquery.com/jquery-1.5.2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>

  <!-- Imprimir Venda -->

    <script type="text/javascript">
      function cont(){
        var conteudo = document.getElementById(\'print\').innerHTML;
        tela_impressao = window.open(\'about:blank\');
        tela_impressao.document.write(conteudo);
        tela_impressao.window.print();
        tela_impressao.window.close(); 
      }
    </script>

  <!-- Imprimir Venda --> 

    <script type="text/javascript">
      $(document).ready(function(){
      $("input[name=\'status[]\']").click(function(){
        var $this = $( this );//guardando o ponteiro em uma variavel, por performance

        var status = $this.attr(\'checked\') ? 1 : 0;
        var id = $this.next(\'input\').val();

        $.ajax({
          url: \'action.php\',
          type: \'GET\',
          data: \'status=\'+status+\'&id=\'+id,
          success: function( data ){
            alert( data );
          }
        });
      });
    }); 
    </script>

  <!-- Lista Cliente CPF -->

    <script type="text/javascript">
    $(document).ready(function(){  
          $(\'#cpfCliente\').keyup(function(){  
              var query = $(this).val();  
              if(query != "")  
              {  
                    $.ajax({  
                        url:"'.$url.'../App/Database/search.php",  
                        method:"POST",  
                        data:{query:query},  
                        success:function(data)  
                        {        
                              $(\'#Listdata\').fadeIn();  
                              $(\'#Listdata\').html(data);  
                        }  
                    });  
              }  
          });  

        $(\'#Listdata\').on("click","li", function(){  
            $(\'#cpfCliente\').val($(this).text());  
            $(\'#Listdata\').fadeOut();
            <!-- console.log(event.target);-->
        });
    });  
    </script>

  <!-- CONSULTA QTD DE VENDAS -->

    <script type="text/javascript">
    $(document).ready(function(){

          $("#prodSubmit").click(function()  {
        var prodSubmit = $("#prodSubmit").val();
        var idItem = $("#idItem").val();
        var qtd = $("#qtd").val();
        
        $.ajax({
          type: "POST",
          url: "'.$url.'../App/Database/carrinho.php",s
          data: {prodSubmit: prodSubmit, idItem: idItem, qtd:qtd},
          success: function(data){
                  $(\'#listable\').fadeIn();  
                  $(\'#listable\').html(data);
              }
          });
        }); 

        $(\'#listable\').on("click","li", function(){  
              $(\'#idItem\').val($(data).text());
              $(\'#qtd\').val($(data).text());  
              $(\'#listable\').fadeOut();
              
                return false;

              <!-- console.log(event.target); -->
          });           
      });  
    </script>

    <script type="text/javascript">
    (function ($) {

      RemoveTableRow = function (handler) {
          var tr = $(handler).closest(\'tr\');

          tr.fadeOut(400, function () {
              tr.remove();
          });

          return false;
      };

      AddTableRow = function () {

          var newRow = $("<tr>");
          var cols = \'<td></td>\';
          var tabela = document.getElementById(\'products-table\');
          var a = (tabela.getElementsByTagName(\'tr\'));
          var b = a.length;
          var i = b - 2;
          var cont = 7 + i;

          cols += \'<td><input type="text" class="form-control" id="idItem" name="idItem[]" autocomplete="off" /></td>\';
          cols += \'<td><input type="text" class="form-control" id="qtd" name="qtd[]" autocomplete="off" /><span id="stv" name="stv[]"></span></td>\';
          cols += \'<td class="actions">\';
          cols += \'<button class="btn btn-danger btn-xs" onclick="RemoveTableRow(this)" type="button"><i class="fa fa-trash"></i></button>\';
          cols += \'</td>\';

          newRow.append(cols);
          $("#products-table").append(newRow);
          return false;
      };

    })(jQuery);
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-black sidebar-mini">
  <div class="wrapper">';

  $header = '<header class="main-header">
      <!-- Logo -->
      <a href="index2.html" class="logo">

        <!-- LOGO COM ABA FECHADA -->
        <span class="logo-mini"><b>A</b>PT</span>

        <!-- LOGO COM ABA ABERTA -->
        <span class="logo-lg"><b>Apex</b>Tech</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">

        <!-- LOGO COM ABA ABERTA (FUNÇÃO)-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu"> 
          <ul class="nav navbar-nav">

            <!-- MENSAGENS (dropdown.less) -->
            <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">2</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Você possui 2 mensagens</li>
                <li>
                  <ul class="menu">
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          Victor Pedreira
                          <small><i class="fa fa-clock-o"></i> 5 Horas</small>
                        </h4>
                        <p>Higor, você recebeu o relatório deste mês?</p>
                      </a>
                    </li>
              
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          Larissa Carvalho
                          <small><i class="fa fa-clock-o"></i> Ontem</small>
                        </h4>
                        <p>Não estou conseguindo acessar o sistema!</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer"><a href="#">Todas Mensagens</a></li>
              </ul>
            </li>

            <!-- NOTIFICAÇÕES (dropdown.less) -->
            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">5</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Você possui 5 notificações</li>
                <li>
                  <ul class="menu">
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 Novos colaboradores ativos.
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-warning text-yellow"></i> Sistema com falha de Acesso!
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-red"></i> 5 Novos clientes ativos. 
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-shopping-cart text-green"></i> 25 Novas vendas.
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-user text-red"></i> Seu nome de Usuário foi atualizado.
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer"><a href="#">Todas Notificações</a></li>
              </ul>
            </li>

            <!-- VENDAS (dropdown.less) -->
            <li class="dropdown tasks-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">4</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Você possui 4 vendas em processo</li>
                <li>
                  <ul class="menu">
                    <li>
                      <a href="#">
                        <h3>
                          Cliente: NerdPoint
                          <small class="pull-right">20%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <h3>
                          Cliente: AB Informática
                          <small class="pull-right">40%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">40% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <h3>
                          Cliente: SND Group
                          <small class="pull-right">60%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <h3>
                          Cliente: Ingram Micro
                          <small class="pull-right">80%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">80% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">Todas Vendas</a>
                </li>
              </ul>
            </li>

            <!-- PERFIL DO USUÁRIO (dropdown.less) -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="'.$url.''.$foto.'" class="user-image" alt="User Image">
                <span class="hidden-xs">'.$usuario.'</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="'.$url.''.$foto.'" class="img-circle" alt="User Image">
                  <p>
                    '.$usuario.' - Administrador
                    <small>Explore Tecnologia</small>
                  </p>
                </li>
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-4 text-center">
                      <a href="#">Mensagens</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Indicadores</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Equipe</a>
                    </div>
                  </div>
                </li>
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Perfil</a>
                  </div>
                  <div class="pull-right">
                    <a href="'.$url.'destroy.php" class="btn btn-default btn-flat">Encerrar Sessão</a>
                  </div>
                </li>
              </ul>
            </li>
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>';

    $aside = '<!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
    
      <!-- PERFIL DO USUÁRIO (LATERAL) -->
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <img src="'.$url.''.$foto.'" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>'.$usuario.'</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <!-- CAIXA DE PESQUISA -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
                </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">MENU DE NAVEGAÇÃO</li>
          <li class="active treeview">
            <a href="'.$url.'">
              <i class="fa fa-th-large"></i><span>Home Page</span>
            </a>
          </li>
  
          <!-- PRODUTOS -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-cubes text-red"></i>
              <span>Produtos</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="'.$url.'prod/addprod.php"><i class="fa fa-plus-circle"></i>Adicionar Produtos</a></li>
              <li><a href="'.$url.'itens/additens.php"><i class="fa fa-plus-circle"></i>Adicionar Itens</a></li>
              <li><a href="'.$url.'itens/"><i class="fa fa-bars"></i>Lista de Produtos</a></li>
              <li><a href="'.$url.'itens/totalitens.php"><i class="fa fa-database"></i>Relatório de Produtos</a></li>
            </ul>
          </li>

          <!-- FABRICANTES -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-industry "></i>
              <span>Fabricantes</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="'.$url.'fabricante/"><i class="fa fa-bars"></i>Fabricantes</a></li>
              <li><a href="'.$url.'fabricante/addfabricante.php"><i class="fa fa-plus-circle"></i>Adicionar Fabricante</a></li>
            </ul>
          </li>

          <!-- REPRESENTANTES -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-industry "></i>
              <span>Representantes</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="'.$url.'representante/"><i class="fa fa-bars"></i>Representantes</a></li>
              <li><a href="'.$url.'representante/addRepresentante.php"><i class="fa fa-plus-circle"></i>Adicionar Representante</a></li>
            </ul>
          </li>

          <!-- USUÁRIOS -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>Usuários</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="'.$url.'usuarios/"><i class="fa fa-bars"></i>Usuários</a></li>
              <li><a href="'.$url.'usuarios/addusuarios.php"><i class="fa fa-plus-circle"></i>Adicionar Usuários</a></li>
            </ul>
          </li>

          <!-- CLIENTES -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>Clientes</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="'.$url.'cliente/"><i class="fa fa-bars"></i>Clientes</a></li>
              <li><a href="'.$url.'cliente/addcliente.php"><i class="fa fa-plus-circle"></i>Adicionar Cliente</a></li>
              
            </ul>
          </li>

          <!-- VENDAS -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-usd text-green"></i>
              <span>Vendas</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="'.$url.'vendas/"><i class="fa fa-usd"></i>Vendas</a></li>
            </ul>
          </li>


          <!-- CALENDAR -->
          <li>
            <a href="pages/calendar.html">
              <i class="fa fa-calendar"></i> <span>Agenda</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-red">3</small>
                <small class="label pull-right bg-blue">17</small>
              </span>
            </a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>';

    $footer = '<footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Versão</b> 1.0
      </div>
      <strong>Copyright &copy 2021 <a href="http://exploretec.com">Explore Tecnologia</a></strong> All rights
      reserved.
    </footer>';

    $javascript = '

    </div>
  <!-- jQuery 2.2.3 -->
  <script src="'.$url.'plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge(\'uibutton\', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.6 -->
  <script src="'.$url.'bootstrap/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="'.$url.'plugins/morris/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="'.$url.'plugins/sparkline/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="'.$url.'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="'.$url.'plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="'.$url.'plugins/knob/jquery.knob.js"></script>
  <!-- daterangepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="'.$url.'plugins/daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="'.$url.'plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="'.$url.'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="'.$url.'plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="'.$url.'plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="'.$url.'dist/js/app.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="'.$url.'dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="'.$url.'dist/js/demo.js"></script>

  </body>
</html>
';