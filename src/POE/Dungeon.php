<?php

namespace POE;

use POE\brawl\Ring;
use POE\database\CharacterFactory;
use POE\database\CharacterLoader;
use POE\database\CharacterManager;
use POE\database\Connection;

class Dungeon
{

    public function brawl()
    {
        $loader = new CharacterLoader(new Connection());

        /**
         * chargement des protagonistes depuis la base
         */
        $attacker = $loader->load(1);
        $defender = $loader->load(2);

        /**
         * gestion de la scène de combat
         */
        $ring = new Ring($attacker, $defender);
        $fightReport = $ring->fight();

        return $this->render('brawl', ['fightReport' => $fightReport]);
    }

    public function createCharacter()
    {
        /**
         * Si la méthode HTTP est «POST», alors le client essaye de transmettre
         * les données du formulaire. Quand il veut juste l'affichage du formulaire,
         * il requête avec «GET»
         */
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['type']) || !in_array($_POST['type'], ['warrior', 'thief', 'wizard'])) {
                // gestion de l'erreur
            }

            /**
             * On délègue à la notre fabrique de personnage tout le savoir faire
             * pour créer un nouveau personnage à partir d'un type et d'un nom
             */
            $factory = new CharacterFactory();
            $character = $factory->generate($_POST['name'], $_POST['type']);

            $manager = new CharacterManager();
            $manager->save($character);
        }


        return $this->render('createCharacter', []);
    }

    public function reportSituation()
    {
        /**
         * On passe par un objet intermédiaire pour récupérer notre personnage
         * Pour fonctionner, le chargeur a besoin d'une connexion à la base de données
         */
        $loader = new CharacterLoader();

        $character = $loader->load(1);

        return $this->render('reportSituation', ['character' => $character]);
    }

    private function render(string $filename, array $data)
    {
        /**
         * À partir du tableau associatif $data reçu en paramètre,
         * on génère autant de variables qu'il y a d'éléments dans le tableau
         * chaque variable portera le nom de la clé
         */
        extract($data);
        /**
         * Démarrage d'un tampon de sortie
         * Dans cette "zone" tampon, le html généré par le fichier inclus sera stocké
         * sans partir directement vers le serveur HTTP
         *
         * Dans la vraie vie, on utilise un vrai moteur de template (Twig, Smarty, autre...)
         */
        ob_start();
        include __DIR__ . '/../../template/' . $filename . '.html.php' ;
        /**
         * Après avoir écrit le document (capturé dans le tampon de sortie),
         * on décide de le faire redescendre dans une variable PHP et on nettoie
         * (vide + désactive) le système de tampon
         */
        return ob_get_clean();

    }
}