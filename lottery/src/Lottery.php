<?php
declare(strict_types=1);

class Lottery
{
    const TICKETS_AMOUNT = 1000;

    const MIN_PAYOUT_PERCENT = 0.95;

    private $tickets = [];

    private $codeGenerator;

    private $winAmountStrategy;

    public function __construct(CodeGenerator $codeGenerator, OneThousandWinAmountStrategy $winAmountStrategy)
    {
        $this->codeGenerator = $codeGenerator;
        $this->winAmountStrategy = $winAmountStrategy;
    }

    public function create(): void
    {
        $this->codeGenerator->generateBatchCodes(self::TICKETS_AMOUNT);

        foreach ($this->codeGenerator as $code) {
            $this->addTicket($code);
        }
    }

    public function addTicket(string $code): Ticket
    {
        $this->tickets[$code] = new Ticket($code, $this->winAmountStrategy->getWinAmount());

        return $this->tickets[$code];
    }

    public function getTotalPrice(): int
    {
        return array_reduce($this->tickets, function (int $total, Ticket $ticket) {
            return $total + $ticket->getPrice();
        }, 0);
    }

    public function getTotalWinAmount(): int
    {
        return array_reduce($this->tickets, function (int $total, Ticket $ticket) {
            return $total + $ticket->getWinAmount();
        }, 0);
    }
}
