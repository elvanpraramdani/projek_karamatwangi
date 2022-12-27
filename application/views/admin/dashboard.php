<div class="contaier-fluid bg-white">

    <?php if ($this->session->flashdata('message')) { ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('message'); ?>
        </div>
    <?php } ?>

    <div class="dashboard-admin">

        <div class="row">
            <!-- sisi kiri -->
            <div class="col-lg-8">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="h4 mb-3">Dashboard</div>
                        <hr>

                        <div class="menu-dashboard-admin row mt-5">
                            <div class="col-lg-6 mb-4">
                                <a href="<?= base_url('Warga'); ?>" class="text-decoration-none">
                                    <div class="card shadow" style="border-left: 3px solid #17ca88;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-3 text-center">
                                                    <i class="fas fa-users text-success mt-2" style="font-size: 40px;"></i>
                                                </div>
                                                <div class="col-9">
                                                    <div class="col-12" style="margin-left: -20px;">
                                                        <span class="text-success font-weight-bold">Data Warga</span>
                                                    </div>
                                                    <div class="col-12" style="margin-left: -20px;">
                                                        <?php foreach ($jml_warga as $jm) :  ?>
                                                            <div class=" mt-2 text-secondary"><?= $jm['jmlWarga']; ?> Jiwa</div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- end menu -->

                        <hr class="sidebar-divider mt-5 mb-3">
                        <!-- grafik penerima bansos -->
                        <div class="grafik-penerima-bansos mt-5 container-fluid">
                            <div class="h5 text-secondary">Grafik Warga</div>
                            <div class="row">

                                <div class="col-xl-5 col-lg-5">
                                    <!-- Bar Chart -->
                                    <div class="card shadow mb-4 mt-3">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Jumlah Warga</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-bar">
                                                <canvas id="jumlah_warga"></canvas>
                                            </div>

                                            <hr>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end grafik -->
                    </div>
                </div>

            </div>

            <div class="col-lg-4">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="h4 mb-3"><span id="titik">.</span></div>
                        <hr>
                        <div class="accordion" id="accordionExample">
                            <div class="card mb-2 border-0 shadow">
                                <div class="card-header bg-white" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-decoration-none text-secondary " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <i class="fas fa-star-and-crescent fa-fw mr-2"></i> Data Agama
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="text-left ml-3 mb-3">
                                            <button type="button" href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#DataTambahanWarga" id="btn_modal_tambah_agama">Tambah</button>
                                        </div>
                                        <table class="table small table-hover">
                                            <tr>

                                                <th style="width:50px;">Agama</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                            <?php foreach ($agama as $a) : ?>
                                                <tr>

                                                    <td><?= $a['nama_agama']; ?></td>
                                                    <td class="text-right">
                                                        <a href="" class="badge badge-warning"><i class='bx bx-edit-alt'></i></a>
                                                        <form action="<?= base_url('Admin/deletetambahanwarga/' . $a['id_agama']); ?>" class="d-inline-block" method="post">
                                                            <input type="hidden" name="penanda" value="agama">
                                                            <button type="submit" class="badge badge-danger ml-2 border-0"><i class='bx bx-trash-alt'></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2 border-0 shadow">
                                <div class="card-header bg-white" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-decoration-none text-secondary  collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <i class="fas fa-building fa-fw mr-2"></i>Data Dusun
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="text-left ml-3 mb-3">
                                            <button type="button" href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#DataTambahanWarga" id="btn_modal_tambah_dusun">Tambah</button>

                                        </div>
                                        <table class="table small table-hover">
                                            <tr>

                                                <th style="width:50px;">Nama Dusun</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                            <?php foreach ($dusun as $a) : ?>
                                                <tr>

                                                    <td><?= $a['nama_dusun']; ?></td>
                                                    <td class="text-right">
                                                        <a href="" class="badge badge-warning"><i class='bx bx-edit-alt'></i></a>
                                                        <form action="<?= base_url('Admin/deletetambahanwarga/' . $a['id_dusun']); ?>" class="d-inline-block" method="post">
                                                            <input type="hidden" name="penanda" value="dusun">
                                                            <button type="submit" class="badge badge-danger ml-2 border-0"><i class='bx bx-trash-alt'></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2 border-0 shadow">
                                <div class="card-header bg-white" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-decoration-none text-secondary  collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <i class="fas fa-fw fa-briefcase mr-2"></i>Data Pekerjaan
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="text-left ml-3 mb-3">
                                            <button type="button" href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#DataTambahanWarga" id="btn_modal_tambah_pekerjaan">Tambah</button>

                                        </div>
                                        <table class="table small table-hover">
                                            <tr>

                                                <th>Pekerjaan</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                            <?php foreach ($pekerjaan as $a) : ?>
                                                <tr>

                                                    <td><?= $a['ket_pekerjaan']; ?></td>
                                                    <td class="text-right">
                                                        <a href="" class="badge badge-warning"><i class='bx bx-edit-alt'></i></a>
                                                        <form action="<?= base_url('Admin/deletetambahanwarga/' . $a['id_pekerjaan']); ?>" class="d-inline-block" method="post">
                                                            <input type="hidden" name="penanda" value="pekerjaan">
                                                            <button type="submit" class="badge badge-danger ml-2 border-0"><i class='bx bx-trash-alt'></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2 border-0 shadow">
                                <div class="card-header bg-white" id="heading4">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-decoration-none text-secondary  collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                            <i class="fas fa-user-graduate fa-fw mr-2"></i>Data Pendidikan
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="text-left ml-3 mb-3">
                                            <button type="button" href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#DataTambahanWarga" id="btn_modal_tambah_pendidikan">Tambah</button>

                                        </div>
                                        <table class="table small table-hover">
                                            <tr>

                                                <th>Pendidikan</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                            <?php foreach ($pendidikan as $a) : ?>
                                                <tr>

                                                    <td><?= $a['ket_pendidikan']; ?></td>
                                                    <td class="text-right">
                                                        <a href="" class="badge badge-warning"><i class='bx bx-edit-alt'></i></a>
                                                        <form action="<?= base_url('Admin/deletetambahanwarga/' . $a['id_pendidikan']); ?>" class="d-inline-block" method="post">
                                                            <input type="hidden" name="penanda" value="pendidikan">
                                                            <button type="submit" class="badge badge-danger ml-2 border-0"><i class='bx bx-trash-alt'></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2 border-0 shadow">
                                <div class="card-header bg-white" id="heading5">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-decoration-none text-secondary  collapsed" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                            <i class="fas fa-fw fa-link mr-2"></i>Status Hubungan Dalam Keluarga
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="text-left ml-3 mb-3">
                                            <button type="button" href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#DataTambahanWarga" id="btn_modal_tambah_shdk">Tambah</button>

                                        </div>
                                        <table class="table small table-hover">
                                            <tr>

                                                <th>SHDK</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                            <?php foreach ($shdk as $a) : ?>
                                                <tr>

                                                    <td><?= $a['ket_shdk']; ?></td>
                                                    <td class="text-right">
                                                        <a href="" class="badge badge-warning"><i class='bx bx-edit-alt'></i></a>
                                                        <form action="<?= base_url('Admin/deletetambahanwarga/' . $a['id_shdk']); ?>" class="d-inline-block" method="post">
                                                            <input type="hidden" name="penanda" value="shdk">
                                                            <button type="submit" class="badge badge-danger ml-2 border-0"><i class='bx bx-trash-alt'></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2 border-0 shadow">
                                <div class="card-header bg-white" id="heading6">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-decoration-none text-secondary  collapsed" type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                            <i class="fas fa-fw fa-heart mr-2"></i>Status Warga
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="text-left ml-3 mb-3">
                                            <button type="button" href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#DataTambahanWarga" id="btn_modal_tambah_status">Tambah</button>

                                        </div>
                                        <table class="table small table-hover">
                                            <tr>

                                                <th style="width:50px;">Status</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                            <?php foreach ($status as $a) : ?>
                                                <tr>

                                                    <td><?= ucwords($a['ket_status']); ?></td>
                                                    <td class="text-right">
                                                        <a href="" class="badge badge-warning"><i class='bx bx-edit-alt'></i></a>
                                                        <form action="<?= base_url('Admin/deletetambahanwarga/' . $a['id_status']); ?>" class="d-inline-block" method="post">
                                                            <input type="hidden" name="penanda" value="status">
                                                            <button type="submit" class="badge badge-danger ml-2 border-0"><i class='bx bx-trash-alt'></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>




<!-- dashboard -->
<!-- Jumlah Warga -->
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    // Bar Chart Example
    var ctx = document.getElementById("jumlah_warga");
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Laki-Laki", "Perempuan"],
            datasets: [{
                label: "Revenue",
                backgroundColor: "#4e73df",
                hoverBackgroundColor: "#2e59d9",
                borderColor: "#4e73df",
                data: [
                    <?php foreach ($jml_laki as $jl) {
                        echo $jl['jmlLaki'];
                    }
                    ?>,
                    <?php foreach ($jml_pr as $jp) {
                        echo $jp['jmlPr'];
                    }
                    ?>
                ],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'month'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 6
                    },
                    maxBarThickness: 25,
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: <?php foreach ($jml_warga as $jw) {
                                    echo $jw['jmlWarga'];
                                } ?>,
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return number_format(value) + ' jiwa';
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return number_format(tooltipItem.yLabel) + ' jiwa';
                    }
                }
            },
        }
    });
</script>

<?php
$count_penerima = $this->db->query("SELECT COUNT(id_penerima) AS jml FROM penerima_bansos ")->result_array();

foreach ($count_penerima as $p) :
    if ($p['jml'] > 1) :

?>
        <!-- Jumlah Penerima Bantuan -->
        <script>
            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            function number_format(number, decimals, dec_point, thousands_sep) {
                // *     example: number_format(1234.56, 2, ',', ' ');
                // *     return: '1 234,56'
                number = (number + '').replace(',', '').replace(' ', '');
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function(n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + Math.round(n * k) / k;
                    };
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }

            // Bar Chart Example
            var ctx = document.getElementById("jumlah_penerima");
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($group_bansos as $gb) : ?>
                            <?= '"' . $gb['nama_bansos'] . " " . '",'; ?>
                        <?php endforeach; ?>
                    ],
                    datasets: [{
                        label: "Revenue",
                        backgroundColor: "#4e73df",
                        hoverBackgroundColor: "#2e59d9",
                        borderColor: "#4e73df",
                        data: [
                            <?php foreach ($jml_penerima as $jp) : ?>
                                <?= '"' . $jp['jmlBansos'] . '",'; ?>
                            <?php endforeach; ?>
                        ],
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'month'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 6
                            },
                            maxBarThickness: 25,
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                                max: <?php
                                        $max = [];
                                        foreach ($jml_penerima as $jp) {
                                            array_push($max, $jp['jmlBansos']);
                                        }
                                        print_r(max($max));
                                        ?>,
                                maxTicksLimit: 5,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return number_format(value) + ' Penerima';
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                return number_format(tooltipItem.yLabel) + ' Penerima';
                            }
                        }
                    },
                }
            });
        </script>

    <?php else :  ?>
        <!--  -->
    <?php endif; ?>
<?php endforeach; ?>