<?php 
class Produk {
    public $judul,
           $penulis,
           $penerbit,
           $harga;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getLabel() {
        return "$this->judul, $this->penulis, $this->penerbit";
    }

    public function getInfoProduk() {
        $str = "{$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }
}
?>