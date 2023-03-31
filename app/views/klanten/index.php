<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Klanten</title>
</head>

<body>
    <h3><?= $data['title']; ?> </h3>

    <form method="get">
        <label for="date">Selecteer een datum:</label>
        <input type="date" name="date" id="date" value="<?= isset($_GET['date']) ? $_GET['date'] : date('Y-m-d') ?>">
        <button type="submit">Tonen</button>
    </form>



    <table border='1'>
        <thead>
            <th>Voornaam</th>
            <th>Tussenvoegsel</th>
            <th>Achternaam</th>
            <th>Mobiel </th>
            <th> Email</th>
            <th>Wolvassen</th>
        </thead>
        <tbody>
            <?= $data['rows']; ?>
        </tbody>
    </table>
    <a href="<?= URLROOT; ?>/homepages/index">Homepage</a>

</body>

</html>