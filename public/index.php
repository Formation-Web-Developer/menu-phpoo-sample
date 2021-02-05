<?php
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
 * Création du client John Doe.
 */
$client1 = new Client(1, 'John Doe');

/*
 * Création d'une nouvelle commande pour John Doe
 */
$command1 = new Command(1, $client1);

/*
 * Ajout des articles à la commande de John Doe
 *
 * Il commande un Menu du jour (identifiant 1) et un café (identifiant 3):
 */

$command1->addArticle($menu->getArticle(1), 1);
$command1->addArticle($menu->getArticle(3), 1);


/*
 * Création du client Mike Brown
 */
$client2 = new Client(2, 'Mike Brown');

/*
 * Création d'une nouvelle commande pour Mike Brown
 */
$command2 = new Command(2, $client2);

/*
 * Ajout des articles à la commande de Mike Brown
 *
 * Il commande deux pizzas Fromage (identifiant: 6), 4 pizza Calzone (identifiant: 4)
 */

$command2->addArticle($menu->getArticle(6), 2);
$command2->addArticle($menu->getArticle(4), 4);

/*
 * Création des factures des clients
 */
$factures = [];
foreach ([$client1, $client2] as $client){
    foreach ($client->getCommands() as $command){
        $factures[] = new Facture($command);
    }
}

?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Programmation Orientée Objet</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <div class="factures">
            <?php
                /*
                 * Impression des factures:
                 */
                foreach ($factures as $facture){
                    echo $facture->toHTML();
                }
            ?>
        </div>
    </body>
</html>
