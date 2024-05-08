<?php 
include "config.php";

// Get the search keyword from the form submission
$key = isset($_POST['cari']) ? $_POST['cari'] : '';

// Execute the SQL query based on the search keyword
$QueryString = "SELECT * FROM transaksi WHERE kodetransaksi LIKE '%$key%' OR idpeminjam LIKE '%$key%' OR kodebuku LIKE '%$key%' OR tglpinjam LIKE '%$key%' OR tglkembali LIKE '%$key%'";
$result = mysqli_query($mysqli, $QueryString); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pencarian Data Transaksi</title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
    <?php require("nav.php"); ?>
    <div id="wrap">
        <div class="container mt-4">
            <div class="title mt-4 mb-3"><img src="images/iconbuku.jpg" alt="" /> Hasil Pencarian</div>

            <!-- Display search keyword in a styled alert box -->
            <?php if (!empty($key)) : ?>
                <div class="alert alert-primary" role="alert">
                    <strong>Keyword pencarian:</strong> <?php echo htmlspecialchars($key); ?>
                </div>
            <?php endif; ?>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Transaksi</th>
                        <th>ID Peminjam</th>
                        <th>Kode Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                    while($user_data = mysqli_fetch_array($result)) {         
                        echo "<tr>";
                        echo "<td>".$user_data['kodetransaksi']."</td>";
                        echo "<td>".$user_data['idpeminjam']."</td>";
                        echo "<td>".$user_data['kodebuku']."</td>";
                        echo "<td>".$user_data['tglpinjam']."</td>";
                        echo "<td>".$user_data['tglkembali']."</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
