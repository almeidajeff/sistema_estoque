<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Control Panel</title>
    
    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="../assets/js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Paginator -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>

    <!-- Validator -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://localhost/xampp/sistema_estoque/index.php">Stock System</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <a href="controlpanel">Control Panel</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1>Listagem de Itens </h1>
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Código</th>
                            <th>Preço Compra</th>
                            <th>Preço Venda</th>
                            <th>Quantidade</th>
                            <th>Unidade de Medida</th>
                            <th>Data de Validade</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Nome exemplo</td>
                            <td>descrição exemplo</td>
                            <td>1234567890</td>
                            <td>R$ 500,30</td>
                            <td>R$ 700,00</td>
                            <td>15</td>
                            <td>metros</td>
                            <td>17/05/2018</td>
                            <td class="actions">
                                <a href="../api/update.php">
                                <img alt="Alterar"
                                     src="../assets/icons/edit.png">
                                </a>
                                <a href="../api/delete.php">
                                <img alt="Remover"
                                     src="../assets/icons/delete.png">
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">Incluir Novo Item</button>
        </div>

        <!-- Paginator -->
        <div class="row">
            <div class="col-lg-12">
                <ul id="pagination" class="pagination-sm"></ul>
            </div>
        </div>
    </div>


    <!-- Create Item Modal -->
        <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Criar Item</h4>
              </div>

              <div class="modal-body">
                    <form data-toggle="validator" action="api/create.php" method="POST">

                        <div class="form-group">
                            <label class="control-label" for="title">Nome</label>
                            <input type="text" name="nome" class="form-control" data-error="Por favor insira um Nome" required />
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="title">Descrição:</label>
                            <textarea name="descricao" class="form-control"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="title">Código:</label>
                            <input type="text" name="codigo" class="form-control" data-error="Por favor insira um Código" required />
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="title">Preço Compra:</label>
                            <input type="text" name="preco_compra" class="form-control" />
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="title">Preço Venda:</label>
                            <input type="text" name="preco_venda" class="form-control" />
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="title">Quantidade:</label>
                            <input type="text" name="quantidade" class="form-control" />
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="title">Unidade:</label>
                            <input type="text" name="unidade" class="form-control" />
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="title">Data de validade:</label>
                            <input type="text" name="data_de_validade" class="form-control" />
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn crud-submit btn-success">Cadastrar</button>
                        </div>

                    </form>

              </div>
            </div>

          </div>
        </div>
    <!-- End Modal Create -->

    <!-- Edit Item Modal -->
        <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Item</h4>
              </div>

              <div class="modal-body">
                    <form data-toggle="validator" action="api/update.php" method="put">
                        <input type="hidden" name="id" class="edit-id">

                        <div class="form-group">
                            <label class="control-label" for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" data-error="Por favor insira um Nome" required />
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="descricao">Descrição:</label>
                            <textarea name="descricao" class="form-control"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="codigo">Código:</label>
                            <input type="text" name="codigo" class="form-control" data-error="Por favor insira um Código" required />
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="preco_compra">Preço Compra:</label>
                            <input type="text" name="preco_compra" class="form-control" />
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="preco_venda">Preço Venda:</label>
                            <input type="text" name="preco_venda" class="form-control" />
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="quantidade">Quantidade:</label>
                            <input type="text" name="quantidade" class="form-control" />
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="unidade">Unidade de medida:</label>
                            <input type="text" name="unidade_medida" class="form-control" />
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="data_de_validade">Data de validade:</label>
                            <input type="text" name="data_validade" class="form-control" />
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn crud-submit-edit btn-success">Salvar</button>
                        </div>

                    </form>

              </div>
            </div>
          </div>
        </div>
    <!-- End Modal Edit -->
    
    <!-- container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <script type="text/javascript">
        //var host = location.host
        //var path = location.pathname
        var url = 'http://localhost/xampp/sistema_estoque/';
    </script>
    <!-- Ajax -->
    <script src="../assets/js/item_ajax.js"></script>

    

   
</body>

</html>
