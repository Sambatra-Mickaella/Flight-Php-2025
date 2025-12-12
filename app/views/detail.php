<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
     <article class="product-card">
                    <img src="/<?php echo($detail['image']) ?>" >
                    <h2><?= $detail['name'] ?></h2>
                    <p><?= $detail['detail'] ?></p>
                    <p><?php echo($detail['image']) ?> </p>
    </article>
</body>
</html>