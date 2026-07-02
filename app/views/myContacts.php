<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes contacts</title>
</head>
<body>
    <h1>Liste de mes contacts</h1>
    <?php if (!empty($contacts)):?>
        <p><a href="index.php?page=contacts/add">Ajouter un nouveau contact</a></p>
        <ul>
            <?php foreach ($contacts as $contact): ?>
                <li style="margin-bottom: 20px;">
                    <strong><?= htmlspecialchars($contact['first_name']) ?> <?= htmlspecialchars($contact['last_name']) ?></strong><br>
                    
                    Email : <?= htmlspecialchars($contact['email']) ?><br>
                    Téléphone : <?= htmlspecialchars($contact['phone']) ?><br>
                    Adresse : <?= htmlspecialchars($contact['address']) ?> - <?= htmlspecialchars($contact['city']) ?><br>
                    Catégorie : <strong><?= htmlspecialchars($contact['categoryName']) ?></strong><br>
                    
                    <a href="index.php?page=contacts/update&id=<?= $contact['id'] ?>">Modifier</a>
                    <a href="index.php?page=contacts/delete&id=<?= $contact['id'] ?>" onclick="return confirm('Supprimer ce contact ?')">Supprimer</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
