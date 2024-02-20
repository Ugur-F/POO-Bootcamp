<?php

    $bananas = [
        'name' => 'Bananas',
        'quantity' => 6,
        'price' => 1,
        'tva' => 0.06
    ];

    $apples = [
        'name' => 'Apples',
        'quantity' => 3,
        'price' => 1.5,
        'tva' => 0.06
    ];

    $bottlesOfWine = [
        'name' => 'Bottles of wine',
        'quantity' => 2,
        'price' => 10,
        'tva' => 0.21
    ];

    $shoppingCart = [$bananas, $apples, $bottlesOfWine];

    $totalHTVA = 0;
    $totalTVA = 0;

    foreach ($shoppingCart as $item) {

        $totalHTVA += $item['price'] * $item['quantity'];

        $tvaAmount = ($item['price'] * $item['quantity']) * (1 + $item['tva']);

        $totalTVA += $tvaAmount - ($item['price'] * $item['quantity']);

        echo "Item: {$item['name']} <br> Quantity: {$item['quantity']} <br> Price: {$item['price']} € <br> TVA: " . $item['tva'] * 100 . " <br><br>";
    }

    $totalTVAC = $totalHTVA + $totalTVA;

    echo "Total HTVA: {$totalHTVA} €<br>";
    echo "Total TVA: {$totalTVA} €<br>";
    echo "Total TVAC: {$totalTVAC} €<br>";