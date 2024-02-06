<?php
include('object.php');


    // classe iniziale
    class AnimalProduct{
        public $tipoProdotto;
        public $prezzoBase;

        function __construct($_tipoProdotto, $_prezzoBase){
            $this -> tipoProdotto = $_tipoProdotto;
            $this -> prezzoBase = $_prezzoBase;
        }
    }

    //inclusione trait
    trait animalPrice{
        public $prezzo;
    }


    //estensione gatto
    class CatProduct extends AnimalProduct{

       use animalPrice;
   
        public function setProd($price) {
            switch ($this->tipoProdotto){
                case 'giochi':
                    $this -> prezzo = $this->prezzoBase + 2.00 + $price;
                    break;
                
                case 'cibo':
                    $this -> prezzo = $this->prezzoBase + 4.00 + $price;
                    break;
                
                case 'cucce':
                    $this -> prezzo = $this->prezzoBase + 5.00 + $price;
                    break;
            }
        }

        public function getProd(){
            return $this->prezzo;
        }
    
    }

    //estensione cane
    class DogProduct extends AnimalProduct{

        use animalPrice;
   
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
                    try {
                        if ($prodotto['categoria'] === 'cane') {
                            $prodottoCane = new DogProduct($prodotto['tipologia'], $prodotto['prezzo']);

                            // Controllo se $prodotto['prezzo'] è un float
                            if (!is_float($prodotto['prezzo'])) {
                                throw new InvalidArgumentException('Il prezzo deve essere un numero.');
                            }

                            $prodottoCane->setProd(1);
                        
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
                        } else {
                            $prodottoGatto = new CatProduct($prodotto['tipologia'], $prodotto['prezzo']);

                            // Controllo se $prodotto['prezzo'] è un float
                            if (!is_float($prodotto['prezzo'])) {
                                throw new InvalidArgumentException('Il prezzo deve essere un numero.');
                            }

                            $prodottoGatto->setProd(1);
                        
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
                    } catch (InvalidArgumentException $e) {
                        echo 'Errore: ' . $e->getMessage();
                    }
                }
                
            ?>
        </div>
    </div>
</body>
</html>