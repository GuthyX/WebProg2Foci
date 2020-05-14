<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else :
	if(!array_key_exists('c', $_GET) || empty($_GET['c'])) : 
		header('Location: index.php');
	else: 

	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editClub'])) {
	$postData = [
		'id' => $_POST['id'],
		'nev' => $_POST['nev'],
		'stadion' => $_POST['stadion'],
		'megalakulas' => $_POST['megalakulas'],
		'edzo' => $_POST['edzo'],
		'liga' => $_POST['liga']
	];
	if($postData['id'] != $_GET['c']) {
		echo "Hiba a klubb azonosítása során!";
	} else {
		if(empty($postData['nev']) || empty($postData['stadion']) || empty($postData['megalakulas']) || empty($postData['edzo']) || $postData['liga'] ) {
			echo "Hiányzó adat(ok)!";
		}  else {
			$query = "UPDATE clubs SET nev = :nev, stadion = :stadion, megalakulas = :megalakulas, edzo = :edzo, liga = :liga WHERE id = :id";
			$params = [
				':nev' => $postData['nev'],
				':stadion' => $postData['stadion'],
				':megalakulas' => $postData['megalakulas'],
				':edzo' => $postData['edzo'],
				':liga' => $postData['liga'],
				':id' => $postData['id']
			];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Hiba az adatbevitel során!";
			} header('Location: ?P=clubs');
		}
	}
}

	$query = "SELECT id,nev,stadion,megalakulas,edzo,liga FROM clubs WHERE id = :id";
	$params = [':id' => $_GET['c']];
	require_once DATABASE_CONTROLLER;
	$clubs = getRecord($query, $params);
	if(empty($clubs)) :
		header('Location: index.php');
else : ?>
		<div id="Reteg3">
		<form method="POST">
			 <div class="row">
		    <div class="col">
		      <input type="text" class="form-control" name="nev" placeholder="Klubb neve" value="<?=$clubs['nev']?>">
		    </div>
		       <div class="col">
		      <input type="text" class="form-control" name="stadion" placeholder="Klubb stadionja" value="<?=$clubs['stadion']?>">
		    </div>
		    <div class="col">
		      <input type="text" class="form-control" name="megalakulas" placeholder="megalakulas(YYYY-MM-DD)" value="<?=$clubs['megalakulas']?>">
		    </div>
		     <div class="col">
		      <input type="text" class="form-control" name="edzo" placeholder="Edző neve" value="<?=$clubs['edzo']?>">
		    </div>
		     <div class="col">
		      <input type="text" class="form-control" name="liga" placeholder="Klubb ligája" value="<?=$clubs['liga']?>">
		    </div>
		  </div>
		  <div class="col">
		  	<button class="btn1 mt-3" type="submit" name="editClub">Kész</button>
		  </div>	
		</form>
		</div>
	<?php endif;

	endif;
endif;
?>
			