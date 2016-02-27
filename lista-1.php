	
	<div class="gen100 top2 borda-bottom"></div>

	<?php 
        
        if (!empty($arquivos)) {

        	foreach ($arquivos as $arquivo) {
        	
        	if (!is_dir($arquivo)) {

        			$texto = array(".", "_", "backup-", "bkp", "bkeasy", "easypdv-");
					$nome = str_replace($texto, "", $arquivo);
					$tamanho = fileSizeConvert(filesize($arquivo));
					$data = date("d/m/Y H:i", filectime($arquivo));
					$data2 = date("Y-m-d H:i", filectime($arquivo));
					$dias = diasArquivo($arquivo);
				
			    $link = base_url("downloads") . "?file=" . basename($arquivo) . "&consulta={$consulta}&periodo={$periodo}";
			    // $link = base_url("downloads") . "?file=" . basename($arquivo) . "&consulta={$consulta}";

    ?>

	<div id="box-results">

		<div id="arquivo-nome">
			
			<a class="link_file" href="<?php echo $link ?>">
				<span class="arquivo-nome"><?php echo basename(strtoupper($nome)); ?></span>
			</a>

		</div> <!-- fim arquivo-nome -->

		<div id="arquivo-tamanho">
			
			<span class="arquivo-tamanho" id="arquivo-down">
				<?php 

					echo $tamanho;

				?>
			</span>

		</div> <!-- fim arquivo-tamanho -->

		<div id="arquivo-data">
			
			<span class="arquivo-data">
				<?php 

					echo $data;

				?>
			</span>
			<span class="<?php 

					if ($dias <= 3) {

						echo "arquivo-atualizacao-green";
					} else if ($dias >= 7) {

						echo "arquivo-atualizacao-red";
					} else {

						echo "arquivo-atualizacao";
					}

					?>"><?php 

						if ($dias > 1) { 

							echo $dias . " dias"; 

						} else if ($dias == 0 ) {

							echo "Hoje"; 

						} else {

							echo "Ontem";
						} // echo tempoArquivo($data2); } } 

						?></span>

		</div> <!-- fim arquivo-data -->

	</div> <!-- fim box-result-consulta -->

	<?php
	 			
	 		}

        	}
	
	?>
	
	<br>

	<?php

		} else {

			echo "<div id='box-sem-resultado'>";
				
				echo "<div class='gen50 centro top2'>";

				echo "<div style='width: 100%; margin: 0;';>Nada encontrado!</div>";
				
				echo "</div>";

			echo "</div>";

		}

    ?>

    <script type="text/javascript">

	    $("#result").on("click", "#link-ocultar", function() {

	    	id = $(this).data("numero-id");

	    });

    </script>
