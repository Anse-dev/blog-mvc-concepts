<h1>Hello word</h1>
<?php foreach ($marques as $marque) { ?>
  <div>
    <h2><?= $marque->getNom()  ?> </h2>
    <p><?= $marque->getDescription()  ?> </p>
  </div>
<?php } ?>
