<?php 
    $halaman = basename($_SERVER['PHP_SELF']);
?>
        
        <header>
            <div class="icon">
                <i class="fa-solid fa-graduation-cap" style="width: 65px; height: 65px;"></i>
                <div class="icon-text">
                <h1>MNM</h1>
                <p>Manjemen Nilai <br>Mahasiswa</p>
                </div>
            </div>

            <nav>
                <a href="index.php" class="<?php echo ($halaman == 'index.php') ? 'active' : ''; ?>"><i class="fa-solid fa-pen-to-square"></i> Input Nilai</a>
                <a href="riwayat.php" class="<?php echo ($halaman == 'riwayat.php') ? 'active' : ''; ?>"><i class="fa-solid fa-clock-rotate-left"></i> Riwayat</a>
            </nav>
        </header>