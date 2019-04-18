<?php

class Product {

    private $total = 0;
    private $r01Count = 0;
    private $r01Flag = 0;
    private $productArray = array(
        'R01' =>32.95,
        'G01' =>24.95,
        'B01' =>7.95,
    );

    public function deliveryRule() {
        if ($this->total < 50) {
            $this->total += 4.95;
        }
        elseif ($this->total >= 50 && $this->total < 90){
            $this->total += 2.95;
        }
    }

    public function offer()  {
        $this->r01Count++;
        if ($this->r01Count > 1 && $this->r01Flag == 0){
            $this->r01Flag = 1;
            $this->total += $this->productArray['R01']/2;
        }
        else{
            $this->total += $this->productArray['R01'];
        }
    }
    public function add($code) {
        if ($code == 'R01') {
            $this->offer();

        }
        else{
            $this->total += $this->productArray[$code];
        }
    }

    public function getTotal() {
        $this->deliveryRule();
        return $this->total;
    }
}

$product = new Product();
$product->add('B01');
$product->add('B01');
$product->add('R01');
$product->add('R01');
$product->add('R01');
echo $product->getTotal();

?>

