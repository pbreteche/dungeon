<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/theme.css">
    <title>Dungeon</title>
</head>
<body>
    
    <h1> <?= $character->getName() ?> </h1>

    <div>Point de vie:
        <progress id="character-life" max="<?= $character->getMaxLife()?>" value="<?= $character->getCurrentLife()?>">
            <?= $character->getCurrentLife()?> /  <?= $character->getMaxLife()?> PV
        </progress>
    </div>


    <div>Énergie:
        <progress id="character-energy" max="<?= $character->getMaxEnergy()?>" value="<?= $character->getCurrentEnergy()?>">
            <?= $character->getCurrentEnergy()?> /  <?= $character->getMaxEnergy()?> Mana
        </progress>
    </div>

    <div>Combat:
        attaque: <?= $character->getAttack()?>
        défense: <?= $character->getDefense()?>
    </div>
</body>
</html>