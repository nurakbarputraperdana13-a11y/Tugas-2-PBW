<?php
    include("logic.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Riwayat</title>

    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/e92eff433b.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=PT+Mono&display=swap"
    rel="stylesheet"></head>
<body>
    <div class="container">
        <?php include("includes/header.php");?>

        <main>
            <h1>Riwayat Mahasiswa</h1>
            <div class="input-box">
                <?php 

                    echo "<form action='". htmlspecialchars($_SERVER["PHP_SELF"]) ."' method='post'  class='table-wraper'>";
                    echo "<table border=2>
                        <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NPM</th>
                        <th>Tugas</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>Nilai Akhir</th>
                        <th>Grade</th>
                        <th>Status</th>
                        <th>IPK</th>
                        <th>Hapus</th>
                        </tr>";

                    foreach($_SESSION["alldata"] as $i => $data){
                        $i = (int) $i;
                        echo "<tr>";
                        echo "<td>". ($i+1) ."</td>";
                        echo "<td>". $data['nama']."</td>";
                        echo "<td>". $data['npm']."</td>";
                        echo "<td>". $data['tugas']."</td>";
                        echo "<td>". $data['uts']."</td>";
                        echo "<td>". $data['uas']."</td>";
                        echo "<td>". $data['nilaiAkhir']."</td>";
                        echo "<td>". $data['grade']."</td>";
                        echo "<td>". $data['status']."</td>";
                        echo "<td>". $data['ipk']."</td>";
                        echo "<td>". "<button type='submit' name='delete' value='" . $i ."'> X </button>"."</td>";
                        echo "</tr>";
                        
                    }

                    echo "</table>";
                    echo "</form>";
                ?>
            </div>
            
        </main>
    </div>
</body>
</html>