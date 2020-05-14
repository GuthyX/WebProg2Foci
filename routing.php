<?php 
if(!array_key_exists('P', $_GET) || empty($_GET['P']))
	$_GET['P'] = 'home';

switch ($_GET['P']) {

	case 'edit_club': IsUserLoggedIn() ? require_once PROTECTED_DIR.'Clubs/edit.php': header('Location: index.php'); break;
	case 'add_club': IsUserLoggedIn() ? require_once PROTECTED_DIR.'Clubs/add.php': 
	header('Location: index.php'); break;
	case 'add_result': IsUserLoggedIn() ? require_once PROTECTED_DIR.'result/add.php': 
	header('Location: index.php'); break;
	case 'home': require_once PROTECTED_DIR.'normal/home.php';  break;
	case 'test': require_once PROTECTED_DIR.'normal/permission_test.php'; break;
	case 'clubs':IsUserLoggedIn() ? require_once PROTECTED_DIR.'Clubs/list.php' : 
	header('Location: index.php'); break;
	case 'news':IsUserLoggedIn() ? require_once PROTECTED_DIR.'Extra/news.php' : 
	header('Location: index.php'); break;
	case 'bestof':IsUserLoggedIn() ? require_once PROTECTED_DIR.'Extra/bestof.php' : 
	header('Location: index.php'); break;
	case 'login': !IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/login.php' : header('Location: index.php'); break;

	case 'register': !IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/register.php' : header('Location: index.php'); break;

	case 'logout': IsUserLoggedIn() ? UserLogout() : header('Location: index.php'); break;

	default: require_once PROTECTED_DIR.'normal/404.php'; break;
}

?>