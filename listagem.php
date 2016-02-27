<?php
    require_once('config/config.php');
    $conn = new Conexao();
    $diretorios = ftp_nlist($conn->conftp, ".");


    $listar = ftp_nlist($conn->conftp,"".$diretorios[2]);
    $buff = ftp_rawlist($conn->conftp, "-");
    //echo '<pre>';
    //print_r($buff['0']);
    //exit;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagem FTP</title>
    <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="plugins/js/bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>

    <link rel="stylesheet" href="plugins/css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/font-awesome.css">
</head>
<body>

    <div class="container">
        <h2>Listagem de arquivos FTP</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Tamanho</th>
                        <th>Abrir</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php foreach($listar as $item) { ?>
                            <tr>
                                <td><?php echo $item; ?></td>
                                <th></th>
                                <td><a href="#"><i class="fa fa-search fa-1x"></i></td>
                            </tr>
                        <?php }?>
                    </tbody>
            </table>
    </div>

</body>
</html>