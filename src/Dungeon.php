<?php

namespace POE;

use Doctrine\ORM\EntityManager;
use POE\brawl\Ring;
use POE\database\CharacterFactory;
use POE\entity\Character;

class Dungeon
{

    /**
     * @var EntityManager
     */
    private $manager;

    public function __construct(EntityManager $manager)
    {
        $this->manager = $manager;
    }

    public function brawl()
    {
        /**
         * chargement des protagonistes depuis la base
         */
        $attacker = $this->manager->find(Character::class, 1);
        $defender = $this->manager->find(Character::class, 2);

        $this->manager->getRepository(Character::class)->findAll();

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

            $this->manager->persist($character);
            $this->manager->flush();
        }


        return $this->render('createCharacter', []);
    }

    /**
     * la donnée pour l'affichage en AJAX, au format JSON
     */
    public function getCharacter()
    {
        $character = $this->manager->find(Character::class, 1);

        header('Content-Type: application/json');
        return json_encode($character->toArray());
    }

    /**
     * la donnée pour l'affichage en AJAX, au format JSON
     */
    public function getCharacters()
    {
        $characters = $this->manager->getRepository(Character::class)->findAll();

        $charactersAsArray = array_map(
            function($elt) { return $elt->toArray();},
            $characters
        );

        header('Content-Type: application/json');
        return json_encode($charactersAsArray);
    }

    /**
     * La méthode qui affiche le HTML de base pour la fiche du personnage
     * Les données sont chargées en AJAX
     *
     * @return false|string
     */
    public function reportSituation()
    {
        return $this->render('reportSituation', []);
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
        include __DIR__ . '/../template/' . $filename . '.html.php' ;
        /**
         * Après avoir écrit le document (capturé dans le tampon de sortie),
         * on décide de le faire redescendre dans une variable PHP et on nettoie
         * (vide + désactive) le système de tampon
         */
        return ob_get_clean();

    }
}