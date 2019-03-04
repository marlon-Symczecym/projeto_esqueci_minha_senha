<?php require 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <title>Conferir E-mail</title>
</head>
<body style="background-color: #111228">

<div class="container" >
    <div class="row col-md-12 justify-content-center">
        <div class="card" style="width: 500px; margin-top: 50px">
            <div class="card-header col-md-12 h4 text-center">Redefinir Senha</div>
            <div class="card-body">
                <?php

                if(isset($_GET['token']))
                    {
                        $token = $_GET['token'];

                        $sql = $pdo->prepare('SELECT * FROM usuarios_token WHERE hash = ? AND used = 0 AND expirado_em > NOW()');
                        $sql->execute(array($token));

                        if($sql->rowCount() > 0)
                        {
                            $sql = $sql->fetch();
                            $id = $sql['id_usuarios'];

                            if(isset($_POST['acao']) && !empty($_POST['senha']))
                            {
                                $senha = md5(addslashes($_POST['senha']));

                                $sql = 'SELECT * FROM usuarios WHERE senha = :senha';
                                $sql = $pdo->prepare($sql);
                                $sql->bindValue(":senha", $senha);
                                $sql->execute();
                                $sql = $sql->fetch();
                                $senha_banco = $sql['senha'];

                                    if ($senha_banco == $senha)
                                    {
                                        echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                                                    A sua senha já existe ! <br />Tente novamente !
                                                    
                                                    <button type=\"button\" class=\"close\" data-dismiss='alert' aria-label=\"Close\">
                                                        <span aria-hidden=\"true\">&times;</span>
                                                    </button>
                                                
                                                </div>";
                                       header("refresh: 2; http://localhost/Teste-Curso/redefinir.php?token=".$token);
                                       exit;
                                    }

                                $sql = 'UPDATE usuarios SET senha = :senha WHERE id = :id';
                                $sql = $pdo->prepare($sql);
                                $sql->bindValue(":senha", $senha);
                                $sql->bindValue(":id", $id);
                                $sql->execute();

                                $sql = 'UPDATE usuarios_token SET used = 1 WHERE id_usuarios = :id_usuarios';
                                $sql = $pdo->prepare($sql);
                                $sql->bindValue(":id_usuarios", $id);
                                $sql->execute();

                                echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                                        A sua senha foi redefinida com sucesso !
                                        
                                        <button type=\"button\" class=\"close\" data-dismiss='alert' aria-label=\"Close\">
                                          <span aria-hidden=\"true\">&times;</span>
                                        </button>
                                    
                                    </div>";

                                header('refresh: 3; index.php');
                                exit;

                        }
                            ?>
                            <a href="index.php"><button class="btn btn-danger" style="margin-bottom: 15px;">Voltar</button></a>
                            <form method="post" class="form text-center">
                                <input class="form-control" type="password" name="senha" required  placeholder="Senha nova..."/><br/>

                                <input class="btn btn-outline-success col-md-6 text-center" type="submit" name="acao" value="Redefinir" />
                            </form>
                            <?php
                        }else
                        {
                            echo "<div class=\"alert alert-info alert-dismissible fade show\" role=\"alert\">
                                        Token não existe ou já foi utilizado !
                                        

                                        <button type=\"button\" class=\"close\" data-dismiss='alert' aria-label=\"Close\">
                                          <span aria-hidden=\"true\">&times;</span>
                                        </button>
                                        
                                 </div>";

                                 header('refresh: 2; index.php');
                        }

                    }

                ?>

            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="js/script.js"></script>

</body>
</html>