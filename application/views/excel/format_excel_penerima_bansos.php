<?php

$judul = 'Format Penerima Bantuan ' . $per_bansos->nama_bansos;

header("Content-type:application/octet-stream/");
header("Content-Disposition:attachment; filename=$judul.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<?= 'Format Upload Bantuan ' . $per_bansos->nama_bansos; ?>
<table border="1" cellspacing="0">
    <thead>
        <tr class="text-center bg-light">
            <th rowspan="2">No</th>
            <th rowspan="2">NIK</th>
            <th rowspan="2">Kode Bantuan Sosial</th>
        </tr>
        <tr></tr>
    </thead>
    <tbody>
        <tr>
            <td style="width: 30px; text-align:center;">1</td>
            <td style="width: 200px;"></td>
            <td style="width: 200px; text-align: center;"><?= $per_bansos->id_bansos; ?></td>
        </tr>
    </tbody>

</table>