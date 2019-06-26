<?php
    $koneksi = mysqli_connect("localhost", "root", "", "fakultas_teknik");

    if($koneksi){
        //echo "Alhamdulillah sudah terkoneksi";
    }else{
        echo "maaf, data gagal";
    }
?>
<body bgcolor="Aqua">

</body>
<h3>Muhammad Risky Mirad Rachman</h3>
<h3>E1E118057</h3>
<font color=’blue’><h1>Masukan Data Dosen</h1></font>

<form action="" method="post">
<table border="2">
    <tr>
        <td>NIP  </td>
        <td><input type="text" name="NIP"></td>
    </tr>
    <tr>
        <td>NAMA  </td>
        <td><input type="text" name="NAMA"></td>
    </tr>
    <tr>
        <td>GOLONGAN  </td>
        <td><input type="text" name="GOLONGAN"></td>
    </tr>
    <tr>
        <td>ALAMAT  </td>
        <td><input type="text" name="ALAMAT"></td>
    </tr>
    <tr>
        <td>No_Hp  </td>
        <td><input type="text" name="No_Hp"></td>
    </tr>
</table>
    <input type="submit" name="registrasi" value="Selesai">
</form>
<font color=’blue’><h1>Data Dosen</h1></font>
<table border="2">
    <thead>
		<th>No</th>
        <th>NIP</th>
        <th>NAMA</th>
        <th>GOLONGAN</th>
        <th>ALAMAT</th>
        <th>No Hp</th>
        <th>Hapus</th>
        
    </thead>
    <tbody>

        <?php
            $sqlView = "SELECT * FROM `dosen`";
            $cekView = mysqli_query($koneksi, $sqlView);

            $nomor = 1;
            while($data = mysqli_fetch_array($cekView)){
        ?>
        <tr>
            <td><?=$nomor ?></td>
            <td><?=$data[1] ?></td>
            <td><?=$data[2] ?></td>
            <td><?=$data[3] ?></td>
            <td><?=$data[4] ?></td>
            <td><?=$data[5] ?></td>
            <td>
                <a href="riskymiradrachman.php?id=<?=$data[0]?>">Delete</a>
            </td>
        </tr>
        <?php
            $nomor++; // ++ = nomor+1; 
            }
        ?>
    <!-- /end -->
    </tbody>
</table>

<?php
    if(isset($_POST['registrasi'])){
        $sqlInput = "INSERT INTO `dosen` (`NIP`,`NAMA`,`GOLONGAN`,`ALAMAT`,`No_Hp`)
                VALUES ('$_POST[NIP]', '$_POST[NAMA]', '$_POST[GOLONGAN]', '$_POST[ALAMAT]', '$_POST[No_Hp]')";
        $cekInput = mysqli_query($koneksi, $sqlInput);
        if($cekInput){
            // echo "Datanya udah masuk gan";
            echo "<script> window.location = 'riskymiradrachman.php' </script>";
        }else{
            echo "Aduh.. Gagal masuk datanya gan";
        }
    }

    if(isset($_GET['id'])){
        $sqlDelete = "DELETE FROM `dosen` WHERE
        `dosen`.`id` = '$_GET[id]'";
        $cekDelete = mysqli_query($koneksi, $sqlDelete);

        if($cekDelete){
            // echo "Datanya udah masuk gan";
            echo "<script> window.location = 'riskymiradrachman.php' </script>";
        }else{
            echo "maaf gagal menghapus";
        }
    }
?>