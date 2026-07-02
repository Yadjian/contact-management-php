<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire pour ajouter un contact</title>
</head>
<body>
    <h1>Ajouter un contact</h1>
    <form action="index.php?page=contacts/add" method="POST">
    <table>
        <tr>
            <td><label>Prénom :</label></td>
            <td><input type="text" name="first_name" required></td>
        </tr>
        <tr>
            <td><label>Nom :</label></td>
            <td><input type="text" name="last_name" required></td>
        </tr>
        <tr>
            <td><label>Email :</label></td>
            <td><input type="email" name="email" required></td>
        </tr>
        <tr>
            <td><label>Téléphone :</label></td>
            <td><input type="text" name="phone" required></td>
        </tr>
        <tr>
            <td><label>Adresse :</label></td>
            <td><input type="text" name="address"></td>
        </tr>
        <tr>
            <td><label>Ville :</label></td>
            <td><input type="text" name="city"></td>
        </tr>
        <tr>
            <td><label>Catégorie :</label></td>
            <td>
                <select name="category_id">
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
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
