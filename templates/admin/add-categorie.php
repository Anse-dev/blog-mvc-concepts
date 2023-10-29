<div class="dashboard">
  <?php include  "aside.php" ?>
  <main class="content">
    <div class="container">

      <section class="category-section">
        <h2>Ajouter une Catégorie</h2>
        <form class="category-form" method="POST" action="/admin/category/create">
          <div class="field-group">
            <label for="category-name">Nom de la Catégorie</label>
            <input type="text" name="categorie" id="category-name" required="required" class="form-control">
          </div>

          <?php if (!is_null($error)) { ?>
            <span class="error"><?= $error ?></span>
          <?php } ?>
          <?php if (!is_null($succes)) { ?>
            <span class="succes"><?= $succes ?></span>
          <?php } ?>
          <button type="submit" class="btn btn-primary">Ajouter la Catégorie</button>
        </form>
      </section>


    </div>
  </main>
</div>
