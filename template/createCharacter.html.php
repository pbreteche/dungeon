<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Création de personnage</title>
</head>
<body>
<form method="post">
    <div>
        <label for="personnage-nom">Nom</label>
        <input type="text" name="name" id="personnage-nom" required>
    </div>
    <div>
        <label for="personnage-type">Classe</label>
        <select name="type" id="personnage-type" required>
            <option value="" selected>--</option>
            <option value="warrior">Guerrier</option>
            <option value="thief">Voleur</option>
            <option value="wizard">Magicien</option>
        </select>
    </div>
    <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
    <button>C'est là qu'on clique</button>
</form>
</body>
</html>