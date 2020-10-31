<?php
/*ID: 61211064
Name: Zhe Yin
*/
class electricbill  
{
    private $pricings = [];
    function __construct($tablename){
        $fp=fopen($tablename,'r');
        fscanf($fp,"%d",$n);
        for ($i=0; $i <$n ; $i++) { 
        fscanf($fp,"%d %d %d",$this->pricings[$i]['unit'],$this->pricings[$i]['price'],$this->pricings[$i]['whole']);
        }
        fclose($fp);
    }

    function calculatePrice($unit){
        $price = 0;
     for($i = 0; $unit > 0; $i++) {
            $unitCal = ($unit > $this->pricings[$i]['unit'])? $this->pricings[$i]['unit'] : $unit;
            $price += ($this->pricings[$i]['whole'])? $this->pricings[$i]['price'] : $unitCal * $this->pricings[$i]['price'];
            $unit -= $unitCal;
         }
         printf("price of electricity bill = %d\n", $price);
    }
}
$billtable = new electricbill($_SERVER['argv'][1]);

$unit=0;
while($unit!=-1){
    echo "Input usage unit(-1 for exit):";
    fscanf(STDIN,"%d",$unit);
    if($unit == -1) exit;
    $billtable->calculatePrice($unit);
    }
?>