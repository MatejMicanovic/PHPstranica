<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Galerija</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>
    <?php include "../reused/header.php" ?>
    <main>
        <h1>Galerija društvenih igara</h1>
        <div id="galerija">
            
                <?php
                $query = "SELECT * FROM clanci ";
                $result = mysqli_query($dbc, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<article><a href = './clanak.php?id=" . $row['id'] . "'><img src='../img/" . $row['slika'] . "'/><h4>" . $row['naslov'] . "</h4></a></article>";
                }
                ?>
           

        </div>
    </main>
    <?php include "../reused/footer.php" ?>
</body>

</html>