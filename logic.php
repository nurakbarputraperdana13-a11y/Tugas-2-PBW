<?php 
    session_start();
    if(!isset($_SESSION["alldata"]) || !is_array($_SESSION["alldata"])){
        $_SESSION["alldata"]= [];
    }

    $nama = $npm ="";
    $tugas = $uts = $uas = null;
    $namaErr = $npmErr = $tugasErr = $utsErr = $uasErr = $pesanInput = ""; 
    
    //cek hapus harus diatas supaya ga dikira simpan
    if (isset($_POST["delete"])) {
    hapusData((int) $_POST["delete"]);
    }

    //logika simpan data
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["nama"])){
            $namaErr = "Nama tidak boleh kosong";
        } else {
            $_SESSION["nama"] = sanitize_input($_POST["nama"]);
            $nama = $_SESSION["nama"];
        }

        if(empty($_POST["npm"])){
            $npmErr = "NPM tidak boleh kosong";
        } else {
            $_SESSION["npm"] = sanitize_input($_POST["npm"]);
            $npm = $_SESSION["npm"];
        }

        if(empty($_POST["tugas"])){
            $tugasErr = "Nilai kosong";
        } else {

            //cek nilai
            if($_POST["tugas"] <= 100 && $_POST["tugas"] >= 0){
                $_SESSION["tugas"] = sanitize_input($_POST["tugas"]);
                $tugas = $_SESSION["tugas"];
            }
            else {
                $tugasErr = "Nilai tidak valid";
            }
        }

        if(empty($_POST["uts"])){
            $utsErr = "Nilai kosong";
        } else {

            //cek nilai
            if($_POST["uts"] <= 100 && $_POST["uts"] >= 0){
                $_SESSION["uts"] = sanitize_input($_POST["uts"]);
                $uts = $_SESSION["uts"];
            }
            else {
                $utsErr = "Nilai tidak valid";
            }
        }

        if(empty($_POST["uas"])){
            $uasErr = "Nilai kosong";
        } else {

            //cek nilai
            if($_POST["uas"] <= 100 && $_POST["uas"] >= 0){
                $_SESSION["uas"] = sanitize_input($_POST["uas"]);
                $uas = $_SESSION["uas"];
            }
            else {
                $uasErr = "Nilai tidak valid";
            }
        }

        //ngitung grade
        if(isset($tugas) && isset($uts)  &&  isset($uas) ){
            $_SESSION["nilaiAkhir"] = hitungNilaiAkhir($tugas, $uts, $uas);
    
            $_SESSION["grade"] = tentukanGrade($_SESSION["nilaiAkhir"]);

            $_SESSION["status"] = tentukanStatus($_SESSION["grade"]);
        }

        //nyimpen asosiatif array
        if($nama != "" && $npm != "" && $tugas != null && $uts != null && $uas !=null){
            
            $_SESSION["alldata"] [] = [
                "id" => floor(time()),
                "nama" => $_SESSION["nama"],
                "npm" => $_SESSION["npm"],
                "tugas" => $_SESSION["tugas"],
                "uts" => $_SESSION["uts"],
                "uas" => $_SESSION["uas"],
                "nilaiAkhir" => $_SESSION["nilaiAkhir"],
                "grade" => $_SESSION["grade"],
                "status" => $_SESSION["status"]
            ];

            $pesanInput = "Input Berhasil!";
        }
        else {
            $pesanInput = "Semua Data Harus Di isi!";
        }

        
    }

    function  sanitize_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function hitungNilaiAkhir($dataTugas, $dataUts, $dataUas){
        return ($dataTugas  * 0.3) +  ($dataUts * 0.3) + ($dataUas * 0.4);
    }

    function tentukanGrade($dataNilaiAkhir){
        if ($dataNilaiAkhir >= 85 && $dataNilaiAkhir <= 100){
                return "A";
            }
            elseif ($dataNilaiAkhir >= 75){
                return "B";
            }
            elseif ($dataNilaiAkhir >= 65){
                return "C";
            }
            elseif ($dataNilaiAkhir >= 50){
                return "D";
            }
            else {
                return  "E";
            }
        }

        function tentukanStatus($dataGrade){
        if ($dataGrade ==  "A"){
                return "Lulus";
            }
            elseif ($dataGrade ==  "B"){
                return "Lulus";
            }
            elseif ($dataGrade ==  "C"){
                return "Lulus";
            }
            elseif ($dataGrade ==  "D"){
                return "Lulus";
            }
            else {
                return "Tidak Lulus";
            }
        }

        function hapusData($index){
            $index = (int) $index;
            if(isset($_SESSION['alldata'])){
                unset($_SESSION['alldata'][$index]);
                $_SESSION["alldata"] = array_values($_SESSION['alldata']);
            }

            header("Location: riwayat.php");
            exit;
            
        }
?>