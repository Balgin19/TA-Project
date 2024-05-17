<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Surat Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Detail Surat Pembayaran</h1>
        </div>
        
        @foreach ($spp as $item)
            <div class="spp-info">
                <h2>Info Surat</h2>
                <p>No. SPP: {{ $item->no_spp }}</p>
                <p>Kepentingan: {{ $item->kepentingan }}</p>
                <p>Tanggal: {{ $item->tanggal }}</p>
            </div>

            <!-- Menampilkan detail pembayaran -->
            <div class="detail-pembayaran">
                <h2>Detail Pembayaran</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID Rencana</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details[$item->id_spp] as $detail)
                            <tr>
                                <td>{{ $detail->id_rencana }}</td>
                                <td>{{ $detail->harga }}</td>
                                <td>{{ $detail->jumlah }}</td>
                                <td>{{ $detail->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</body>
</html>
