  <?php
  $isLoged = (isset($_SESSION["user"]) and $_SESSION["user"]["role"] == "super_admin") ?? null;

  ?>

  <aside class="sidebar">
    <h2>Menu</h2>
    <ul>
      <li><a href="/admin" class="dashboard-link">Tableau de Bord</a></li>
      <li><a href="/admin/category/create" class="category-link">Ajouter une Catégorie</a></li>
      <li><a href="/admin/article/create" class="article-link">Ajouter un Article</a></li>
      <?php if ($isLoged) {  ?>
        <li><a href="/admin/create" class="article-link">Ajouter un Administrateur</a></li>
      <?php }  ?>
      <a href="/admin/logout">Déconnexion</a>
    </ul>
  </aside>
