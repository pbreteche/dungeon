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

<script>
    document.addEventListener('DOMContentLoaded', function(){
        const body = document.querySelector('body');

        fetch('/api/situation')
                .then(response => response.json())
                .then((data) => {
                    body.innerHTML = `
                    <h1>${data.name}</h1>
<div>Point de vie:
        <progress id="character-energy" max="${data.maxLife}" value="${data.currentLife}">
            ${data.currentLife} /  ${data.maxLife} Mana
        </progress>
    </div>
<div>Énergie:
        <progress id="character-energy" max="${data.maxEnergy}" value="${data.currentEnergy}">
            ${data.currentEnergy} /  ${data.maxEnergy} Mana
        </progress>
    </div>
<div>Combat:
        attaque: ${data.attack}
        défense: ${data.defense}
    </div>`
                })
    })
</script>
</body>
</html>