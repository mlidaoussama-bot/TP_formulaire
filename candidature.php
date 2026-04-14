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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = $_POST['prenom'] ?? '';
    $nom = $_POST['nom'] ?? '';
    $email = $_POST['email'] ?? '';
    $email_confirm = $_POST['email_confirm'] ?? '';
    $age = $_POST['age'] ?? '';
    $filiere = $_POST['filiere'] ?? '';
    $motivation = $_POST['motivation'] ?? '';
    $reglement = isset($_POST['reglement']);

    // Validation des données
    if (empty($prenom)) {
        $erreurs[] = "Le prénom est obligatoire.";
    }

    if (empty($nom)) {
        $erreurs[] = "Le nom est obligatoire.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = "L'adresse email est invalide.";
    }

    if (empty($filiere)) {
        $erreurs[] = "Veuillez choisir une filière.";
    }

    if (strlen($motivation) < 30) {
        $erreurs[] = "La motivation doit contenir au moins 30 caractères.";
    }

    if (strlen($motivation) > 300) {
        $erreurs[] = "La motivation ne doit pas dépasser 300 caractères.";
    }

    if (!is_numeric($age) || $age < 16 || $age > 30) {
        $erreurs[] = "L'âge doit être un nombre entre 16 et 30.";
    }

    if (!$reglement) {
        $erreurs[] = "Vous devez accepter le règlement.";
    }
}
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
<?php if (empty($erreurs) && $_SERVER['REQUEST_METHOD'] === 'POST'): ?>

    <h1>Candidature reçue !</h1>
    <div class="confirmation">
        <p><strong>Prénom :</strong> <?php echo htmlspecialchars($prenom); ?></p>
        <p><strong>Nom :</strong> <?php echo htmlspecialchars($nom); ?></p>
        <p><strong>Email :</strong> <?php echo htmlspecialchars($email); ?></p>
        <p><strong>Âge :</strong> <?php echo htmlspecialchars($age); ?></p>
        <p><strong>Filière :</strong> <?php echo htmlspecialchars($filiere); ?></p>
        <p><strong>Motivation :</strong></p>
        <p><?php echo htmlspecialchars($motivation); ?></p>
        <p>Votre candidature a bien été enregistrée. Nous vous contacterons à l'adresse indiquée.</p>
        <a href="candidature.php">Soumettre une nouvelle candidature</a>
    </div>

<?php else: ?>

    <?php if (!empty($erreurs)): ?>
        <ul class="erreurs">
            <?php foreach ($erreurs as $e): ?>
                <li><?php echo $e; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

 <form action="" method="POST">

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($prenom); ?>">

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($nom); ?>">

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">

        <label for="email_confirm">Confirmation de l'email :</label>
        <input type="email" id="email_confirm" name="email_confirm" value="<?php echo htmlspecialchars($email_confirm); ?>">

        <label for="age">Âge :</label>
        <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($age); ?>">

        <label for="filiere">Filière :</label>
        <select id="filiere" name="filiere">
            <option value="">-- Choisir une filière --</option>
            <option value="Informatique" <?php if ($filiere === 'Informatique') echo 'selected'; ?>>Informatique</option>
            <option value="Réseaux" <?php if ($filiere === 'Réseaux') echo 'selected'; ?>>Réseaux</option>
            <option value="Télécom" <?php if ($filiere === 'Télécom') echo 'selected'; ?>>Télécom</option>
            <option value="Cybersécurité" <?php if ($filiere === 'Cybersécurité') echo 'selected'; ?>>Cybersécurité</option>
        </select>

        <label for="motivation">Motivation :</label>
        <textarea id="motivation" name="motivation" rows="5" cols="40"><?php echo htmlspecialchars($motivation); ?></textarea>
        <small><?php echo strlen($motivation); ?> / 300 caractères</small>

        <input type="checkbox" id="reglement" name="reglement" <?php if ($reglement) echo 'checked'; ?>>
        <label for="reglement">J'accepte le règlement</label>

        <button type="submit">Envoyer</button>

    </form>

<?php endif; ?>
    
</body>
</html>
