 <header>
   <div class="container">
     <div class="header-content">
       <h1>Mon Blog</h1>
       <nav>
         <ul>
           <li><a href="#">Accueil</a></li>
           <li><a href="#">Articles</a></li>
           <li><a href="#">Catégories</a></li>
           <li><a href="#">À propos</a></li>
           <li><a href="#">Contact</a></li>
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
 <div class="dashboard">
   <aside class="sidebar">
     <h2>Menu</h2>
     <ul>
       <li><a href="#" class="dashboard-link">Tableau de Bord</a></li>
       <li><a href="#" class="category-link">Ajouter une Catégorie</a></li>
       <li><a href="#" class="article-link">Ajouter un Article</a></li>
     </ul>
   </aside>
   <main class="content">
     <div class="container">
       <section class="category-section">
         <h2>Ajouter une Catégorie</h2>
         <form class="category-form">
           <label for="category-name">Nom de la Catégorie</label>
           <input type="text" id="category-name" class="form-control">
           <button type="submit" class="btn btn-primary">Ajouter la Catégorie</button>
         </form>
       </section>
       <section class="article-section">
         <h2>Ajouter un Article</h2>
         <form class="article-form">
           <label for="article-title">Titre de l'Article</label>
           <input type="text" id="article-title" class="form-control">
           <label for="article-content">Contenu de l'Article</label>
           <textarea id="article-content" class="form-control" rows="4"></textarea>
           <button type="submit" class="btn btn-primary">Ajouter l'Article</button>
         </form>
       </section>
     </div>
   </main>
 </div>
