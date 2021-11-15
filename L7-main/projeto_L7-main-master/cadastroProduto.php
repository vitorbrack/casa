<?php
include_once 'controller/ProdutoController.php';
include_once './model/Produto.php';
include_once './model/Fornecedor.php';
include_once './model/Marca.php';
include_once './model/Mensagem.php';
include_once 'controller/FornecedorController.php';
include_once './controller/MarcaController.php';

$fm = new marcacontroller();
$fcc = new FornecedorController();
$msg = new Mensagem();
$pr = new Produto();
$fornecedor = new Fornecedor();
$pr->setFkFornecedor($fornecedor);
$marca = new Marca();
$pr->setFkMarca($marca);
$btEnviar = FALSE;
$btAtualizar = FALSE;
$btExcluir = FALSE;
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produtos</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <style>
    #container {
      width: 500px;
    }
  </style>

</head>
<header style="color: white;">
  
</header>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ml-5">
    <div class="container-fluid">
      <a href="#" class="navbar-brand">L7 Grifes</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse show" id="navbarCollapse" style>
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a href="#" class="nav-link">Produtos</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Carrinho</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link"></a>
          </li>
        </ul>
        <div>
          <a href="Login.html" class="animated-button1">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            LOGIN/CADASTRO
          </a>
        </div>
      </div>
    </div>
  </nav>
  <?php
  //envio dos dados para o BD
  if (isset($_POST['cadastrarProduto'])) {
    $nomeProduto = trim($_POST['nomeProduto']);
    if ($nomeProduto != "") {
      $categoria = $_POST['categoria'];
      $cor = $_POST['cor'];
      $tamanho = $_POST['tamanho'];
      $vlrCompra = $_POST['vlrCompra'];
      $vlrVenda = $_POST['vlrVenda'];
      $qtdEstoque = $_POST['qtdEstoque'];
      $lote = $_POST['lote'];
      $dtCompra = $_POST['dtCompra'];
      $FkFornecedor = $_POST['FkFornecedor'];
      $FkMarca = $_POST['FkMarca'];
      //$msg->setMsg("$categoria,$nomeProduto, $cor, $tamanho, $vlrCompra, $vlrVenda, $qtdEstoque, $lote, $dtCompra, $FkFornecedor, $FkMarca");
      $pc = new ProdutoController();
      unset($_POST['cadastrarProduto']);
      $msg = $pc->inserirProduto(
        $categoria,
        $nomeProduto,
        $cor,
        $tamanho,
        $vlrCompra,
        $vlrVenda,
        $qtdEstoque,
        $lote,
        $dtCompra,
        $FkFornecedor,
        $FkMarca
      );

      echo $msg->getMsg();
      echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroProduto.php'\">";
    }
  }

  //método para atualizar dados do produto no BD
  if (isset($_POST['atualizarProduto'])) {
    $nomeProduto = trim($_POST['nomeProduto']);
    if ($nomeProduto != "") {
      $idProduto = $_POST['idProduto'];
      $categoria = $_POST['categoria'];
      $cor = $_POST['cor'];
      $tamanho = $_POST['tamanho'];
      $vlrCompra = $_POST['vlrCompra'];
      $vlrVenda = $_POST['vlrVenda'];
      $qtdEstoque = $_POST['qtdEstoque'];
      $lote = $_POST['lote'];
      $dtCompra = $_POST['dtCompra'];
      $FkFornecedor = $_POST['FkFornecedor'];
      $FkMarca = $_POST['FkMarca'];
      $pc = new ProdutoController();
      unset($_POST['atualizarProduto']);
      $msg = $pc->atualizarProduto(
        $idProduto,
        $categoria,
        $nomeProduto,
        $cor,
        $tamanho,
        $vlrCompra,
        $vlrVenda,
        $qtdEstoque,
        $lote,
        $dtCompra,
        $FkFornecedor,
        $FkMarca
      );
      echo $msg->getMsg();
      $pr = null;
      echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroProduto.php'\">";
    }
  }

  if (isset($_POST['excluir'])) {
    if ($pr != null) {
      $id = $_POST['ide'];

      $pc = new ProdutoController();
      unset($_POST['excluir']);
      $msg = $pc->excluirProduto($id);
      echo $msg->getMsg();
      echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroProduto.php'\">";
    }
  }

  if (isset($_POST['excluirProduto'])) {
    if ($pr != null) {
      $id = $_POST['idproduto'];
      unset($_POST['excluirProduto']);
      $pc = new ProdutoController();
      $msg = $pc->excluirProduto($id);
      echo $msg->getMsg();
      echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroProduto.php'\">";
    }
  }

  if (isset($_POST['limpar'])) {
    $pr = null;
    unset($_GET['id']);
    header("Location: cadastroProduto.php");
  }
  if (isset($_GET['id'])) {
    $btEnviar = TRUE;
    $btAtualizar = TRUE;
    $btExcluir = TRUE;
    $id = $_GET['id'];
    $pc = new ProdutoController();
    $pr = $pc->pesquisarProdutoId($id);
  }
  ?>
  <form method="post" action="" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-12">
        <strong>Código: <label style="color:red;">
            <?php
            if ($pr != null) {
              echo $pr->getIdProduto();
            ?>
          </label></strong>
        <input type="hidden" name="idProduto" value="<?php echo $pr->getIdProduto(); ?>">
        <br>
  </form>

<?php
            }
?>
<div class="container" style="margin-top: 40px" id="container">

  <h3>Cadastro de produto</h3>

  <form action="cadastroProduto.php" method="post" style="margin-top: 20px">
    <div class="form-group">
      <div class="row">
        <div class="col-md-6">
        <label>Categoria</label>
        <input type="text" class="form-control" name="categoria" placeholder="Insira o nome do produto"  value="<?php echo $pr->getCategoria(); ?>">
          <label>Produto</label>
          <input type="text" class="form-control" name="nomeProduto" placeholder="Insira o nome do produto"  value="<?php echo $pr->getNomeProduto(); ?>">
          <label>Cor</label>
          <input type="text" class="form-control" name="cor" placeholder="Insira a cor do produto"  value="<?php echo $pr->getCor(); ?>">
          <label>Tamanho</label>
          <input type="text" class="form-control" name="tamanho" placeholder="Insira o tamanho do produto"  value="<?php echo $pr->getTamanho(); ?>">
          <label>Quantidade</label>
          <input type="number" class="form-control" name="qtdEstoque" placeholder="Insira a quantidade do produto"  value="<?php echo $pr->getQtdEstoque(); ?>">
        </div>
        <div class="col-md-6">
          <label>Valor da Compra</label>
          <input type="text" class="form-control" name="vlrCompra" placeholder="Insira o valor da compra"  value="<?php echo $pr->getVlrCompra(); ?>">
          <label>Valor da Venda</label>
          <input type="text" class="form-control" name="vlrVenda" placeholder="Insira o valor da venda"  value="<?php echo $pr->getVlrVenda(); ?>">
          <label>Lote</label>
          <input type="text" class="form-control" name="lote" placeholder="Insira o lote"  value="<?php echo $pr->getLote(); ?>">
          <label>Data da Compra</label>
          <input type="date" class="form-control" name="dtCompra" placeholder="Insira a data da compra" value="<?php echo $pr->getDtCompra(); ?>">
        </div>
      </div>
    </div>
    <div class="form-group">
      </select>
    </div>
    <div class="form-group">
      <label>Marca</label> <label style="color: red; font-size: 11px;" id="respMarca"></label>
      <select class="form-control" id="FKMarca" onblur="return selectMarca();" name="FkMarca" placeholder="Escolha a marca">
        <option value="-1">[--SELECIONE--]</option>
        <?php
        $mc = new MarcaController();
        $lpr = $mc->listarMarcas();
        foreach ($lpr as $m) {
        ?>

          <option <?php
                  if ($pr->getFkMarca()->getIdMarca() != null) {
                    if ($pr->getFkMarca()->getIdMarca == $m->getIdMarca()) echo "selected = 'selected'";
                  } ?> value="<?php echo $m->getIdMarca(); ?>"><?php echo $m->getNomeMarca(); ?></option>
        <?php
        }
        ?>
      </select>
      <div class="form-group">
        <label>Fornecedor</label> <label style="color: red; font-size: 11px;" id="respFornecedor"></label>
        <select class="form-control" id="FkFornecedor" onblur="return selectFornecedor();" name="FkFornecedor" placeholder="Escolha o fornecedor">
          <option value="-1">[--SELECIONE--]</option>
          <?php
          $fcc = new FornecedorController();
          $lpr = $fcc->listarFornecedores();
          foreach ($lpr as $f) {
          ?>

            <option <?php
                    if ($pr->getFkFornecedor()->getIdFornecedor() != null) {
                      if ($pr->getFkFornecedor()->getIdFornecedor == $f->getIdFornecedor()) echo "selected = 'selected'";
                    } ?> value="<?php echo $f->getIdFornecedor(); ?>"><?php echo $f->getNomeFornecedor(); ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <br>
      <input type="submit" name="cadastrarProduto" class="btn btn-success btInput" value="Enviar" <?php if ($btEnviar == TRUE) echo "disabled"; ?>>
                            <input type="submit" name="atualizarProduto" class="btn btn-secondary btInput" value="Atualizar" <?php if ($btAtualizar == FALSE) echo "disabled"; ?>>
                            <button type="button" class="btn btn-warning btInput" data-bs-toggle="modal" data-bs-target="#exampleModal" 
                            <?php if ($btExcluir == FALSE) echo "disabled"; ?>>
                                Excluir
                            </button>
                            <!-- Modal para excluir -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabel">
                                                Confirmar Exclusão</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Deseja Excluir?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" name="excluirProduto" class="btn btn-success " value="Sim">
                                            <input type="submit" class="btn btn-light btInput" name="limpar" value="Não">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- fim do modal para excluir -->
                            &nbsp;&nbsp;
                            <input type="submit" class="btn btn-light btInput" name="limpar" value="Limpar">
                            </div>
  </form>
  <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-responsive" style="border-radius: 3px; overflow:hidden; text-align: center;">
                        <thead class="table-dark">
                            <tr>
                                <th>Código</th>
                                <th>Categoria</th>
                                <th>Nome produto</th>
                                <th>Cor</th>
                                <th>Tamanho</th>
                                <th>Valor compra</th>
                                <th>Valor venda</th>
                                <th>Estoque</th>
                                <th>Lote</th>
                                <th>Data da compra</th>
                                <th>Marca</th>
                                <th>Fornecedor</th>
                                <th colspan="2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $fcTable = new ProdutoController();
                            $listarProdutos = $fcTable->listarProdutos();
                            $a = 0;
                            if ($listarProdutos != null) {
                                foreach ($listarProdutos as $lf) {
                                    $a++;
                            ?>
                                    <tr>
                                        <td><?php print_r($lf->getIdProduto()); ?></td>
                                        <td><?php print_r($lf->getCategoria()); ?></td>
                                        <td><?php print_r($lf->getNomeProduto()); ?></td>
                                        <td><?php print_r($lf->getCor()); ?></td>
                                        <td><?php print_r($lf->getTamanho()); ?></td>
                                        <td><?php print_r($lf->getVlrCompra()); ?></td>
                                        <td><?php print_r($lf->getVlrVenda()); ?></td>
                                        <td><?php print_r($lf->getQtdEstoque()); ?></td>
                                        <td><?php print_r($lf->getLote()); ?></td>
                                        <td><?php print_r($lf->getDtCompra()); ?></td>
                                        <td><?php print_r($lf->getFkMarca()->getNomeMarca()); ?></td>
                                        <td><?php print_r($lf->getFkFornecedor()->getNomeFornecedor()); ?></td>
                                        <td><a href="cadastroProduto.php?id=<?php echo $lf->getIdProduto(); ?>" class="btn btn-light">
                                                Editar</a>
                                            </form>
                                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $a; ?>">
                                                Excluir</button>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?php echo $a; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Excluir Produto</h5>
                                                    <button type="button" class="btn-close" 
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="">
                                                        <label><strong>Deseja excluir o Produto 
                                                                <?php echo $lf->getNomeProduto(); ?>?</strong></label>
                                                        <input type="hidden" name="ide" 
                                                               value="<?php echo $lf->getNome(); ?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="excluir" class="btn btn-primary">Sim</button>
                                                            <button type="reset" class="btn btn-secondary" 
                                                                    data-bs-dismiss="modal">Não</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>


<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
  function selectMarca() {
    var fkMarca = document.getElementById('FKMarca').value;

    if (fkMarca == -1) {
      document.getElementById("respMarca").innerHTML = " * Selecione a marca";
      return false;
    } else {
      document.getElementById("respMarca").innerHTML = "";
    }
  }
</script>
<script>
  function SelectFornecedor() {
    var FkFornecedor = document.getElementById('FkFornecedor').value;

    if (FkFornecedor == -1) {
      document.getElementById("respFornecedor").innerHTML = " * Selecione o Fornecedor";
      return false;
    } else {
      document.getElementById("respFornecedor").innerHTML = "";
    }
  }
</script>

</body>

</html>