<div class="banner">
  <img src="https://images.pexels.com/photos/8948347/pexels-photo-8948347.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Article Banner" />
</div>
<div class="container">
  <article class="article-detail">
    <h1><?= $article->getTitle()  ?></h1>
    <p><?= $article->getContent()  ?></p>
    <div class="">
      <img src="https://images.pexels.com/photos/8948347/pexels-photo-8948347.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Article Banner" />
    </div>
    <p>Contenu de l'article.</p>
  </article>
  <section class="comments">
    <h2>Commentaires</h2>
    <form class="comment-form">
      <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" id="name" />
      </div>
      <div class="form-group">
        <label for="comment">Commentaire</label>
        <textarea id="comment" rows="4"></textarea>
      </div>
      <button type="submit" class="submit-button">Soumettre le commentaire</button>
    </form>
    <div class="comment">
      <div class="comment-content">
        <h3>Nom de l'utilisateur</h3>
        <p>Commentaire de l'utilisateur.</p>
      </div>
      <button class="reply-button">Répondre</button>
    </div>
    <!-- Répétez cette structure pour d'autres commentaires -->
  </section>
</div>
</body>
