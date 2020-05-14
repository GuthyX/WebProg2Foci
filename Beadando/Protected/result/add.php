<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>

	<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['AddMatches'])) {
		$postData = [
			'hazai' => $_POST['hazai'],
				'vendeg' => $_POST['vendeg'],
				'datum' => $_POST['datum'],
				'eredmeny' => $_POST['eredmeny']
		];

		if(empty($postData['hazai']) || empty($postData['vendeg']) || empty($postData['datum']) || empty($postData['eredmeny']) ) {
			echo "Hiányzó adat(ok)!";
		} else {
			$query = "INSERT INTO matches (hazai,vendeg,datum,eredmeny) VALUES (:hazai, :vendeg, :datum, :eredmeny)";
			$params = [
				':hazai' => $postData['hazai'],
				':vendeg' => $postData['vendeg'],
				':datum' => $postData['datum'],
				':eredmeny' => $postData['eredmeny'],
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
      <input type="text" class="form-control" name="hazai" placeholder="Hazai csapat">
    </div>
       <div class="col">
      <input type="text" class="form-control" name="eredmeny" placeholder="Eredmény(PL.: 2:1)">
    </div>
    <div class="col">
      <input type="text" class="form-control" name="vendeg" placeholder="Vendég csapat">
    </div>
     <div class="col">
      <input type="text" class="form-control" name="datum" placeholder="Dátum(YYYY-MM-DD)">
    </div>
  </div>
  <div class="col">
  	<button class="btn1 mt-3" type="submit" name="AddMatches">Kész</button>
  </div>	
</form>
</div>

<?php endif; ?>