<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Reserveringen</title>
</head>

<body>
    <h3><?= $data['title']; ?> </h3>


    <table border='1'>
        <thead>
            <th>Voornaam</th>
            <th>Tussenvoegsel</th>
            <th>Achternaam</th>
            <th>Datum </th>
            <th> Volwassen</th>
            <th>Kinderen</th>
            <th>Optiepakket</th>
            <th>Wijzigen</th>
        </thead>
        <tbody>
            <?= $data['rows']; ?>
        </tbody>
    </table>
    <a href="<?= URLROOT; ?>/homepages/index">Homepage</a>

</body>

</html>
