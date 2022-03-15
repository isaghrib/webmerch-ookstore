<?php
$koneksi = new mysqli("localhost","root","","tokomerch");  
$content = '
	<style type="text/css">
.tabel{border-collapse: collapse;}
.tabel th{padding: 8px 10px; background-color: #cccccc;}
.tabel td{padding: 8px 10px;}

</style>
';


$content .= '

<page>
<br/>
<br/>
<h1 align="center">Data Pelanggan Yang Masuk</h1>
<h3 align="center" >TOKO GAME SHOP </h3>
<br/>
<table border="1" align="center" class="tabel">
<tr>
	<th align="center">No</th>
    <th align="center">Nama</th>
    <th align="center">email</th>
    <th align="center">telepon</th>

</tr>';
$no = 1;
$sql = $koneksi->query("select * from pelanggan");
while ($data= $sql->fetch_assoc()){

$content .= '

 <tr>

    <td>'.$data['id_pelanggan'].'</td>
    <td>'.$data['nama_pelanggan'].'</td>
    <td>'.$data['email_pelanggan'].'</td>
    <td>'.$data['telepon_pelanggan'].'</td>

 </tr>

 ';
}
 $content .= '
</table>

</page>';

require_once('../assets/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P', 'A4', 'fr');
$html2pdf -> WriteHTML($content);
$html2pdf -> Output('exemple.pdf');
 ?>
