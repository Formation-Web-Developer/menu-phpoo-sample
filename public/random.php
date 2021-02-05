<?php
/*
 * Ici je vais générer une facture en aléatoire.
 * Création d'un client aléatoire et commande aléatoire.
 */

/*
 * Chargement de toutes les classes
 */
require '../src/Menu.php';
require '../src/Command.php';
require '../src/Client.php';
require '../src/CommandArticle.php';
require '../src/Article.php';
require '../src/Facture.php';

/*
 * Création d'un menu.
 */
$menu = new Menu(1, 'Menu du Midi');
$menu->addArticle(1, 'Menu du jour', 'Repas du chef', 12.0);
$menu->addArticle(2, 'Menu Enfant', 'Petit pour les enfants', 8.0);
$menu->addArticle(3, 'Café', '', 1.8);
$menu->addArticle(4, 'Pizza - Calzone', 'Liste des ingrédients de la pizza Calzone', 9.0);
$menu->addArticle(5, 'Pizza - Orientale', 'Liste des ingrédients de la pizza Orientale', 10.0);
$menu->addArticle(6, 'Pizza - Fromage', 'Liste des ingrédients de la pizza Fromage', 11.0);

/*
 * Nom possible de client
 */
$names = [
    'John Doe',
    'Jane Doe',
    'Mike Brown',
    'Frank Hopper',
    'Aelita Stone',
    'Aude Délaroboi',
];

/*
 * Création d'un nouveau client en fonction de la liste de nom au dessus.
 */
$client = new Client(rand(1, 99999), $names[rand()%count($names)]);

/*
 * Création d'une nouvelle commande.
 */
$command = new Command(rand(1, 99999), $client);

/*
 * Ajout entre 1 et 10 articles à la commande du client.
 */
for($i = rand(1, 10); $i > 0; $i--){
    $command->addArticle($menu->getArticle(rand(1, 6)), rand(1, 10));
}

/*
 * Création de la facture du client
 */
$facture = new Facture($command);

?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Facture de <?=$client->getName()?></title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <div class="factures">
            <?php /* Affichage de la facture du client */ ?>
            <?= $facture->toHTML() ?>
        </div>
    </body>
</html>
