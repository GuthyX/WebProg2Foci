
<?php if(!isset($_SESSION['permission']) ) : ?>
	<div class="kijelentkezve">
		<hr color="#FFFFFF" style="border-bottom: 10px solid #FFFFFF; padding: 0">
	<h1>Ön nincs bejelntkezve! </h1>
	<p>Az oldal használatához be kell jelentkeznie</p></div>

	<?php else : ?>
		<?php 
if(array_key_exists('d', $_GET) && !empty($_GET['d'])) {
$query = "DELETE FROM clubs WHERE id = :id";
$params = [':id' => $_GET['d']];
require_once DATABASE_CONTROLLER;
if (!executeDML($query,$params)) {
	echo "Hiba törlés közben!";
}
}
 ?>

<?php 
	$query = "SELECT id,nev,stadion,megalakulas,edzo,liga FROM clubs ORDER by liga ASC;";
	require_once DATABASE_CONTROLLER;
	$clubs = getList($query);

?>
	  <h1>Klubbok</h1>
	    <?php if ($_SESSION['permission'] > 1): ?>
 <button class="ResultAdd"><a href="?P=add_club">Hozzáadd</a></button>
 <?php endif ?>
	<?php if(count($clubs) <= 0) : ?>
					<table class="table ">
	
		  <tbody>
		  			<h3>Nincs klubb</h3>
		  </tbody>
		
	<?php else : ?>	
			<table class="table ">
			<thead >
				<td>Név</td>
				<td>stadion</td>
				<td>megalakulas</td>
				<td>edzo</td>
				<td>liga</td>
				<td></td>
				<td>	 </td>
			</thead>
		  <tbody>
		  	<?php $i = 0; ?>
				<?php foreach ($clubs as $m) : ?>
					<?php $i++; ?>
		    <tr>  
		      <td><?=$m['nev']?></td>
		      <td><?=$m['stadion']?></td>
		      <td><?=$m['megalakulas']?></td>
		      <td><?=$m['edzo']?></td>
		      <td><?=$m['liga']?></td>
		      <?php if ($_SESSION['permission'] > 1): ?>
		      	
		  
		      <td><a href="?P=clubs&d=<?=$m['id']?>"><button class="btn1">Törlés</button></a></td>
		    <td> <button class="btn1"><a href="?P=edit_club&?c=<?=$m['id'] ?>">Módosít</a></button></td>
		        <?php endif ?>
			
		    </tr>
		   <?php endforeach;?>
		  </tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>