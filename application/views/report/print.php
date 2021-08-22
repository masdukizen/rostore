<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>No. Document</th>
                <th>Document</th>
                <th>Tanggal</th>
                <th>Outlet</th>
                <th>Total (Rp)</th>
            </tr>
        </thead>

        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($tes as $t) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $t['no_faktur']; ?></td>
                    <td>Faktur Penjualan</td>
                    <td><?= $t['date_created']; ?></td>
                    <td><?= $t['outlet']; ?></td>
                    <td><?= $t['total_price']; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
            <tr>
                <td colspan="4"></td>
                <td>Grand Total</td>
                <?php foreach ($grandtotal as $key) : ?>
                    <td><?= $key['total_price']; ?></td>
                <?php endforeach; ?>
            </tr>
        </tbody>
    </table>

</body>

</html>