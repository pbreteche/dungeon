<?php

namespace POE\brawl;


use POE\entity\Character;

class Ring
{

    private $attacker;

    private $defender;

    private $thrower;

    /**
     * @var \POE\brawl\FightLog
     */
    private $fightLog;

    public function __construct(Character $attacker, Character $defender)
    {
        $this->attacker = $attacker;
        $this->defender = $defender;

        $this->thrower = new DiceThrower();
    }

    public function fight()
    {
        /**
         * un tableau pour faire notre compte rendu et ajouter chaque
         * action qui s'est déroulée dans le combat
         */
        $this->fightLog = new FightLog();

        /**
         * un combat se déroule en plusieurs tours
         * on boucle sur les tours de combat autant qu'on peut
         * une exception sera levée en cas d'impossibilité de continuer le combat
         * exemple: un personnage n'a plus de point de vie
         */
        try {
            while (true) {
                $this->strike($this->attacker, $this->defender);
                $this->strike($this->defender, $this->attacker);
            }
        }
        catch(\Exception $exception) {


        }
        return $this->fightLog;
    }

    private function strike (Character $attacker, Character $defender)
    {
        $touchThreshold = $attacker->getAttack() / ($attacker->getAttack() + $defender->getDefense()) * 100;

        $this->fightLog->append($attacker->getName() . ' attaque ' . $defender->getName() . '(' . floor($touchThreshold) . '%)');

        $score = $this->thrower->throwDice(100);

        if ($touchThreshold > $score) {
            $this->defender->wound(20);
            $this->fightLog->append('-- touché! (' . $score . ') reste ' . $defender->getCurrentLife());
        }
        else {
            $this->fightLog->append('-- raté! (' . $score . ') reste ' . $defender->getCurrentLife());
        }

    }
}