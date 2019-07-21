<h1>
  <?= $categories[$_GET['id']]->getName() ?>
  <!-- <?php var_dump($categories)?>; -->
</h1>
<!-- <?php var_dump($articles);?> -->

<?php foreach ($articles as $currentId => $currentArticle) : ?>

      <?php if(($_GET['id']) == (($articles[$currentId])->category)) : ?> 
        
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
                class="card-link">#<?=  $categories[$currentArticle->category]->getName() ?></a>
            </p>
          </div>
        </article>
      
      <?php endif ?>
<?php endforeach ?>