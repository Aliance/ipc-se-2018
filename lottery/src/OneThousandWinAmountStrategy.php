<?php
declare(strict_types=1);

class OneThousandWinAmountStrategy
{
    const SORRY = 0;
    const ONE   = 1;
    const TWO   = 2;
    const TEN   = 10;

    const LIMITS = [
        self::SORRY => 50,  // +1 (+1 / -0)  * 50  = +50
        self::ONE   => 916, //  0 (+1 / -1)  * 916 =   0
        self::TWO   => 32,  // -1 (+1 / -2)  * 32  = -32
        self::TEN   => 2,   // -9 (+1 / -10) * 2   = -18
    ];

    private $amounts = [
        self::SORRY => 0,
        self::ONE   => 0,
        self::TWO   => 0,
        self::TEN   => 0,
    ];

    public function getWinAmount()
    {
        foreach (self::LIMITS as $winAmount => $limit) {
            if ($this->amounts[$winAmount] === $limit) {
                continue;
            }

            $this->amounts[$winAmount]++;

            return $winAmount;
        }
    }
}
