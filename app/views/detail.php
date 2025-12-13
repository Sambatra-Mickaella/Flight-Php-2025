<h2>Détail du parcours</h2>

<?php if ($parcours): ?>

<p>
    <strong>Départ :</strong> <?= $parcours['lieu_depart'] ?><br>
    <strong>Arrivée :</strong> <?= $parcours['lieu_arrivee'] ?><br>
    <strong>Distance :</strong> <?= $parcours['distance'] ?> km
</p>

<hr>

<h3>Statistiques</h3>
<p>
    Nombre de trajets : <?= $stats['nombre_trajets'] ?? 0 ?><br>
    Recette totale : <?= $stats['recette_totale'] ?? 0 ?> Ar<br>
    Carburant total : <?= $stats['carburant_total'] ?? 0 ?> Ar<br>
    Bénéfice total : <?= $stats['benefice_total'] ?? 0 ?> Ar
</p>

<hr>

<h3>Liste des trajets</h3>

<?php if (!empty($trajets)): ?>
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
    <p>Aucun trajet pour ce parcours.</p>
<?php endif; ?>

<br>
<a href="/">⬅ Retour à la liste</a>

<?php else: ?>
    <p>Parcours introuvable.</p>
<?php endif; ?>