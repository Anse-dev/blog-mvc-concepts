<div class="container">

  <h1>Login</h1>
  <form action="/login" method="POST">
    <?php if (!is_null($error)) { ?>
      <span class="error"><?= $error ?></span>
    <?php } ?>
    <?php if (!is_null($succes)) { ?>
      <span class="succes"><?= $succes ?></span>
    <?php } ?>
    <div class="field-group">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" required="required">
    </div>
    <div class="field-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" required="required">
    </div>
    <button type="submit">
      Envoyer
    </button>
  </form>
</div>
