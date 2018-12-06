<?php

namespace App;
class ConsecutivePrivmeSum{
    private $primes = [];
    private $limit;
    private $spLength = 0;
    private $spValue = 0;

    public function __construct($n)
    {
        $this->limit = $n;
        $this->primes = $this->generatePrimes($n);
//        $this->superPrime = ne/w SuperPrime(0, 0, 0, 0);
    }

    private function generatePrimes(int $n) : array
    {
        $nums = [];
        $startPrime = 2;

        for ($i = $startPrime; $i <= $n; $i++) {
            $nums[$i] = $i;
        }

        $index = $startPrime;

        while ($index <= $n) {

            if (!isset($nums[$index])) {
                $index++;
                continue;
            }

            $p = $nums[$index];
            $j = $startPrime;

            while ($j * $p <= $n) {
                unset($nums[$j * $p]);
                $j++;
            }

            $index++;
        }
//        print_r(array_values($nums));
//        print_r(count($nums));
        //2,3,5,7,11,13,17,19,23,29,31,37,41,43,47,53,59,61,67,71,73,79,83,89,97
        return array_values($nums);
    }

    public function iterateConsectiveSums(int $start, int $end) : void
    {
        $sum = 0;
        for ($i = $start; $i < $end; $i++) {
            $sum += $this->primes[$i];
            $lng = $i - $start + 1;
            if ($this->spLength < $lng && in_array($sum, $this->primes)) {
//                $sp = new SuperPrime($start, $i, $i - $start + 1, $sum);
//                $this->updateSuperPrime($sp);
                $this->spLength = $lng;
                $this->spValue = $sum;
            }
        }
    }

    public function getConsecutiveSums()
    {
        for($i = 0; $i < count($this->primes); $i++){
//            echo $i . PHP_EOL;
            $this->iterateConsectiveSums($i, count($this->primes));
        }

        return [$this->spValue, $this->spLength];
    }
}