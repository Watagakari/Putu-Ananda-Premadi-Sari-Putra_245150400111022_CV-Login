<?php
session_start();
if (!isset($_SESSION['user']) && !isset($_COOKIE['user'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    setcookie('name', $_POST['name'], time() + 3600, '/');
    setcookie('birthplace', $_POST['birthplace'], time() + 3600, '/');
    setcookie('birthdate', $_POST['birthdate'], time() + 3600, '/');
    setcookie('education', $_POST['education'], time() + 3600, '/');
    header("Location: CV.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Dashboard</h2>
    <p>Email: <?php echo htmlspecialchars($_COOKIE['user']); ?></p>
    
    <form method="post">
        <label>Nama:</label>
        <input type="text" name="name" value="<?php echo isset($_COOKIE['name']) ? htmlspecialchars($_COOKIE['name']) : ''; ?>" required><br>
        
        <label>Tempat Lahir:</label>
        <input type="text" name="birthplace" value="<?php echo isset($_COOKIE['birthplace']) ? htmlspecialchars($_COOKIE['birthplace']) : ''; ?>" required><br>
        
        <label>Tanggal Lahir:</label>
        <input type="date" name="birthdate" value="<?php echo isset($_COOKIE['birthdate']) ? htmlspecialchars($_COOKIE['birthdate']) : ''; ?>" required><br>
        
        <label>Riwayat Pendidikan:</label>
        <textarea name="education" required><?php echo isset($_COOKIE['education']) ? htmlspecialchars($_COOKIE['education']) : ''; ?></textarea><br>
        
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
