<?php

namespace POE\brawl;


use POE\database\Character;

class Ring
{

    private $attacker;

    private $defender;

    public function __construct(Character $attacker, Character $defender)
    {
        $this->attacker = $attacker;
        $this->defender = $defender;
    }

    public function fight()
    {
        /**
         * un tableau pour faire notre compte rendu et ajouter chaque
         * action qui s'est déroulée dans le combat
         */
        $report = [];

        /**
         * un combat se déroule en plusieurs tours
         * on boucle sur les tours de combat autant qu'on peut
         * une exception sera levée en cas d'impossibilité de continuer le combat
         * exemple: un personnage n'a plus de point de vie
         */
        try {
            while (true) {
                $this->defender->wound(20);
                $report[] = $this->attacker->getName() . ' frappe ' . $this->defender->getName();
                $this->attacker->wound(20);
                $report[] = $this->defender->getName() . ' frappe ' . $this->attacker->getName();
            }
        }
        catch(\Exception $exception) {


        }
        return $report;
    }
}