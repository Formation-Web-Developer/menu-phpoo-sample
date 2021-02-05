```php
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
$client = new Client(1, 'John Doe');

/*
 * Création d'une nouvelle commande pour John Doe
 */
$command = new Command(1, $client);

/*
 * Ajout des articles à la commande de John Doe
 *
 * Il commande un Menu du jour (identifiant 1) et un café (identifiant 3):
 */

$command->addArticle($menu->getArticle(1), 1);
$command->addArticle($menu->getArticle(3), 1);

/*
 * Création de la facture de John Doe 
 */
$facture = new Facture($command);

/*
 * Impression de la facture
 */
echo $facture->toHTML();
```
