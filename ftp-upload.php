<?php 
    
    $dados = array(
        "host" => FTP_HOST,
        "usuario" => FTP_USER,
        "senha" => FTP_PASS
    );

    $fconn = ftp_connect($dados["host"]);
    $login = ftp_login($fconn, $dados["usuario"], $dados["senha"]);

    $projeto        = $_POST["projeto"];
    $ano_mes        = $_POST["ano_mes"];

    $projeto_dir    = "backups/{$projeto}";
    $upload_dir     = "backups/{$projeto}/{$ano_mes}";
    $destino        = $upload_dir."/".$_FILES["arquivo"]["name"];

    $arquivo = $_FILES["arquivo"]["name"];
    $origem_dir     = dirname(__FILE__) . "/" . $upload_dir;
    $arquivo_origem = dirname(__FILE__) . "/" . $upload_dir . "/" . $arquivo;
    $destino_dir = $upload_dir;

    if ( !is_dir($projeto_dir) ) {
       mkdir($projeto_dir);
    }

    if ( !is_dir($upload_dir) ) {
       mkdir($upload_dir);
    }

    $retorno = move_uploaded_file($_FILES["arquivo"]["tmp_name"], $destino);
    
    if ($retorno) {
        echo "Arquivo recebido! <br>";

        try {

            if (!$fconn || !$login) { 

                die('A conexão falhou!'); 

            }

            if (!ftp_is_dir($fconn, $projeto_dir)) {

                ftp_mkdir($fconn, $projeto_dir);

            } else {

                if (!ftp_is_dir($fconn, $destino_dir)) {

                    ftp_mkdir($fconn, $projeto_dir."/".$ano_mes);

                }
                
            }

            ftp_put($fconn, $destino_dir."/".$arquivo, $arquivo_origem, FTP_BINARY);
            ftp_close($fconn);
            
        } catch (FtpException $e) {

            echo 'Error: ', $e->getMessage();

        }

    } else {

        echo "Houve um problema!";

    }

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