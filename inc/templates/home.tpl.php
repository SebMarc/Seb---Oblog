
<!-- <?php  var_dump($articles); ?>
<?php  var_dump($categories); ?> -->
<?php foreach ($articles as $currentId => $currentArticle) : ?>

      <!-- Affichage avec une card: https://getbootstrap.com/docs/4.1/components/card/ -->
        <article class="card">
          <div class="card-body">
            <h2 class="card-title">
              <a href="index.php?page=article&id=<?= $currentId ?>">
                <?= $currentArticle->title ?>
              </a>
            </h2>
            <p class="card-text">
              <?= $currentArticle->content ?>
            </p>
            <p class="infos">
              Posté par <a href="#" class="card-link"><?= $authors[$currentArticle->author]->getName() ?></a> le <time><?= $currentArticle->getDateFr() ?></time> dans <a href="#"
              class="card-link">#<?= $categories[$currentArticle->category]->getName() ?></a>
            </p>
          </div>
        </article>

<?php endforeach ?>


  


        <!-- Navigation par pagination : https://getbootstrap.com/docs/4.1/components/pagination/ -->
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-between">
            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-arrow-left"></i> Précédent</a></li>
            <li class="page-item"><a class="page-link" href="#">Suivant <i class="fas fa-arrow-right"></i></a></li>
          </ul>
        </nav>