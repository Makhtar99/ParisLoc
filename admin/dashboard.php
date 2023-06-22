<?php
session_start(); // Démarre la session pour accéder aux données utilisateur

// Vérifie si l'utilisateur est connecté en tant qu'administrateur
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Admin') {
    // Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté ou n'est pas administrateur
    header("Location: ./login.php");
    exit();
}

// Effectue les opérations de mise à jour dans la base de données si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "Airbnb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Met à jour le rôle de l'utilisateur
    if (isset($_POST['update_role'])) {
        $user_id = $_POST['user_id'];
        $new_role = $_POST['new_role'];

        $sql = "UPDATE utilisateurs SET role = '$new_role' WHERE id = '$user_id'";

        if ($conn->query($sql) !== TRUE) {
            echo "Erreur lors de la mise à jour du rôle : " . $conn->error;
        }
    }

    // Désactive le compte de l'utilisateur
    if (isset($_POST['deactivate_account'])) {
        $user_id = $_POST['user_id'];

        $sql = "UPDATE utilisateurs SET active = 0 WHERE id = '$user_id'";

        if ($conn->query($sql) !== TRUE) {
            echo "Erreur lors de la désactivation du compte : " . $conn->error;
        }
    }

    // Supprime le compte de l'utilisateur
    if (isset($_POST['delete_account'])) {
        $user_id = $_POST['user_id'];

        $sql = "DELETE FROM utilisateurs WHERE id = '$user_id'";

        if ($conn->query($sql) !== TRUE) {
            echo "Erreur lors de la suppression du compte : " . $conn->error;
        }
    }

    $conn->close();
}

// Récupère tous les utilisateurs de la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Airbnb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

$sql = "SELECT * FROM utilisateurs";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestion des utilisateurs</title>
</head>
<body>
    <h1>Gestion des utilisateurs</h1>

    <?php if ($result->num_rows > 0) : ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Nom d'utilisateur</th>
                <th>Adresse e-mail</th>
                <th>Rôle</th>
                <th>Actif</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                            <select name="new_role">
                                <option value="Admin" <?php if ($row['role'] === 'Admin') echo 'selected'; ?>>Admin</option>
                                <option value="User" <?php if ($row['role'] === 'User') echo 'selected'; ?>>User</option>
                            </select>
                            <button type="submit" name="update_role">Mettre à jour</button>
                        </form>
                    </td>
                    <td><?php echo ($row['active'] == 1) ? 'Oui' : 'Non'; ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="deactivate_account">Désactiver</button>
                            <button type="submit" name="delete_account">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else : ?>
        <p>Aucun utilisateur trouvé dans la base de données.</p>
    <?php endif; ?>

    <a href="logout.php">Se déconnecter</a>
</body>
</html>

