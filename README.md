# Atelier oBlog (POO)

## Objectifs

- Intégrer (!) dans notre projet une **intégration HTML/CSS** déjà réalisée par un membre de l'équipe.
- **Dynamiser** cette intégration statique en utilisant les données du projet.
- Sur cette base, structurer plus proprement les données, en utilisant la **programmation orientée objet** (POO).
- Pratiquer un **_workflow_ git**, en codant chaque étape dans une *branche spécifique*, puis *la fusionner dans master* une fois l'étape de travail terminée.

> **Rappels POO**
>
> - La programmation orientée objet nous invite à modéliser les composants d'un projet sous forme de classes.
> - Une classe contient des propriétés : attributs (état) et méthodes (actions sur l'état).
> - Chaque propriété peut être publique (accessible depuis l'extérieur de la classe) ou privée (uniquement à l'intérieur de la classe), selon son utilisation/but.

## Code fourni

- Une intégration HTML/CSS dans la branche git "integration-html-css".
- Un fichier inc/data.php à utiliser à l'étape 4 (dans etape4/inc/data.php).

## Étapes de l'atelier

### Étape 1 - Synchronisation des montres :watch:

La branche git `integration-html-css` contient… une intégration HTML/CSS (étonnant non :see_no_evil:), prête à l'usage. Il ne nous reste plus qu'à la récupérer sur `master`, pour pouvoir ensuite démarrer le travail en PHP.

- Vérifier qu'on se trouve sur la branche `master`. Au besoin, s'y placer.
- Fusionner la branche `integration-html-css`.

> Prendre le temps de lire le code source récupéré. Il semble que l'intégration utilise [Bootstrap](https://getbootstrap.com/)… c'est l'occasion de creuser un peu le sujet (mais sans trop s'attarder, ce n'est que l'étape 1 !)

<details><summary>Indices pour git</summary>

- Changer de branche : `git checkout nom-dune-branche`
- Fusionner une branche : `git merge nom-dune-branche`
- Attention, pour fusionner : on se place sur la branche dans laquelle on souhaite fusionner une autre, et on référence la branche à fusionner dans la commande de fusion (cf. [récap OCR](https://openclassrooms.com/fr/courses/2342361-gerez-votre-code-avec-git-et-github/2433696-fusionnez-des-branches)).
</details>

### Étape 2 - Dynamisation :boom:

On vient de récupérer une version statique du blog sur `master`, plutôt jolie d'ailleurs, mais pas bien intéressante : quand on clique un peu partout, il ne se passe _rien_. Dans cette étape, on se fixe pour objectif de _dynamiser_ le blog, en utilisant PHP pour _générer_ du contenu et des pages à la demande, au lieu de l'avoir en « dur » dans le HTML.

---

**=> Créer une branche `dynamisation` et se placer dedans.**

---

#### 2.1 - Liste d'articles

Le template inc/templates/home.tpl.php contient une liste d'articles codée en dur. Ces mêmes articles sont par ailleurs disponibles sous formes de données brutes dans inc/data.php.

- Remplacer le contenu statique du template par une boucle sur une liste d'objets `Article`, de manière à dynamiser la page d'accueil. La liste d'articles est déjà disponible en tant que `$articlesList`.

> Prêter une attention particulière au lien dans le `<h2>` : au clic, il faut se rendre sur la page de l'article ciblé.

<details><summary>Indice pour la boucle</summary>

``` php
<?php foreach ($articlesList as $currentId => $currentArticle) : ?>
<!-- génération de HTML -->
<?php endforeach ?>
```
</details>

#### 2.2 - Détails d'un article

- Améliorer le template inc/templates/article.tpl.php pour afficher, de manière élégante, _toutes_ les informations d'un article.

> Reprendre le balisage HTML utilisé pour afficher les articles sur la page d'accueil.

#### 2.3 - Liste des catégories

La liste des catégories est affichée à deux endroits : en haut et dans la sidebar à droite. On souhaite remplacer ces deux listes codées en dur dans le HTML par des versions dynamiquement générées en PHP.

- Dans la classe _Data_, ajouter une méthode `getCategories` retournant la liste de toutes les catégories disponibles.
- Dans index.php, utiliser cette méthode pour récupérer la liste des catégories et la stocker dans une variable utilisable dans les templates du site.
- Mettre à profit cette variable pour remplacer les deux listes statiques par des listes dynamiques.

> Pas la peine à ce stade de créer des liens vers les catégories (une cible de lien `"#"` fait l'affaire).

<details><summary>Indices pour dynamiser</summary>

- Pour implémenter `getCategories`, s'inspirer de la méthode `getArticles`.
- La liste des catégories est requise dans plusieurs templates. Pour faire simple, considérer que c'est une information « globale » qui n'a pas à être gérée par une logique de if/else (donc, faire au plus simple !).

</details>

#### 2.4 - Dynamisation des auteurs

- Réaliser le même travail qu'en 2.3, pour la liste des auteurs.

> Pas la peine à ce stade de créer des liens vers les auteurs (une cible de lien `"#"` fait l'affaire).

<details><summary>Exemple de template auteurs</summary>

```html
<!-- Auteurs: https://getbootstrap.com/docs/4.1/components/card/#list-groups -->
<div class="card">
<h3 class="card-header">Auteurs</h3>
<ul class="list-group list-group-flush">
    <?php foreach ($authors as $authorId => $authorName) : ?>
    <li class="list-group-item"><?= $authorName ?></li>
    <?php endforeach; ?>
</ul>
</div>
```

</details>

#### Vérifications

- Vérifier que les listes sont correctement générées, au bon(s) endroit(s).
- Commiter les modifications.

---

**=> Fusionner la branche `dynamisation` dans `master`.**

---

### Étape 3 - Gestion des liens :anchor:

À l'étape précédente, on a dynamisé les listes de catégories et d'auteurs, mais les liens sont sans effet. On souhaite désormais gérer ces liens internes au site, pour pouvoir naviguer de page en page.

---

**=> Créer et se placer sur une nouvelle branche `liens-internes`.**

---

#### 3.1 - Liens dans l'entête

D'après le mode de fonctionnement de index.php, un lien vers une catégorie doit ressembler à `index.php?page=category&id=4` (ex. pour la catégorie dont l'id est 4).

- Générer de tels liens, en dynamisant l'id de la catégorie grâce à la boucle déjà en place (étape 2.3).

#### 3.2 - Liens dans la sidebar

D'après le mode de fonctionnement de index.php, un lien vers une catégorie doit ressembler à `index.php?page=autho&id=7` (ex. pour un auteur dont l'id est 7).

- Générer de tels liens, en dynamisant l'id de l'auteur grâce à la boucle déjà en place (étape 2.4).

#### Vérifications

- Vérifier que tous les liens fonctionnent bien :see_no_evil:
- Commiter les modifications.

---

**=> Fusionner la branche `liens-internes` dans `master`.**

---

### Étape 4 - Classes `Category` & `Author` :sunglasses:

En examinant inc/data.php, il apparaît que les catégories et les auteurs ne sont pas gérés de manière optimale. Par exemple, les articles 1 et 4 appartiennent à la même catégorie, si bien que le nom de cette catégorie est répété en toutes lettres. La même chose pourrait se produire pour les auteurs, si un auteur écrit plusieurs articles sur le blog.

Afin de minimiser la duplication d'information et rendre les données plus fiables, on souhaite dans cette étape créer une classe `Category` pour structurer les données de chaque catégorie, et une classe `Author` pour faire de même pour les auteurs. À ce stade, catégories et auteurs sont simplement définis par leur nom, donc les classes devraient être plutôt simples.

---

**=> Créer et se placer sur une nouvelle branche `classes-category-author`.**

---

Les deux classes sont à créer, mais un fichier data.php qui les utilise déjà est fourni dans le dossier etape4/.

- Remplacer l'actuel fichier inc/data.php par celui fourni dans etape4/.
- Implémenter les classes `Category` et `Author` référencées dans cette nouvelle version du fichier, de manière à ce que _tout fonctionne_ (observer toutefois que le nom d'un auteur ou d'une catégorie a disparu sur la page d'accueil… ce n'est pas grave, on corrigera ça en _bonus_ ! On va d'abord s'occuper des pages _Catégorie_ et _Auteur_ ^^)
- Les données transmises aux templates sont différentes. En conséquence, modifier le code des templates category.tpl.php et article.tpl.php pour récupérer un affichage correct.

#### Vérifications

- Vérifier que toutes les pages sont toujours fonctionnelles (s'affichent, hormis le « bug » sur la page d'accueil).
- Commiter les modifications.

<details><summary>Indices pour implémenter les classes</summary>

- Rappel : `$object->property` pour accéder à une propriété d'une instance.
- Rappel : `__construct` reçoit les « arguments » d'instanciation, et peut remplir les propriétés de l'instance en cours de création.
- Rappel : ce n'est pas tout de définir une classe, encore faut-il `require` son code pour pouvoir l'utiliser !

</details>

---

**=> Fusionner la branche `classes-category-author` dans `master`.**

---

### Étape 5 - Page catégorie :doughnut:

Avec nos super classes `Category` et `Author`, il est temps d'aller _pimper_ les templates correspondants.

---

**=> Créer et se placer sur une nouvelle branche `page-category`.**

---

#### 5.1 - Une instance de `Category`

On veut afficher le nom de la catégorie dans le `h1` du template inc/templates/category.tpl.php. Pour ce faire, il faut pouvoir accéder l'objet de type `Category` qui a été ciblé par son id, _via_ le système de _query parameter_.

- Dans index.php, modifier la partie du code s'occupant de la page _Catégorie_ pour définir une variable `$category`, dans laquelle on stockera la catégorie idoine au moyen d'une méthode `Data#getCategory`.

<details><summary>Indices</summary>

- La méthode n'existe pas ? Alors il faut la créer :wink:
- Cette méthode est similaire à la méthode `Data#getArticle`.

</details>

#### 5.2 - Les articles d'une catégorie

On veut lister dans le template tous les articles de la catégorie affichée. Pour ce faire, il faut pouvoir itérer sur une liste.

- Dans index.php, modifier la partie du code s'occupant de la page _Catégorie_ pour définir une variable `$articlesList`, dans laquelle on stockera un tableau d'objets de type `Article`, récupérés en fonction de l'id de la catégorie au moyen d'une méthode `Data#getArticlesByCategoryId`.

<details><summary>Indices</summary>

- La méthode n'existe pas ? Alors il faut la créer :wink:
- Cette méthode est similaire à la méthode `Data#getArticles`.
- Attention : il ne faut pas cette fois retourner _tous_ les articles, mais uniquement ceux qui appartiennent à la catégorie ayant l'id spécifié.

<details><summary>Indices sur la récupération des articles d'une catégorie</summary>

- Dans la fonction `Data#getArticlesByCategoryId`, on peut créer un tableau vide, qu'on remplira des articles de la catégorie.
- Pour chaque article du site, si l'id de la catégorie associée correspond à l'id récupéré en paramètre de la fonction, alors ajouter l'article dans le tableau.
- Retourner le tableau :tada:

</details>

</details>

---

**=> Fusionner la branche `page-category` dans `master`.**

---

#### Vérifications

- Modifier les templates pour afficher correctement les données sur le site, vérifier toutes les pages… comme d'hab.
- Commiter les modifications.

### Étape 6 - Page auteur :icecream:

Même travail que pour la page _Catégorie_, mais cette fois pour la page _Auteur_.

---

**=> Créer et se placer sur une nouvelle branche `page-author`.**

---

<details><summary>Indice</summary>

- C'est comme l'étape précédente, mais avec les auteurs au lieu des catégories :wink:
- Donc il faut adapter le nom des méthodes, des variables, etc. mais le copié/collé est autorisé, voire recommandé !

</details>

---

**=> Fusionner la branche `page-author` dans `master`.**

---

## Bonus

<details><summary>En cliquant sur ce lien, je confirme avoir terminé l'atelier avant l'heure, et souhaite être confronté à des demandes & des notions qui n'ont pas été vues en cours.</summary>

### Bonus - Corriger les bugs :fearful:

L'étape 3 a généré des _bugs_ sur la page d'accueil :

- un numéro apparait en lieu et place de l'auteur :eyes:
- un numéro apparait en lieu et place de la catégorie :eyes:

Ce ne sont en fait pas vraiment des bugs, mais plutôt des _effets de bords_ malencontreux (effets indésirables d'une modification du code).

Pour résoudre ces problèmes, bien garder en tête les points suivants :

- on dispose déjà de variables contenant le tableau des objets de type `Author` et le tableau des objets de type `Category` ;
- en index/clé de ces tableaux, on trouve l'id correspondant aux objets (1, 2, 3, …) ;
- du coté des objets de type `Article`, en valeur des propriétés `author` & `category`, on a un id pointant vers un objet `Author` ou `Category`, respectivement ;
- du coté des objets `Author` et `Category`, le nom concret de l'objet est stocké dans une propriété.

---

**=> Créer et se placer sur une nouvelle branche `bugfix-author-category`.**

---

- Utiliser l'id de l'auteur d'un `Article` pour stipuler à quelle index/clé on souhaite accéder dans le tableau d'objets de type `Author`.
- Utiliser l'id de la catégorie d'un `Article` pour stipuler à quelle index/clé on souhaite accéder dans le tableau d'objets de type `Category`.

#### Vérifications

- Vérifier que les noms des catégories et des auteurs s'affichent correctement sur la page d'accueil.
- Commiter les modifications.

<details><summary>Indice</summary>

- Une clé d'un tableau peut être écrite « en dur » : `$tableau[4]`.
- Mais elle peut aussi être définie grâce à une variable : `$tableau[$id]`.
- Elle peut donc aussi bien être définie grâce à une propriété d'un objet : `$tableau[$object->property]`.

</details>

---

**=> Fusionner la branche `bugfix-author-category` dans `master`.**

---

### Mega Bonus - Class App :bulb:

Il nous reste du code "procédural" (c'est-à-dire qui n'est pas dans un objet) dans `index.php`. On va donc créer une classe `App` qui va reprendre ce qu'il y a dans `index.php`, pour passer en _full-POO_.

---

**=> Créer et se placer sur une nouvelle branche `classe-app`.**

---

#### Déclarer la classe

- Créer une classe `App`.
- Déclarer les propriétés suivantes :
  - `data` qui contiendra un objet de la classe _Data_ ;
  - `templateName` qui contiendra le nom du template à afficher.
- Déclarer un constructeur (qui s'occupera à terme d'initialiser les propriétés).
- Déclarer une méthode `run()` (qui s'occupera à terme d'afficher la bonne page selon le paramètre d'URL `"page"`).

#### Transferts de code

Dans le code de `index.php`, il ne devra plus rester que :

- les inclusions des classes ;
- la création d'une instance de la classe _App_ ;
- l'appel à la méthode `App#run`.

Coder :

- le constructeur de _App_ afin qu'il initialise les propriétés ;
- la méthode _App#run_ afin qu'elle gère le code de chaque page du site.

> Toutes les pages doivent fonctionner comme avant !

#### Décomposer le code de `App`

La méthode _App#run_ contient actuellement le code gérant _toutes_ les pages. On va refactoriser cette méthode pour y voir plus clair :

- créer une méthode par page ;
- y placer le code gérant chaque page ;
- dans la méthode `run`, appeler la bonne méthode selon la page à afficher.

#### Vérifications

- Tout doit fonctionner comme avant :muscle:
- Commiter les modifications :tada:

---

**=> Fusionner la branche `classe-app` dans `master`.**

---

### Bonus _je m'occupe_ - Améliorations

Pas encore repu-e ? :upside_down_face:

Il y a encore pleins de choses qui pourraient être améliorées… on te laisse déterminer & mener à bien ces améliorations :wink: Travaille sur une ou des branche(s) dédiée(s) !

</details>
