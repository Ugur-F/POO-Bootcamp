<?php

class Item {
    public $name;
    public $quantity;
    public $price;
    public $tva;

    function __construct($name, $quantity, $price, $tva) {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->tva = $tva;
    }

    public function getTotalHTVA() {
        return $this->quantity * $this->price;
    }

    public function getTVA() {
        return $this->getTotalHTVA() * $this->tva;
    }

    public function getTotalTVAC() {
        return $this->getTotalHTVA() + $this->getTVA();
    }

    public function displayInfo() {
        echo "Item: {$this->name} <br> Quantity: {$this->quantity} <br> Price: {$this->price} € <br> TVA: " . $this->tva * 100 . " %<br><br>";
    }
}

$bananas = new Item('Bananas', 6, 1, 0.06);
$apples = new Item('Apples', 3, 1.5, 0.06);
$bottlesOfWine = new Item('Bottles of wine', 2, 10, 0.21);

$shoppingCart = [$bananas, $apples, $bottlesOfWine];

$totalHTVA = 0;
$totalTVA = 0;

foreach ($shoppingCart as $item) {
    $totalHTVA += $item->getTotalHTVA();
    $totalTVA += $item->getTVA();
    $item->displayInfo();
}

$totalTVAC = $totalHTVA + $totalTVA;

echo "Total HTVA: {$totalHTVA} €<br>";
echo "Total TVA: {$totalTVA} €<br>";
echo "Total TVAC: {$totalTVAC} €<br>";
?>
