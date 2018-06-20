<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class LotteryTest extends TestCase
{
    /** @var Lottery */
    private $lottery;

    protected function setUp()
    {
        $this->lottery = new Lottery(
            new CodeGenerator(),
            new OneThousandWinAmountStrategy()
        );
    }

    public function testAllTicketsCostOneEuro()
    {
        $this->lottery->create();

        $this->assertSame(
            Ticket::PRICE * Lottery::TICKETS_AMOUNT,
            $this->lottery->getTotalPrice()
        );
    }

    public function testTotalTicketsWinAmountNotBiggerThanTheLawRequires()
    {
        $this->lottery->create();

        $this->assertGreaterThanOrEqual(
            Ticket::PRICE * Lottery::TICKETS_AMOUNT * Lottery::MIN_PAYOUT_PERCENT,
            $this->lottery->getTotalWinAmount()
        );
    }
}
