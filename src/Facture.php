<?php

/*
 * Cette class permettra de créer une facture pour l'afficher dans une page HTML par rapport à une commande.
 */
class Facture
{
    /*
     * La commande qui permettra de créer la facture
     */
    private Command $command;

    /*
     * Le constructeur de la Facture
     *
     * Rappel: Un constructeur permet de créer un objet avec des paramètre bien précis pour son initialisation.
     * Il sera toujours appelé au moment ou l'on créer une nouvelle instance -> new Facture();
     */
    public function __construct(Command $command)
    {
        $this->command = $command;
    }

    /*
     * Liste des méthodes de type GETTER.
     *
     * Permet de récupérer des éléments de cette class dans d'autres parties du code qui sont externes à celle-ci.
     */

    /*
     * Récupérer la commande de la facture
     *
     * $command = $instance->getCommand();
     */
    public function getCommand(): Command
    {
        return $this->command;
    }


    /*
     * Liste des méthodes utils
     *
     * Permet d'avoir des actions spécifiques à cette class.
     */

    /*
     * Permet de générer la facture en code HTML et le retourner en chaine de caractère.
     */
    public function toHTML(): string
    {
        $html = '<div class="facture">';
        $html .= '<h1>Commande N°'.$this->command->getId().'</h1>';
        $html .= '<p>Nom: '.$this->command->getClient()->getName().'</p>';
        $html .= '<div class="menu">';

        $html .= '<div class="ref title">Ref</div><div class="name title">Articles</div><div class="count title">Nombre</div><div class="price title">Prix</div>';

        foreach($this->command->getCommandArticles() as $article){
            $html .= '<div class="ref">#'.sprintf('%04d', $article->getArticle()->getId()).'</div>';
            $html .= '<div class="name">' . $article->getArticle()->getName() . '<span class="description">'.$article->getArticle()->getDescription().'</span></div>';
            $html .= '<div class="count">' . number_format($article->getQuantity(), 0, ',', ' ') . '</div>';
            $html .= '<div class="price">' . number_format($article->getQuantity() * $article->getArticle()->getPrice(), 2, ',', ' ') . '€</div>';
        }
        $html .= '<div class="ref"></div><div class="name"></div><div class="count">Total</div><div class="price">' . number_format($this->command->getSold(), 2, ',', ' ') . '€</div>';
        return $html.'</div></div>';
    }
}
