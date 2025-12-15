<h2>Détail du parcours</h2>

<?php if ($parcours): ?>

<p>
    <strong>Départ :</strong> <?= $parcours['lieu_depart'] ?><br>
    <strong>Arrivée :</strong> <?= $parcours['lieu_arrivee'] ?><br>
    <strong>Distance :</strong> <?= $parcours['distance'] ?> km
</p>

<hr>

<hr>

<h3>Liste des trajets</h3>
<table border="1" cellpadding="5">
    <tr>
        <th>Date début</th>
        <th>Véhicule</th>
        <th>Chauffeur</th>
        <th>Recette</th>
        <th>Carburant</th>
        <th>Bénéfice</th>
    </tr>

    <?php foreach ($trajets as $t): ?>
        <tr>
            <td><?= $t['date_debut'] ?></td>
            <td><?= $t['modele'] ?> (<?= $t['immatriculation'] ?>)</td>
            <td><?= $t['chauffeur_nom'] ?></td>
            <td><?= $t['recette'] ?></td>
            <td><?= $t['carburant'] ?></td>
            <td><?= $t['benefice'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php else: ?>
<p>Aucun parcours trouvé.</p>
<?php endif; ?>
