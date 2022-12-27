<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_pdf; ?></title>
    <style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <div style="text-align:center">
        <h3> DATA BANTUAN SOSIAL </h3>
    </div>
    <table id="table">
        <thead>
            <tr>
                <th class="text-center">No</th>

                <?php if ($this->session->userdata('email')) : ?>
                    <th>NIK</th>
                <?php endif; ?>

                <th>Nama</th>
                <th>Alamat</th>
                <th>Nama Ayah</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($penerima_per_bansos as $p) : ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <?php if ($this->session->userdata('email')) : ?>
                        <td><?= $p['nik']; ?></td>
                    <?php endif; ?>
                    <td><?= $p['nama_warga']; ?></td>
                    <td><?= ucwords($p['nama_dusun']); ?></td>
                    <td><?= $p['nama_ayah']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>