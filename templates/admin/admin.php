<h1>bienvenue sur la page Administration</h1>

<div class="section">
  <h2>Ajouter une marque</h2>
  <p>Les champs avec <span>*</span> sont obligatoires</p>
  <form action="/administration" method="post">
    <div class="form-group">
      <label for="nom">Nom de la Marque *</label>
      <input type="text" id="nom" placeholder="Entrez le nom de la marque" name="nom" required>
    </div>
    <div class="form-group">
      <label for="description">La description de la Marque *</label>
      <textarea name="description" id="description" placeholder="Entrez la description de la marque "></textarea>
    </div>
    <button type="submit" name="form-marque">Enregistrer</button>
  </form>
</div>

<div class="section">
  <h2>Ajouter une Voiture </h2>
  <p>Les champs avec <span>*</span> sont obligatoires</p>
  <form action="/administration" method="post">
    <div class="form-group">
      <label for="modele">Modèle de la voiture *</label>
      <input type="text" id="modele" name="modele" placeholder="Entrez le modele de la voiture" required>
    </div>
    <div class="form-group ">
      <select class="form-select" aria-label="Default select example" required>
        <option selected>Choisisez la marque </option>
        <?php foreach ($marques as $marque) { ?>
          <option value="<?= $marque->getId()  ?>"><?= $marque->getNom()  ?></option>
        <?php } ?>


      </select>
    </div>
    <div class="form-group">
      <label for="description">L'année de la voiture*</label>
      <input type="date" name="date">
    </div>
    <button type="submit" name="form-voiture">Enregistrer</button>
  </form>
</div>
