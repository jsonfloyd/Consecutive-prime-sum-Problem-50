<?php

namespace App;
require 'SuperPrime.php';
class ConsecutivePrimeSum{

    private $primes = [];
    private $limit;
    private $superPrime;

    public function __construct($n)
    {
        $this->limit = $n;
        $this->primes = $this->generatePrimes($n);
        $this->superPrime = new SuperPrime(0, 0, 0, 0);
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

        return array_values($nums);
    }

    public function iterateConsecutiveSums(int $start, int $end) : void
    {
        $sum = 0;
        for ($i = $start; $i < $end; $i++) {
            $sum += $this->primes[$i];


            if ($sum > $this->limit) {
                break;
            }
            $lng = $i - $start + 1;
            if ($this->superPrime->length < $lng && in_array($sum, $this->primes)) {
                $this->superPrime = new SuperPrime($this->primes[$start], $this->primes[$i], $lng, $sum);
            }
        }
    }

    public function getConsecutiveSums()
    {
        for ($i = 0; $i < count($this->primes); $i++) {
            $this->iterateConsecutiveSums($i, count($this->primes));
        }

        return $this->superPrime;
    }
}