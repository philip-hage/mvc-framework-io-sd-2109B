<?php require(APPROOT . '/views/includes/header.php');?>

<h3><?= $data['title'] ?></h3>

<h5><?= 'Instructeeurnaam: ' . $data['instructeurNaam']; ?></h5>

<table border='5'>
    <thead>
        <th>Datum</th>
        <th>Tijd</th>
        <th>Naam Leerling</th>
        <th>Lesinfo</th>
        <th>Onderwerp</th>
    </thead>
    <tbody>
        <?= $data['rows'] ?>
    </tbody>
</table>

<?php require(APPROOT . '/views/includes/footer.php');?>