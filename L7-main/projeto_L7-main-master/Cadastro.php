
<?php
include_once 'C:/xampp/htdocs/L7/projeto_L7-main-master/Controller/PessoaController.php';
include_once 'C:/xampp/htdocs/L7/projeto_L7-main-master/model/Pessoa.php';
include_once 'C:/xampp/htdocs/L7/projeto_L7-main-master/model/Endereco.php';
include_once 'C:/xampp/htdocs/L7/projeto_L7-main-master/model/Mensagem.php';
$msg = new Mensagem();
$en = new Endereco();
$pe = new Pessoa();
$pe->setFkendereco($en);
$btEnviar = FALSE;
$btAtualizar = FALSE;
$btExcluir = FALSE;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .btInput {
            margin-top: 20px;
        }
    </style>
            <script>
            function mascara(t, mask) {
                var i = t.value.length;
                var saida = mask.substring(1, 0);
                var texto = mask.substring(i)

                if (texto.substring(0, 1) != saida) {
                    t.value += texto.substring(0, 1);
                }
            }
        </script>
</head>

<body>
    <header style="color: white;">

    </header>
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
                        <a href="#" class="nav-link">Contato</a>
                    </li>
                </ul>
                <div>
                    <a href="#" class="animated-button1">
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

    <div class="container-fluid">
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-4">

                <div class="card-header bg-dark text-center text-white border" style="padding-bottom: 15px; padding-top: 15px;">
                    Cadastro de Cliente
                </div>
                <div class="card-body border">
                    <?php
                    //envio dos dados para o BD
                    if (isset($_POST['cadastrarPessoa'])) {
                        $nome = trim($_POST['nome']);
                        if ($nome != "") {
                            $dtNascimento = $_POST['dtNascimento'];
                            $email = $_POST['email'];
                            $senha = $_POST['senha'];
                            $perfil = $_POST['perfil'];
                            $cpf = $_POST['cpf'];
                            $cep = $_POST['cep'];
                            $logradouro = $_POST['logradouro'];
                            $numero = $_POST['numero'];
                            $complemento = $_POST['complemento'];
                            $bairro = $_POST['bairro'];
                            $cidade = $_POST['cidade'];
                            $uf = $_POST['uf'];

                            $fc = new PessoaController();
                            unset($_POST['cadastrarPessoa']);
                            $msg = $fc->inserirPessoa(
                                $nome,
                                $dtNascimento,
                                $email,
                                $senha,
                                $perfil,
                                $cpf,
                                $cep,
                                $logradouro,
                                $numero,
                                $complemento,
                                $bairro,
                                $cidade,
                                $uf
                            );
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastro.php'\">";
                        }
                    }

                    //método para atualizar dados do produto no BD
                    if (isset($_POST['atualizarPessoa'])) {
                        $nome = trim($_POST['nome']);
                        if ($nome != "") {
                            $idpessoa = $_POST['idPessoa'];
                            $dtNascimento = $_POST['dtNascimento'];
                            $email = $_POST['email'];
                            $senha = $_POST['senha'];
                            $perfil = $_POST['perfil'];
                            $cpf = $_POST['cpf'];
                            $cep = $_POST['cep'];
                            $logradouro = $_POST['logradouro'];
                            $numero = $_POST['numero'];
                            $complemento = $_POST['complemento'];
                            $bairro = $_POST['bairro'];
                            $cidade = $_POST['cidade'];
                            $uf = $_POST['uf'];

                            $pe = new PessoaController();
                            unset($_POST['atualizarPessoa']);
                            $msg = $fc->atualizarPessoa(
                                $idpessoa,
                                $nome,
                                $dtNascimento,
                                $email,
                                $senha,
                                $perfil,
                                $cpf,
                                $cep,
                                $logradouro,
                                $numero,
                                $complemento,
                                $bairro,
                                $cidade,
                                $uf
                            );
                            echo $msg->getMsg();
                            /*echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastro.php'\">";*/
                        }
                    }

                    if (isset($_POST['excluir'])) {
                        if ($pe != null) {
                            $id = $_POST['ide'];

                            $fc = new PessoaController();
                            unset($_POST['excluir']);
                            $msg = $fc->excluirPessoa($id);
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastro.php'\">";
                        }
                    }

                    if (isset($_POST['excluirPessoa'])) {
                        if ($pe != null) {
                            $id = $_POST['idpessoa'];
                            unset($_POST['excluirPessoa']);
                            $pc = new PessoaController();
                            $msg = $fc->excluirPessoa($id);
                            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastro.php'\">";
                        }
                    }

                    if (isset($_POST['limpar'])) {
                        $pe = null;
                        unset($_GET['id']);
                        header("Location: cadastro.php");
                    }
                    if (isset($_GET['id'])) {
                        $btEnviar = TRUE;
                        $btAtualizar = TRUE;
                        $btExcluir = TRUE;
                        $id = $_GET['id'];
                        $pc = new PessoaController();
                        $pe = $fc->pesquisarPessoaId($id);
                    }
                    ?>

                    <form method="post" action="">
                        <div class="row">
                            <div class="col-md-12">
                                <strong>Código: <label style="color:red;">
                                        <?php
                                        if ($pe != null) {
                                            echo $pe->getIdpessoa();
                                        ?>
                                    </label></strong>
                                <input type="hidden" name="idpessoa" value="<?php echo $pe->getIdpessoa(); ?>"><br>
                            <?php
                                        }
                            ?>
                            <label>Nome Completo</label>
                            <input class="form-control" type="text" name="nome" value="<?php echo $pe->getNome(); ?>">
                            <label>Data de Nascimento</label>
                            <input class="form-control" type="date" name="dtNascimento" value="<?php echo $pe->getdtNascimento(); ?>">
                            <label>CPF</label>
                            <label id="valCpf" style="color: red; font-size: 11px;"></label>
                            <input class="form-control" type="text" id="cpf" onkeypress="mascara(this, '###.###.###-##')" maxlength="14" onblur="return validaCpfCnpj();" name="cpf" required="required">
                            <label>E-Mail</label>
                            <input class="form-control" type="email" name="email" value="<?php echo $pe->getEmail(); ?>">
                            <label>Senha</label>
                            <input class="form-control" type="password" name="senha">
                            <label>Conf. Senha</label>
                            <input class="form-control" type="password" name="senha2">
                            <label>CEP</label><br>
                            <input class="form-control" type="text" id="cep" onkeypress="mascara(this, '#####-###')" maxlength="9" value="<?php echo $pe->getFkendereco()->getCep(); ?>" name="cep">
                            <label>Logradouro</label>
                            <input type="text" class="form-control" name="logradouro" id="rua" value="<?php echo $pe->getFkEndereco()->getLogradouro(); ?>">
                            <label>Numero</label>
                            <input type="text" class="form-control" name="numero" id="numero" value="<?php echo $pe->getFkEndereco()->getNumero(); ?>">
                            <label>Complemento</label>
                            <input type="text" class="form-control" name="complemento" id="complemento" value="<?php echo $pe->getFkEndereco()->getComplemento(); ?>">
                            
                            <label>Bairro</label>
                            <input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo $pe->getFkEndereco()->getBairro(); ?>">
                            <label>Cidade</label>
                            <input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $pe->getFkEndereco()->getCidade(); ?>">
                            <label>UF</label>
                            <input type="text" class="form-control" name="uf" id="uf" value="<?php echo $pe->getFkEndereco()->getUf(); ?>" maxlength="100">
                            </div>

                            <div class="col-md-12">
                                <br>
                                <label>Perfil</label>
                                <label id="valCep" style="color: red; font-size: 11px;"></label>
                                <select class="form-select" name="perfil">
                                    <option>[--Selecione--]</option>
                                    <option <?php
                                            if ($pe->getPerfil() == "Administrador") {
                                                echo "selected = 'selected'";
                                            }
                                            ?>>Administrador</option>
                                    <option <?php
                                            if ($pe->getPerfil() == "Funcionário") {
                                                echo "selected = 'selected'";
                                            }
                                            ?>>Funcionário</option>
                                </select>
                                <div>
                                    <input type="submit" name="cadastrarPessoa" class="btn btn-success btInput" value="Enviar" <?php if ($btEnviar == TRUE) echo "disabled"; ?>>
                                    <input type="submit" name="atualizarPessoa" class="btn btn-secondary btInput" value="Atualizar" <?php if ($btAtualizar == FALSE) echo "disabled"; ?>>
                                    <button type="button" class="btn btn-warning btInput" data-bs-toggle="modal" data-bs-target="#ModalExcluir" <?php if ($btExcluir == FALSE) echo "disabled"; ?>>
                                        Excluir
                                    </button>
                                    <input type="submit" class="btn btn-light btInput" name="limpar" value="Limpar">
                                </div>


                                <!-- Modal para excluir -->
                                <div class="modal fade" id="ModalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    Confirmar Exclusão</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Deseja Excluir?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="excluirPessoa" class="btn btn-success " value="Sim">
                                                <input type="submit" class="btn btn-light btInput" name="limpar" value="Não">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>


                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-responsive" style="border-radius: 3px; overflow:hidden; text-align: center;">
                            <thead class="table-dark">
                                <tr>
                                    <th>Código</th>
                                    <th>Pessoa</th>
                                    <th>CPF</th>
                                    <th>E-Mail</th>
                                    <th>Perfil</th>
                                    <th>Logradouro</th>
                                    <th>Complemento</th>
                                    <th>Bairro</th>
                                    <th>Cidade</th>
                                    <th>UF</th>
                                    <th colspan="2">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $fcTable = new PessoaController();
                                $listaPessoas = $fcTable->listarPessoaes();
                                $a = 0;
                                if ($listaPessoas != null) {
                                    foreach ($listaPessoas as $lf) {
                                        $a++;
                                ?>
                                        <tr>
                                            <td><?php print_r($lf->getIdpessoa()); ?></td>
                                            <td><?php print_r($lf->getNome()); ?></td>
                                            <td><?php print_r($lf->getCpf()); ?></td>
                                            <td><?php print_r($lf->getEmail()); ?></td>
                                            <td><?php print_r($lf->getPerfil()); ?></td>
                                            <td><?php print_r($lf->getFkendereco()->getLogradouro()); ?></td>
                                            <td><?php print_r($lf->getFkendereco()->getComplemento()); ?></td>
                                            <td><?php print_r($lf->getFkendereco()->getBairro()); ?></td>
                                            <td><?php print_r($lf->getFkendereco()->getCidade()); ?></td>
                                            <td><?php print_r($lf->getFkendereco()->getUf()); ?></td>
                                            <td><a href="cadastro.php?id=<?php echo $lf->getIdpessoa(); ?>" class="btn btn-light">
                                                    <img src="img/edita.png" width="24"></a>
                                                </form>
                                                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $a; ?>">
                                                    <img src="img/delete.png" width="24"></button>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal<?php echo $a; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="">
                                                            <label><strong>Deseja excluir o fornecedor
                                                                    <?php echo $lf->getNome(); ?>?</strong></label>
                                                            <input type="hidden" name="ide" value="<?php echo $lf->getIdpessoa(); ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="excluir" class="btn btn-primary">Sim</button>
                                                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                                    </div>
                                                    </form>
                                                </div>
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
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jQuery.js"></script>
        <script src="js/jQuery.min.js"></script>
        <script>
            var myModal = document.getElementById('myModal')
            var myInput = document.getElementById('myInput')

            myModal.addEventListener('shown.bs.modal', function() {
                myInput.focus()
            })
        </script>
        <!-- controle de endereço (ViaCep) -->
        <script>
            $(document).ready(function() {

                function limpa_formulário_cep() {
                    // Limpa valores do formulário de cep.
                    $("#rua").val("");
                    $("#bairro").val("");
                    $("#cidade").val("");
                    $("#uf").val("");
                    $("#cepErro").val("");
                }

                //Quando o campo cep perde o foco.
                $("#cep").blur(function() {

                    //Nova variável "cep" somente com dígitos.
                    var cep = $(this).val().replace(/\D/g, '');

                    //Verifica se campo cep possui valor informado.
                    if (cep != "") {

                        //Expressão regular para validar o CEP.
                        var validacep = /^[0-9]{8}$/;

                        //Valida o formato do CEP.
                        if (validacep.test(cep)) {

                            //Preenche os campos com "..." enquanto consulta webservice.
                            $("#rua").val("...");
                            $("#bairro").val("...");
                            $("#cidade").val("...");
                            $("#uf").val("...");

                            //Consulta o webservice viacep.com.br/
                            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                                if (!("erro" in dados)) {
                                    //Atualiza os campos com os valores da consulta.
                                    $("#rua").val(dados.logradouro);
                                    $("#bairro").val(dados.bairro);
                                    $("#cidade").val(dados.localidade);
                                    $("#uf").val(dados.uf);
                                } //end if.
                                else {
                                    //CEP pesquisado não foi encontrado.
                                    limpa_formulário_cep();
                                    document.getElementById("valCep").innerHTML = "* CEP não encontrado";
                                }
                            });
                        } //end if.
                        else {
                            //cep é inválido.
                            limpa_formulário_cep();
                            document.getElementById("valCep").innerHTML = "* Formato inválido";

                        }
                    } //end if.
                    else {
                        //cep sem valor, limpa formulário.
                        limpa_formulário_cep();
                    }
                });
            });
        </script>
        <script>
            function validaCpfCnpj() {
                var val = document.getElementById("cpf").value;
                if (val.length == 14) {
                    var cpf = val.trim();

                    cpf = cpf.replace(/\./g, '');
                    cpf = cpf.replace('-', '');
                    cpf = cpf.split('');

                    var v1 = 0;
                    var v2 = 0;
                    var aux = false;

                    for (var i = 1; cpf.length > i; i++) {
                        if (cpf[i - 1] != cpf[i]) {
                            aux = true;
                        }
                    }

                    if (aux == false) {
                        document.getElementById("valCpf").innerHTML = "* CPF inválido";
                        return false;
                    }

                    for (var i = 0, p = 10;
                        (cpf.length - 2) > i; i++, p--) {
                        v1 += cpf[i] * p;
                    }

                    v1 = ((v1 * 10) % 11);

                    if (v1 == 10) {
                        v1 = 0;
                    }

                    if (v1 != cpf[9]) {
                        document.getElementById("valCpf").innerHTML = "* CPF inválido";
                        return false;
                    }

                    for (var i = 0, p = 11;
                        (cpf.length - 1) > i; i++, p--) {
                        v2 += cpf[i] * p;
                    }

                    v2 = ((v2 * 10) % 11);

                    if (v2 == 10) {
                        v2 = 0;
                    }

                    if (v2 != cpf[10]) {
                        document.getElementById("valCpf").innerHTML = "* CPF inválido";
                        return false;
                    } else {
                        document.getElementById("valCpf").innerHTML = "";
                        return true;
                    }
                } else if (val.length == 18) {
                    var cnpj = val.trim();

                    cnpj = cnpj.replace(/\./g, '');
                    cnpj = cnpj.replace('-', '');
                    cnpj = cnpj.replace('/', '');
                    cnpj = cnpj.split('');

                    var v1 = 0;
                    var v2 = 0;
                    var aux = false;

                    for (var i = 1; cnpj.length > i; i++) {
                        if (cnpj[i - 1] != cnpj[i]) {
                            aux = true;
                        }
                    }

                    if (aux == false) {
                        document.getElementById("valCpf").innerHTML = "* CPF inválido";
                        return false;
                    }

                    for (var i = 0, p1 = 5, p2 = 13;
                        (cnpj.length - 2) > i; i++, p1--, p2--) {
                        if (p1 >= 2) {
                            v1 += cnpj[i] * p1;
                        } else {
                            v1 += cnpj[i] * p2;
                        }
                    }

                    v1 = (v1 % 11);

                    if (v1 < 2) {
                        v1 = 0;
                    } else {
                        v1 = (11 - v1);
                    }

                    if (v1 != cnpj[12]) {
                        document.getElementById("valCpf").innerHTML = "* CPF inválido";
                        return false;
                    }

                    for (var i = 0, p1 = 6, p2 = 14;
                        (cnpj.length - 1) > i; i++, p1--, p2--) {
                        if (p1 >= 2) {
                            v2 += cnpj[i] * p1;
                        } else {
                            v2 += cnpj[i] * p2;
                        }
                    }

                    v2 = (v2 % 11);

                    if (v2 < 2) {
                        v2 = 0;
                    } else {
                        v2 = (11 - v2);
                    }

                    if (v2 != cnpj[13]) {
                        document.getElementById("valCpf").innerHTML = "* CPF inválido";
                        return false;
                    } else {
                        document.getElementById("valCpf").innerHTML = "";
                        return true;
                    }
                } else {
                    document.getElementById("valCpf").innerHTML = "* CPF inválido";
                    return false;
                }
            }
        </script>
</body>

</html>
<?php ob_end_flush(); ?>
© 2021 GitHub, Inc.
Terms
Privacy
Security
Status
Docs
Contact GitHub
Pricing
API
Training
Blog
About
Loading complete