<?php
$q="";
if (isset($_GET['submit']) && !empty($_GET['q'])) {
 $q = $_GET['q'];
 $sql_where = " WHERE nama LIKE '%{$q}%'";
}

$title = 'Data Barang' ;
include("koneksi.php");

// query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
if (isset($sql_where))
    $sql .=$sql_where;
    echo $sql;
$result = mysqli_query($conn, $sql);

?>

<?php require("header_database.php"); ?>

<link rel="stylesheet" href="style.css">
    <div class="content">
        <h2>Data Barang</h2>

<?php
echo '<a href="tambah.php" class="btn btn-large"> Tambah Barang </a>';


?>
<form action="" method="get">
    <label for = "q"> Cari data: </label>
    <input type = "text" id = "q" name = "q" class = "input-q" value = "<?php echo $q ?>">
    <input type = "submit" name = "submit" value = "Cari" class = "btn btn-primary">
</form>

<?php
if ($result):
?>

            <table>
                
            <tr>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php if ($result): ?>
            <?php while ($row= mysqli_fetch_array($result)) : ?>
            <tr>
                <td><img src="gambar/<?=$row['gambar'];?>" alt="<?=$row['nama'];?>"></td>
                <td><?=$row['nama'];?></td>
                <td><?=$row['kategori'];?></td>
                <td><?=$row['harga_beli'];?></td>
                <td><?=$row['harga_jual'];?></td>
                <td><?=$row['stok'];?></td>
                <td><?=$row['id_barang'];?></td>
            </tr>
            <?php endwhile; else: ?>
            <tr>
                <td colspan="7">Belum Ada Data</td>
            </tr>
            <?php endif; ?>
            </table>
    </div>
<?php
endif; 
?>

<?php require("footer_database.php"); ?>