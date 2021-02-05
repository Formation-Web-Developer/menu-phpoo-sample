<?php

/*
 * Cette class permettra de créer différent client.
 */
class Client
{
    /*
     * L'identifiant du client
     */
    private int $id;

    /*
     * Le nom du client
     */
    private string $name;

    /**
     * Les commandes passé par le client
     *
     * @var Command[]
     */
    private array $commands = [];

    /*
     * Le constructeur du client
     *
     * Rappel: Un constructeur permet de créer un objet avec des paramètre bien précis pour son initialisation.
     * Il sera toujours appelé au moment ou l'on créer une nouvelle instance -> new Client();
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
     * Permet de récupérer l'identifiant du client
     *
     * $id = $instance->getId();
     */
    public function getId(): int
    {
        return $this->id;
    }

    /*
     * Permet de récupérer le nom du client
     *
     * $name = $instance->getName();
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Permet de récupérer les commandes passés par le client
     *
     * $commands = $instance->getCommands();
     *
     * @return Command[]
     */
    public function getCommands(): array
    {
        return $this->commands;
    }

    /*
     * Permet de récupérer une commande précis du client
     *
     * $command = $instance->getCommand($id);
     */
    public function getCommand(int $id): ?Command
    {
        foreach ($this->commands as $command){
            if($command->getId() === $id){
                return $command;
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
     * Enregistrer une nouvelle commande au client.
     *
     * $instance->addCommand($command);
     */
    public function addCommand(Command $command): void
    {
        $this->commands[] = $command;
    }


}
