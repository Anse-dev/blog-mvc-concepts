<?php
$isLoged = (isset($_SESSION["user"]) and $_SESSION["user"]["role"] == "user") ?? null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../css/style.css" />
  <title>Header avec Menu Responsive</title>
  <script async src="../../js/main.js"></script>
</head>

<body>
  <!-- Header -->
  <header>
    <div class="container">
      <div class="header-content">
        <a class="logo" href="/">
          <h1>Mon Blog</h1>
        </a>
        <nav>
          <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Articles</a></li>
            <li><a href="#">Catégories</a></li>
            <li><a href="#">À propos</a></li>
            <li><a href="#">Contact</a></li>
            <?php if ($isLoged) {  ?>
              <li> <a href="/logout">Logout</a></li>
            <?php } else {  ?>
              <li> <a href="/login">Login</a></li>
            <?php } ?>
            <li> <a href="/register">Register</a></li>
          </ul>
        </nav>
        <div class="menu-toggle">
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
        </div>
      </div>
    </div>
  </header>
  <!-- End Header -->

  <?php echo $content ?>


</html>
