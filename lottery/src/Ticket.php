<?php
declare(strict_types=1);

class Ticket
{
    const PRICE = 1;

    private $code;

    private $price;

    private $winAmount;

    public function __construct(string $code, int $winAmount, int $price = self::PRICE)
    {
        $this->code = $code;
        $this->winAmount = $winAmount;
        $this->price = $price;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getWinAmount(): int
    {
        return $this->winAmount;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}
