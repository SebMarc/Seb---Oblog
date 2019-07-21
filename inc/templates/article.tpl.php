<article class="card">
    <div class="card-body">
    <h2 class="card-title">
        <?= $article->title ?>
        <!-- <?php var_dump($article);?> -->
    </h2>
    <p class="card-text">
        <?= $article->content ?>
    </p>
    <p class="infos">
        Posté par <a href="#" class="card-link"><?= $authors[$article->author]->getName() ?></a> le <time><?= $article->getDateFr() ?></time> dans <a href="#"
        class="card-link">#<?= $categories[$article->category]->getName() ?></a>
    </p>
    </div>
</article>