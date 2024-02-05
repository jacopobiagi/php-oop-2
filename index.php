<?php
include('object.php');

    class AnimalProduct{
        public $tipoProdotto;
        public $prezzoBase;

        function __construct($_tipoProdotto, $_prezzoBase){
            $this -> tipoProdotto = $_tipoProdotto;
            $this -> prezzoBase = $_prezzoBase;
        }
    }

    class CatProduct extends AnimalProduct{

        public $prezzo;
   
        public function setProd($price) {
            switch ($this->tipoProdotto){
                case 'giochi':
                    $this -> prezzo = $this->prezzoBase + 2 + $price;
                    break;
                
                case 'cibo':
                    $this -> prezzo = $prezzoBase + 4 + $price;
                    break;
                
                case 'cucce':
                    $this -> prezzo = $prezzoBase + 5 + $price;
                    break;
            }
        }
    
    }
    class DogProduct extends AnimalProduct{

        public $prezzo;
   
        public function setProd($price) {
            switch ($this->tipoProdotto){
                case 'giochi':
                    $this -> prezzo = $this->prezzoBase + 3 + $price;
                    break;
                
                case 'cibo':
                    $this -> prezzo = $this->prezzoBase + 5 + $price;
                    break;
                
                case 'cucce':
                    $this -> prezzo = $this->prezzoBase + 6 + $price;
                    break;
            }
        }

        public function getProd(){
            return $this->prezzo;
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>animal shop</title>
</head>
<body>
    <div class="container">
        <h1>Il mio shop</h1>
        <div class="container-card">
            <?php

                foreach($prodotti as $prodotto){

                    if ($prodotto['categoria'] === 'cane') {
                        $prodottoCane = new DogProduct($prodotto['tipologia'], $prodotto['prezzo']);
                        $prodottoCane-> setProd(1);
                    
                        echo ' <div class="card">
                                    <div class="img-cont">
                                        <img src="'.$prodotto['url_immagine'].'" alt="">
                                    </div>
                                    <div class="description">
                                        <h3>
                                            '.$prodotto['nome_prodotto'].'
                                        </h3>
                                        <p>
                                            '.$prodottoCane->getProd().'
                                        </p>
                                        <p>
                                            '.$prodotto['materiale'].'
                                        </p>
                                    </div>
                                </div>';
                    }else{
                        $prodottoGatto = new DogProduct($prodotto['tipologia'], $prodotto['prezzo']);
                        $prodottoGatto-> setProd(1);
                    
                        echo ' <div class="card">
                                    <div class="img-cont">
                                        <img src="'.$prodotto['url_immagine'].'" alt="">
                                    </div>
                                    <div class="description">
                                        <h3>
                                            '.$prodotto['nome_prodotto'].'
                                        </h3>
                                        <p>
                                            '.$prodottoGatto->getProd().'
                                        </p>
                                        <p>
                                            '.$prodotto['materiale'].'
                                        </p>
                                    </div>
                                </div>';
                    }
                    
                    
                }
                
            ?>
            <!-- <div class="card">
                <div class="img-cont">
                    <img src="https://img.freepik.com/free-photo/abstract-colorful-splash-3d-background-generative-ai-background_60438-2509.jpg?w=1060&t=st=1707153474~exp=1707154074~hmac=552b3042412e3fe7b63c7383cdf3bf46198cd750462ae407a73d5936b54cbe0e" alt="">
                </div>
                <div class="description">
                    <h3>
                        Osso per cani
                    </h3>
                    <p>
                        5.00€
                    </p>
                    <p>
                        materiale:plastica
                    </p>
                </div>
            </div> -->
        </div>
    </div>
</body>
</html>