<?php

/*
 * Cette class permettra d'enregistrer un article dans une commande avec une quantité.
 */
class CommandArticle
{
    /*
     * L'identifiant de CommandArticle.
     */
    private int $id;
    /*
     * La command auquel appartiendra cette class.
     */
    private Command $command;
    /*
     * L'article cible de la commande.
     */
    private Article $article;
    /*
     * La quantité de l'article passé en commande.
     */
    private int $quantity;

    /*
     * Le constructeur de CommandArticle
     *
     * Rappel: Un constructeur permet de créer un objet avec des paramètre bien précis pour son initialisation.
     * Il sera toujours appelé au moment ou l'on créer une nouvelle instance -> new CommandArticle();
     */
    public function __construct(int $id, Command $command, Article $article, int $quantity = 1)
    {
        $this->id = $id;
        $this->command = $command;
        $this->article = $article;
        $this->quantity = $quantity;
    }

    /*
     * Liste des méthodes de type GETTER.
     *
     * Permet de récupérer des éléments de cette class dans d'autres parties du code qui sont externes à celle-ci.
     */

    /*
     * Récupérer l'identifiant de CommandArticle
     *
     * $id = $instance->getId();
     */
    public function getId(): int
    {
        return $this->id;
    }

    /*
     * Permet de récupéré la commande cible.
     *
     * $command = $instance->getCommand();
     */
    public function getCommand(): Command
    {
        return $this->command;
    }

    /*
     * Permet de récupéré l'article cible
     *
     * $article = $instance->getArticle();
     */
    public function getArticle(): Article
    {
        return $this->article;
    }

    /*
     * Permet de récupéré la quantité d'article commandé
     *
     * $quantity = $instance->getQuantity();
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /*
     * Lister des méthodes de type ADDER
     *
     * Permet d'ajouter/enregistrer des choses dans cette class
     */

    /*
     * Permet d'ajouter une quantité définie à l'article.
     *
     * $instance->addQuantity($quantity);
     */
    public function addQuantity(int $quantity = 1): void
    {
        $this->quantity += $quantity;
    }
}
