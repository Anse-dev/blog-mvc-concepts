 <!-- end  -->
 <section class="wrapper">
   <div class="container">
     <div class="wrapper-content">
       <aside>
         <div class="search">
           <form action="/search">
             <input type="text" name="q" value="" placeholder="Rechercher..." />
             <button type="submit">Rechercher</button>
           </form>
         </div>
         <div class="categories">
           <h2>Catégories</h2>
           <ul>
             <?php foreach ($categories as $category) {   ?>
               <li>
                 <a href="/category/<?= $category->getId() ?>">
                   <?= $category->getTitle() ?>
                 </a>
               </li>
             <?php }  ?>

           </ul>
         </div>
       </aside>
       <main>
         <h1>Articles récents</h1>
         <div class="articles">
           <?php foreach ($articles as $article) {   ?>
             <div class="article">
               <img src="https://images.pexels.com/photos/8948347/pexels-photo-8948347.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Article 1" />
               <h2> <?= $article->getTitle()   ?></h2>
               <p class="clamp"><?= $article->getContent()   ?></p>

               <div class="article-info">
                 <span class="views">1255 vues</span>
                 <span class="category">Catégorie : Catégorie 1</span>
                 <span class="author">Auteur : John Doe</span>
                 <span class="date">Date : 10 octobre 2023</span>
                 <span class="read-time">Temps de lecture : 5 minutes</span>
               </div>
               <a href="/article/<?= $article->getId() ?>">Voir</a>
             </div>
           <?php }  ?>
         </div>
       </main>
     </div>
   </div>
 </section>
