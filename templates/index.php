 <!-- Header -->
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
 <!-- End Header -->
 <!-- Carousel -->
 <div class="carousel">
   <div class="slide active">
     <img src="https://images.pexels.com/photos/2827374/pexels-photo-2827374.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Slide 1" />
     <div class="caption">Slide 1 Caption</div>
   </div>
   <div class="slide">
     <img src="https://images.pexels.com/photos/8948347/pexels-photo-8948347.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Slide 2" />
     <div class="caption">Slide 2 Caption</div>
   </div>
   <div class="slide">
     <img src="https://images.pexels.com/photos/631317/pexels-photo-631317.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Slide 3" />
     <div class="caption">Slide 3 Caption</div>
   </div>
 </div>

 <!-- end  -->
 <section class="wrapper">
   <div class="container">
     <div class="wrapper-content">
       <aside>
         <div class="search">
           <form action="/category/12">
             <input type="text" name="q" value="" placeholder="Rechercher..." />
             <button type="submit">Rechercher</button>
           </form>
         </div>
         <div class="categories">
           <h2>Catégories</h2>
           <ul>
             <?php foreach ($categories as $category) {   ?>
               <li>
                 <a href="/Category/<?= $category->getId() ?>">
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
               <p class=""><?= $article->getContent()   ?></p>

               <div class="article-info">
                 <span class="views">1255 vues</span>
                 <span class="category">Catégorie : Catégorie 1</span>
                 <span class="author">Auteur : John Doe</span>
                 <span class="date">Date : 10 octobre 2023</span>
                 <span class="read-time">Temps de lecture : 5 minutes</span>
               </div>
               <a href="./article.html">Voir</a>
             </div>
           <?php }  ?>
         </div>
       </main>
     </div>
   </div>
 </section>

 <!-- Content goes here -->
