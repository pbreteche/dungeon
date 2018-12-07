<?php

namespace POE;

use POE\database\CharacterFactory;
use POE\database\CharacterLoader;
use POE\database\CharacterManager;
use POE\database\Connection;

class Dungeon
{

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

            $manager = new CharacterManager(new Connection());
            $manager->save($character);
        }

        ob_start();
        include __DIR__ . '/../../template/createCharacter.html.php' ;
        $output = ob_get_clean();

        return $output;
    }

    public function reportSituation()
    {
        /**
         * On passe par un objet intermédiaire pour récupérer notre personnage
         * Pour fonctionner, le chargeur a besoin d'une connexion à la base de données
         */
        $loader = new CharacterLoader(new Connection());

        $character = $loader->load(1);

        /**
         * Démarrage d'un tampon de sortie
         * Dans cette "zone" tampon, le html généré par le fichier inclus sera stocké
         * sans partir directement vers le serveur HTTP
         * 
         * Dans la vraie vie, on utilise un vrai moteur de template (Twig, Smarty, autre...)
         */
        ob_start();
        include __DIR__ . '/../../template/reportSituation.html.php' ;
        /**
         * Après avoir écrit le document (capturé dans le tampon de sortie),
         * on décide de le faire redescendre dans une variable PHP et on nettoie 
         * (vide + désactive) le système de tampon
         */
        $output = ob_get_clean();

        return $output;
    }
}