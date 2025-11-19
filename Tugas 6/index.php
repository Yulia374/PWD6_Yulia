<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tabel Perkalian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Tabel Perkalian 1–10</h2>

<table class="tabel-perkalian">
    <tr>
        <th class="judul-kiri">bilangan</th>
        <?php
            for ($i = 1; $i <= 10; $i++) {
                echo "<th class='header-atas'>$i</th>";
            }
        ?>
    </tr>

    <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "<tr>";
            echo "<th class='header-kiri'>$i</th>";

            for ($j = 1; $j <= 10; $j++) {
                $hasil = $i * $j;

                // warna cell ganjil = kuning, genap = biru
                $warna = ($hasil % 2 == 1) ? "cell-kuning" : "cell-biru";

                echo "<td class='$warna'>$hasil</td>";
            }

            echo "</tr>";
        }
    ?>
</table>

</body>
</html>
