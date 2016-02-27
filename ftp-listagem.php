<?php 
    
    include_once('define.php');

    $dados = array(
        "host" => FTP_HOST,
        "usuario" => FTP_USER,
        "senha" => FTP_PASS
    );

    $fconn = ftp_connect($dados["host"]);
    $login = ftp_login($fconn, $dados["usuario"], $dados["senha"]);
    $contents = ftp_nlist($fconn, "htdocs");


    echo "<pre>";
    print_r($contents);
    // Identifica erros
    print_r(error_get_last());

    // function ftp_is_dir($ftp, $dir)
    // {
    //     $pushd = ftp_pwd($ftp);

    //     if ($pushd !== false && @ftp_chdir($ftp, $dir))
    //     {
    //         ftp_chdir($ftp, $pushd);   
    //         return true;
    //     }

    //     return false;
    // } 
    
