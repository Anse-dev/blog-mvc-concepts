<div class="dashboard">
  <?php include  "aside.php" ?>
  <main class="content">
    <div class="container">
      <h2> Ajouter un article</h2>
      <form action="/admin/article/create" method="POST">
        <div class="field-group">
          <label for="titre">titre</label>
          <input type="text" name="title" id="titre" required="required" class="form-control">
        </div>
        <div class="field-group">
          <label for="excerpt">Description</label>
          <textarea name="excerpt" id="excerpt" required="required" maxlength="55"></textarea>
        </div>
        <div class="field-group">
          <label for="content">Contenu</label>
          <textarea name="content" id="content" required="required" cols="30" rows="10"></textarea>
        </div>

        <div class="field-group">
          <select name="category" id="">
            <option value="#"> Choisissez la categorie</option>
            <?php foreach ($categories as $categorie) { ?>
              <option value="<?= $categorie->getId() ?>"> <?= $categorie->getTitle() ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="field-group">
          <input type="hidden" name="user-id" value="<?= $_SESSION["user"]["id"] ?>">
        </div>
        <div class="field-group">
          <input type="checkbox" name="published">
          <label for="publish"> Publié ?</label>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter l'Article</button>
      </form>
      </section>
    </div>
  </main>
</div>
