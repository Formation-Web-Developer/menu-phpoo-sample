<?php

/*
 * Cette class permettra de créer une command à un client.
 */
class Command
{
    /*
     * L'identifiant de la commande
     */
    private int $id;

    /*
     * Le client qui passe commande
     */
    private Client $client;

    /**
     * Les articles commandés par le client
     *
     * @var CommandArticle[]
     */
    private array $commandArticles = [];

    /*
     * Le constructeur de la commande
     *
     * Rappel: Un constructeur permet de créer un objet avec des paramètre bien précis pour son initialisation.
     * Il sera toujours appelé au moment ou l'on créer une nouvelle instance -> new Command();
     */
    public function __construct(int $id, Client $client)
    {
        $this->id = $id;
        $this->client = $client;
        $this->client->addCommand($this);
    }

    /*
     * Liste des méthodes de type GETTER.
     *
     * Permet de récupérer des éléments de cette class dans d'autres parties du code qui sont externes à celle-ci.
     */

    /*
     * Récupérer l'identifiant de la commande
     *
     * $id = $instance->getId();
     */
    public function getId(): int
    {
        return $this->id;
    }

    /*
     * Récupérer le client qui passe cette commande.
     *
     * $client = $instance->getClient();
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * Récupéré les articles que le client à commandé
     *
     * $commandArticles = $instance->getCommandArticles();
     *
     * @return CommandArticle[]
     */
    public function getCommandArticles(): array
    {
        return $this->commandArticles;
    }

    /*
     * Récupéré un article précis que le client à commandé
     *
     * $commandArticle = $instance->getCommandArticle($article);
     */
    public function getCommandArticle(Article $article): ?CommandArticle
    {
        foreach ($this->commandArticles as $commandArticle){
            if($commandArticle->getId() === $article->getId()){
                return $commandArticle;
            }
        }
        return null;
    }

    /*
     * Récupéré le prix total de la commande.
     *
     * $sold = $instance->getSold();
     */
    public function getSold(): float
    {
        $sold = 0;
        foreach ($this->commandArticles as $article){
            $sold += $article->getQuantity() * $article->getArticle()->getPrice();
        }
        return $sold;
    }

    /*
     * Lister des méthodes de type ADDER
     *
     * Permet d'ajouter/enregistrer des choses dans cette class
     */

    /*
     * Ajouter un article à la commande avec une quantity définie
     *
     * $instance->addArticle($article, $quantity);
     */
    public function addArticle(Article $article, int $quantity = 1): void
    {
        $commandArticle = $this->getCommandArticle($article);
        if($commandArticle !== null){
            $commandArticle->addQuantity($quantity);
        }else{
            $this->commandArticles[] = new CommandArticle(rand(0, 999999), $this, $article, $quantity);
        }
    }
}
