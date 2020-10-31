<?php
/*ID: 612119264 
Name: Zhe Yin
*/
class Multiplication{
    private $number;
    function __construct($number){
        $this->number = $number;
    }
    function printValue($n){
        $start = $this->number;
        for($i=1; $i<=$start; $i++){
            for($j=2; $j<=$n; $j++){
                $sum = $i*$j;
                printf("%d \t",$sum);
            }
            echo "\n";
        }
    }
}
$koon = new  Multiplication((int)$_SERVER['argv'][1]);
while (true) {
    echo "Input number(0 for exit) : ";
    fscanf(STDIN, "%d", $num);
    if($num==0){
        return 0;
    }
    $koon->printValue($num);
}