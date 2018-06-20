<?php
declare(strict_types=1);

class CodeGenerator implements \IteratorAggregate
{
    private $codes = [];

    public function generateBatchCodes(int $quantity)
    {
        for ($i = $quantity; $i--;) {
            $this->codes[] = $this->generateCode();
        }
    }

    private function generateCode()
    {
        do {
            $code = uniqid();
        } while (isset($this->codes[$code]));

        return $code;
    }

    public function getIterator()
    {
        foreach ($this->codes as $code) {
            yield $code;
        }
    }
}
