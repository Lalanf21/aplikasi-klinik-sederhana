<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Struk</title>

    <style>
        h3,
        h4 {
            text-align: center;
        }

        .invoice-box {
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <?= $query['no_bayar'] ?><br>
                                Tanggal: <?= $query['tgl_bayar'] ?><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Klinik Wahyu<br>
                                jl. Hj Basir No 50 Pondok Kacang barat<br>
                                Ciledug, Tangerang
                            </td>

                            <td>
                                Nama Pasien : <?= $query['nama_pasien'] ?><br>
                                Nama Dokter :<?= $query['nama_pegawai'] ?><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Jenis pembayaran
                </td>

                <td>

                </td>
            </tr>

            <tr class="details">
                <td>
                    Cash
                </td>

                <td>

                </td>
            </tr>

            <tr class="heading">
                <td>
                    Rincian
                </td>

                <td>
                    Harga
                </td>
            </tr>

            <tr class="item">
                <td>
                    Biaya Pemeriksaan
                </td>

                <td>
                    <?= 'Rp ' . number_format($query['biaya_pemeriksaan']) ?>
                </td>
            </tr>

            <tr class="item">
                <td>
                    Obat obatan
                </td>

                <td>
                    <?= 'Rp ' . number_format($query['total_harga'] - $query['biaya_pemeriksaan']) ?>
                </td>
            </tr>


            <tr class="total">
                <td></td>

                <td>
                    Total: <?= 'Rp ' . number_format($query['total_harga']) ?>
                </td>
            </tr>
            <tr class="total">
                <td></td>
                <td>bayar: <?= 'Rp ' . number_format($query['total_bayar']) ?></td>
            </tr>
            <tr class="total">
                <td></td>
                <td>kembalian: <?= 'Rp ' . number_format($query['kembalian']) ?></td>
            </tr>
        </table>
        <h3>Terima kasih</h3>
        <h4>Semoga Cepat Sembuh</h4>
    </div>
</body>

</html>