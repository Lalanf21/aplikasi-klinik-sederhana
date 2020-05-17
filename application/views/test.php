<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <?php foreach ($query->result() as $k): ?>
    <p>test! <?= $k->nama_pasien ?></p>
    <?php endforeach ?>
</body>
</html>