<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>

	<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['AddMatches'])) {
		$postData = [
			'hazai' => $_POST['hazai'],
				'vendeg' => $_POST['vendeg'],
				'datum' => $_POST['datum'],
				'eredmeny' => $_POST['eredmeny'],
				'liga' => $_POST['liga']
		];

		if(empty($postData['hazai']) || empty($postData['vendeg']) || empty($postData['datum']) || empty($postData['eredmeny']) || empty($postData['liga']) ) {
			echo "Hiányzó adat(ok)!";
		} else {
			$query = "INSERT INTO clubs (nev,stadion,megalakulas,edzo,liga) VALUES (:hazai, :vendeg, :datum, :eredmeny,:liga)";
			$params = [
				':hazai' => $postData['hazai'],
				':vendeg' => $postData['vendeg'],
				':datum' => $postData['datum'],
				':eredmeny' => $postData['eredmeny'],
				':liga' => $postData['liga']
			];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Hiba az adatbevitel során!";
			} header('Location: index.php');
		}
	}
	?>
	<div id="Reteg3">
<form method="POST">
	 <div class="row">
    <div class="col">
      <input type="text" class="form-control" name="hazai" placeholder="Klubb neve">
    </div>
       <div class="col">
      <input type="text" class="form-control" name="eredmeny" placeholder="Klubb stadionja">
    </div>
    <div class="col">
      <input type="text" class="form-control" name="vendeg" placeholder="megalakulas(YYYY-MM-DD)">
    </div>
     <div class="col">
      <input type="text" class="form-control" name="datum" placeholder="Edző neve">
    </div>
     <div class="col">
      <input type="text" class="form-control" name="liga" placeholder="Klubb ligája">
    </div>
  </div>
  <div class="col">
  	<button class="btn1 mt-3" type="submit" name="AddMatches">Kész</button>
  </div>	
</form>
</div>

<?php endif; ?>