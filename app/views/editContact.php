<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire pour modifier un contact</title>
</head>
<body>
    <h1>Modifier le contact</h1>
    <form action="index.php?page=contacts/update&id=<?= $contact['id'] ?>" method="POST">
    <table>
        <tr>
            <td><label>Prénom :</label></td>
            <td><input type="text" name="first_name" value="<?= htmlspecialchars($contact['first_name']) ?>"></td>
        </tr>
        <tr>
            <td><label>Nom :</label></td>
            <td><input type="text" name="last_name" value="<?= htmlspecialchars($contact['last_name']) ?>"></td>
        </tr>
        <tr>
            <td><label>Email :</label></td>
            <td><input type="text" name="email" value="<?= htmlspecialchars($contact['email']) ?>"></td>
        </tr>
        <tr>
            <td><label>Téléphone :</label></td>
            <td><input type="text" name="phone" value="<?= htmlspecialchars($contact['phone']) ?>"></td>
        </tr>
        <tr>
            <td><label>Adresse :</label></td>
            <td><input type="text" name="address" value="<?= htmlspecialchars($contact['address']) ?>"></td>
        </tr>
        <tr>
            <td><label>Ville :</label></td>
            <td><input type="text" name="city" value="<?= htmlspecialchars($contact['city']) ?>"></td>
        </tr>
        <tr>
            <td><label>Catégorie :</label></td>
            <td><select name="category_id">
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>" 
                        <?= ($contact['category_id'] == $category['id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($category['name']) ?>
                    </option>
                <?php endforeach; ?>
                </select>
            </td>
        </tr>
    </table>
    <p><button type="submit">Enregistrer</button></p>
</form>
    <p><a href="index.php?page=contacts">Retour</a></p>
</body>
</html>