<?php

/*
 * Cette class permettra de créer différent menu.
 *
 * Imaginons par exemple que le menu du soir, ne soit pas le même que celui du midi.
 */
class Menu
{
    /*
     * L'identifiant du menu
     */
    private int $id;

    /*
     * Le nom du menu
     */
    private string $name;

    /**
     * Les différents articles du menu
     *
     * @var Article[]
     */
    private array $articles = [];

    /*
     * Le constructeur du menu
     *
     * Rappel: Un constructeur permet de créer un objet avec des paramètre bien précis pour son initialisation.
     * Il sera toujours appelé au moment ou l'on créer une nouvelle instance -> new Menu();
     */
    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /*
     * Liste des méthodes de type GETTER.
     *
     * Permet de récupérer des éléments de cette class dans d'autres parties du code qui sont externes à celle-ci.
     */

    /*
     * Récupérer l'identifiant du menu
     *
     * $id = $instance->getId();
     */
    public function getId(): int
    {
        return $this->id;
    }

    /*
     * Récupérer le nom du menu
     *
     * $name = $instance->getName();
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Récupérer les articles enregistrés dans ce menu.
     * $articles = $instance->getArticles();
     *
     * @return Article[]
     */
    public function getArticles(): array
    {
        return $this->articles;
    }

    /*
     * Récupérer un article enregistrer dans ce menu par rapport à son identifiant:
     *
     * $article = $instance->getArticle($idArticle);
     */
    public function getArticle(int $id): ?Article
    {
        foreach($this->articles as $article){
            if($article->getId() === $id){
                return $article;
            }
        }
        return null;
    }

    /*
     * Lister des méthodes de type ADDER
     *
     * Permet d'ajouter/enregistrer des choses dans cette class
     */

    /*
     * Enregistrer un nouvel article dans ce menu.
     *
     * $instance->addArticle($newIdArticle, $articleName, $articleDescription, $articlePrice);
     */
    public function addArticle(int $id, string $name, string $description, float $price): void
    {
        $this->articles[] = new Article($id, $name, $description, $price);
    }
}
