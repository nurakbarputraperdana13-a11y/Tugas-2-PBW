<?php 
    include("logic.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Managemen Nilai Mahasiswa</title>

    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/e92eff433b.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=PT+Mono&display=swap"
    rel="stylesheet">
</head>
<body>
    <div class="container">
        <?php include("includes/header.php");?>

        <main>
            <h1>Input Nilai Mahasiswa</h1>

            <div class="input-box">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" class="input-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" placeholder="Masukan nama">
                    <span><?php echo $namaErr ?></span>

                    <label for="npm">NPM</label>
                    <input type="number" name="npm" id="npm" placeholder="Masukan NPM">
                    <span><?php echo $npmErr ?></span>

                    <div class="input-nilai">
                        <div>
                            <label for="tugas">Tugas</label>
                            <input type="number" name="tugas" id="tugas">
                            <span><?php echo $tugasErr ?></span>
                        </div>
                        
                        <div>
                            <label for="uts">UTS</label>
                            <input type="number" name="uts" id="uts">
                            <span><?php echo $utsErr ?></span>
                        </div>

                        <div>
                            <label for="uas">UAS</label>
                            <input type="number" name="uas" id="uas">
                            <span><?php echo $uasErr ?></span>
                        </div>
                    </div>

                    <input type="submit" value="Simpan" name="submit" class="btn-submit">
                </form>

                <h3><?php echo $pesanInput ?></h3>
            </div>
        </main>
    </div>
</body>
</html>