<?php

/*
 * Cette class permettra de créer différent Article.
 */
class Article
{
    /*
     * L'identifiant de l'article
     */
    private int $id;
    /*
     * Le nom de l'article
     */
    private string $name;
    /*
     * La description de l'article
     */
    private string $description;
    /*
     * Le prix de l'article
     */
    private float $price;

    /*
     * Le constructeur de l'article
     *
     * Rappel: Un constructeur permet de créer un objet avec des paramètre bien précis pour son initialisation.
     * Il sera toujours appelé au moment ou l'on créer une nouvelle instance -> new Article();
     */
    public function __construct(int $id, string $name, string $description, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    /*
     * Liste des méthodes de type GETTER.
     *
     * Permet de récupérer des éléments de cette class dans d'autres parties du code qui sont externes à celle-ci.
     */

    /*
     * Récupérer l'identifiant de l'article
     *
     * $id = $instance->getId();
     */
    public function getId(): int
    {
        return $this->id;
    }

    /*
     * Récupérer le nom de l'article
     *
     * $name = $instance->getName();
     */
    public function getName(): string
    {
        return $this->name;
    }

    /*
     * Récupérer la description de l'article
     *
     * $description = $instance->getDescription();
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /*
     * Récupérer le prix de l'article
     *
     * $price = $instance->getPrice();
     */
    public function getPrice(): float
    {
        return $this->price;
    }
}
