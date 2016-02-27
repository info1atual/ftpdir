<?php
	require_once('config/define.php');
	class Conexao {

            public $conftp;
        //Variaveis
		public function __construct()
		{
			  $dados = array(
		        "host" => FTP_HOST,
		        "usuario" => FTP_USER,
		        "senha" => FTP_PASS
				);

		    $fconn = ftp_connect($dados["host"]);
		    $login = ftp_login($fconn, $dados["usuario"], $dados["senha"]);

		   $this->conftp = $fconn;
		}

	}