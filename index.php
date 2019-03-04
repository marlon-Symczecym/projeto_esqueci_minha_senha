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
    <title>Login</title>
</head>
<body style="background-color: #111228">

    <div class="container" >
        <div class="row col-md-12 justify-content-center">
            <div class="card" style="width: 500px; margin-top: 50px">
                <div class="card-header col-md-12 text-center h4">Login</div>
                <div class="card-body text-center">
                    <form method="post" class="form">
                        <input class="form-control" id="email" type="email" name="email" required  placeholder="E-mail..."/><br/>
                        <input class="form-control" id="senha" type="password" name="senha" required  placeholder="Senha..."/><br/>

                        <a href="esqueci.php"><button class="btn btn-link ">Esqueci a senha</button></a><br/><br/>
                        <input class="btn btn-outline-success col-md-6 text-center" type="submit" name="acao" value="Logar" />
                    </form>
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