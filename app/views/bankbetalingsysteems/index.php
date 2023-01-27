<?php require(APPROOT . '/views/includes/header.php');?>

<h3><?= $data['title'] ?></h3>

<table border='5'>
    <thead>
        <th>Naam</th>
        <th>Adres</th>
        <th>Email</th>
        <th>Rekeningnummer</th>
        <th>RekeningType</th>
        <th>Transactiecode</th>
        <th>Transactietype</th>
        <th>TransactieDatum</th>
        <th>Bedrag</th>
        <th>Saldorekening</th>
    </thead>
    <thead>

    </thead>
    <tbody>
        <?= $data['rows'] ?>
    </tbody>
</table>

<?php require(APPROOT . '/views/includes/footer.php');?>