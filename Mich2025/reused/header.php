<?php
 session_start();
 include '../util/connect.php';
?>

<header>
    <div class="macak-image"></div>
    <nav>

        <a href="../pages/index.php">Home</a>
        <a href="../pages/galerija.php">Galerija</a>
        <a href="../pages/kontakti.php">Kontakt</a>
        <a href="../pages/o-nama.php">O nama</a>
        <?php
        if (empty($_SESSION['priveleges'])) {
            echo "<a href='account.php'>Login - Registracija</a>";
        } elseif ($_SESSION['priveleges'] == 2) {
            echo "
                    <a href='unos.php'>Administracija - Unos</a>
                    <a href='edit.php'>Administracija - Edit</a>
                    <a href='account.php'>Account</a>
                ";
        } else {
            echo "<a href='account.php'>Account</a>";
        }
        ?>

    </nav>
</header>


