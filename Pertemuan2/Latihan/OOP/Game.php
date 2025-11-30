<?php 
require_once 'produk.php';
require_once 'komik.php';

class Game extends Produk {
    public $waktuMain;

    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain) {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }

    public function getInfoProduk() {
        $str = "Game : " . parent::getLabel() . " | (Rp. " . $this->harga . ") - " . $this->waktuMain . " Jam.";
        return $str;
    }
}

$produk1 = new Game("The Witcher", "Andrzej Sapkowski", "Supernova", 300000, 100);
$produk2 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 200000, 350);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
?>