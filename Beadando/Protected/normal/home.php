<?php if(!isset($_SESSION['permission']) ) : ?>
	<div class="kijelentkezve">
		<hr color="#FFFFFF" style="border-bottom: 10px solid #FFFFFF; padding: 0">
	<h1>Ön nincs bejelntkezve! </h1>
	<p>Az oldal használatához be kell jelentkeznie</p></div>

	<?php else : ?>

<?php 			

if(array_key_exists('d', $_GET) && !empty($_GET['d'])) {


$query = "DELETE FROM matches WHERE id = :id";
$params = [':id' => $_GET['d']];
require_once DATABASE_CONTROLLER;
if (!executeDML($query,$params)) {
	echo "Hiba törlés közben!";
}
}

?>
<?php 
	$query = "SELECT id,hazai,vendeg,datum,eredmeny FROM matches ORDER by datum ASC;";
	require_once DATABASE_CONTROLLER;
	$matches = getList($query);

?>
<p><h2>Üdvözöllek az Oldalon!</h2>
<p>
	Az oldalon megtalálsz mindent ami a focival kapcoslatos!
</p></p>
<?php if ($_SESSION['permission'] > 1) : ?>
<button class="ResultAdd"><a href="?P=add_result" name="b1">Hozzáadd</a></button>
<?php endif; ?>
 <h1>	Eredmények</h1>
	<?php if(count($matches) <= 0) : ?>
					<table class="table ">
		  <tbody>
		  			<h3>Nincs meccs</h3>
		  </tbody>
		
	<?php else : ?>
			<table class="table ">
		  <tbody>
		  	<?php $i = 0; ?>
				<?php foreach ($matches as $m) : ?>
					<?php $i++; ?>
		    <tr>  
		      <td><?=$m['hazai']?></td>
		      <td><?=$m['eredmeny']?></td>
		      <td><?=$m['vendeg']?></td>
		      <td><?=$m['datum']?></td>
		     <?php if ($_SESSION['permission'] > 1) : ?>
		<td><a href="?P=home&d=<?=$m['id']?>"><button class="btn1">Törlés</button></a></td>
	<?php endif; ?>
			    </tr>
		   <?php endforeach;?>
		  </tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>

