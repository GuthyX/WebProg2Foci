<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
  $postData = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
  ];

  if(empty($postData['email']) || empty($postData['password'])) {
    echo "Hiányzó adat(ok)!";
  } else if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
    echo "Hibás email formátum!";
  } else if(!UserLogin($postData['email'], $postData['password'])) {
    echo "Hibás email cím vagy jelszó!";
  }

  $postData['password'] = "";
}
?>

<div class="login-page" >
  <div class="form">
    <form class="login-form" method="POST">
      <input type="email" name="email" placeholder="email" value="<?= isset($postData) ? $postData['email'] : '';?>"/>
      <input type="password" name="password" placeholder="jelsző" value=""/>
      <button type="submit" name="login">Belépés</button>
      <p class="message">Nincs fiokod? <a href="?P=register">Készíts egyet!</a></p>
    </form>
  </div>
</div>