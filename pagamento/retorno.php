<?php require_once("../include/header.php"); ?>

  <body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="../Images/Logo/LogoOFC.png" alt="" width="72"    >
        <h2>Pagamento MeatPrime Informa:</h2>
      </div>

      <div class="row">
        
        <div class="col-md-12">
			<?php
			if(isset($_GET['cod'])){
			if($_GET['cod'] == "0"){ ?>
			<div class="alert alert-success" role="alert">
			  Pagamento realizado com sucesso! <?php echo "TID " . $_GET['TID']; ?>
			</div>
			<?php }else if($_GET['cod'] == "1"){ ?>
			<div class="alert alert-danger" role="alert">
			  Falha ao realizar o pagamento! <?php echo "Status: " . $_GET['status'] . " | Erro: " . $_GET['erro']; ?>
			</div>
			<?php }else{ ?>
			<div class="alert alert-danger" role="alert">
			  Falha ao realizar o pagamento! <?php echo "Erro Integração : " . $_GET['erro']; ?>
			</div>				
			<?php }}?>
        </div>
      </div>
    </div>
  </body>

  <?php require_once("../include/footer.php")?>
</html>
