<?php
$prenom = '';
$nom = '';
$email = '';
$email_confirm = '';
$age = '';
$filiere = '';
$motivation = '';
$reglement = false;
$erreurs = [];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
 <form action="" method="POST">

        <label for="prenom">Prénom :</label><br>
        <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($prenom); ?>"><br><br>

        <label for="nom">Nom :</label><br>
        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($nom); ?>"><br><br>

        <label for="email">Email :</label><br>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>"><br><br>

        <label for="email_confirm">Confirmation de l’email :</label><br>
        <input type="email" id="email_confirm" name="email_confirm" value="<?php echo htmlspecialchars($email_confirm); ?>"><br><br>

        <label for="age">Âge :</label><br>
        <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($age); ?>"><br><br>

        <label for="filiere">Filière :</label><br>
        <select id="filiere" name="filiere">
            <option value="">-- Choisir une filière --</option>
            <option value="Informatique" <?php if ($filiere === 'Informatique') echo 'selected'; ?>>Informatique</option>
            <option value="Réseaux" <?php if ($filiere === 'Réseaux') echo 'selected'; ?>>Réseaux</option>
            <option value="Télécom" <?php if ($filiere === 'Télécom') echo 'selected'; ?>>Télécom</option>
            <option value="Cybersécurité" <?php if ($filiere === 'Cybersécurité') echo 'selected'; ?>>Cybersécurité</option>
        </select><br><br>

        <label for="motivation">Motivation :</label><br>
        <textarea id="motivation" name="motivation" rows="5" cols="40"><?php echo htmlspecialchars($motivation); ?></textarea><br><br>

        <input type="checkbox" id="reglement" name="reglement" <?php if ($reglement) echo 'checked'; ?>>
        <label for="reglement">J’accepte le règlement</label><br><br>

        <button type="submit">Envoyer</button>

    </form>

    
</body>
</html>
