<hr>

<a  href="index.php?P=home">Kezdőoldal</a>
<span> &nbsp; | &nbsp; </span>
<?php if(!IsUserLoggedIn()) : ?>

	<a  href="index.php?P=login">Belépés</a>
	<span> &nbsp; | &nbsp; </span>
	<a  href="index.php?P=register">Regisztráció</a>

<?php else : ?>
	<a href="index.php?P=bestof">Hónap legszebb góljai</a>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=news">Hírek</a>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=clubs">Klubbok</a>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=logout">Kilépés</a>
<?php endif; ?>

<hr>