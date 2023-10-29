<div class="dashboard">
  <?php include  "aside.php" ?>
  <main class="content">
    <div class="container">
      <section class="article-section">
        <h2>Créer un Administrateur pour gerer le blog</h2>
        <?php if (isset($succes) and !is_null($succes)) { ?>
          <span class="succes"><?= $succes ?></span>
        <?php } ?>
        <form class="article-form" method="POST" action="/admin/create">
          <div class="field-group">
            <label for="name">Le nom <span>*</span></label>
            <input type="text" name="name" id="name" class="form-control" required="required" maxlength="32">
          </div>
          <div class="field-group">
            <label for="email">Email <span>*</span></label>
            <input type="email" name="email" id="email" class="form-control" required="required">
          </div>
          <div class="field-group">
            <label for="password">Password <span>*</span></label>
            <input type="password" name="password" id="password" class="form-control" required="required" maxlength="8">
          </div>
          <div class="field-group">
            <label for="confirm_password">Confirmez Password <span>*</span></label>
            <input type="password" name="confirm_password" id="confirm_password" class="form-control" required="required" maxlength="8">
            <?php if (isset($error) and !is_null($error)) { ?>
              <span class="error"><?= $error ?></span>
            <?php } ?>
          </div>

          <div class="field-select">
            <select name="role" id="role">
              <option value="admin">admin</option>
              <option value="super_admin">super-admin</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Créer</button>
        </form>
      </section>
    </div>
  </main>
</div>
