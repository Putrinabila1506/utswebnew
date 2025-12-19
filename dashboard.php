<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Ambil data session
$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            margin: 30px;
        }
        h1 {
            color: #008080;
            text-align: center;
        }
        h2, h3 {
            text-align: center;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 75%;
        }
        table, th, td {
            border: 1px solid #555;
        }
        th {
            background-color: #008080;
            color: white;
            padding: 10px;
        }
        td {
            text-align: center;
            padding: 8px;
            background-color: #fff;
        }
        .logout {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            background-color: #008080;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            width: 120px;
            margin-left: auto;
            margin-right: auto;
        }
        .logout:hover {
            background-color: #006666;
        }
        hr {
            width: 80%;
            margin: 20px auto;
        }
    </style>
</head>
<body>

<h1>-- POLGAN MART --</h1>
<h3>Selamat Datang, <?php echo $username; ?> (<?php echo $role; ?>)</h3>

<hr>

<?php
// ================== DAFTAR PRODUK ==================
$kode_barang  = ["BARANG001", "BARANG002", "BARANG003", "BARANG004", "BARANG005"];
$nama_barang  = ["Indomie", "Teh Sosro", "Roti", "Susu Milo", "Waffle"];
$harga_barang = [5000, 4000, 7000, 5000, 5000];
?>

<h2>Daftar Produk</h2>
<table>
    <tr>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Harga (Rp)</th>
    </tr>
    <?php for ($i = 0; $i < count($kode_barang); $i++) : ?>
        <tr>
            <td><?php echo $kode_barang[$i]; ?></td>
            <td><?php echo $nama_barang[$i]; ?></td>
            <td><?php echo number_format($harga_barang[$i], 0, ',', '.'); ?></td>
        </tr>
    <?php endfor; ?>
</table>

<?php
// ================== DETAIL PEMBELIAN ==================
$pembelian = [
    ["kode" => "BARANG001", "nama" => "Indomie", "harga" => 5000, "jumlah" => 3],
    ["kode" => "BARANG003", "nama" => "Roti", "harga" => 7000, "jumlah" => 5],
    ["kode" => "BARANG005", "nama" => "Waffle", "harga" => 5000, "jumlah" => 2],
];

$grandtotal = 0;
?>

<h2>Detail Pembelian (Simulasi)</h2>
<table>
    <tr>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Harga (Rp)</th>
        <th>Jumlah</th>
        <th>Total (Rp)</th>
    </tr>

    <?php foreach ($pembelian as $item) : ?>
        <?php
            $total = $item['harga'] * $item['jumlah'];
            $grandtotal += $total;
        ?>
        <tr>
            <td><?php echo $item['kode']; ?></td>
            <td><?php echo $item['nama']; ?></td>
            <td><?php echo number_format($item['harga'], 0, ',', '.'); ?></td>
            <td><?php echo $item['jumlah']; ?></td>
            <td><?php echo number_format($total, 0, ',', '.'); ?></td>
        </tr>
    <?php endforeach; ?>

    <tr style="font-weight:bold; background-color:#e0f7f7;">
        <td colspan="4">Grand Total</td>
        <td>Rp <?php echo number_format($grandtotal, 0, ',', '.'); ?></td>
    </tr>
</table>

<a class="logout" href="logout.php">Logout</a>

</body>
</html>
