<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CodeGeneratorTest extends TestCase
{
    /** @var CodeGenerator */
    private $codeGenerator;

    protected function setUp()
    {
        $this->codeGenerator = new CodeGenerator();
    }

    /**
     * @dataProvider codesQuantityListDataProvider
     */
    public function testCodeGenerationQuantity(int $quantity): void
    {
        $this->codeGenerator->generateBatchCodes($quantity);

        $this->assertCount($quantity, $this->codeGenerator);
    }

    public function codesQuantityListDataProvider(): array
    {
        return [
            'zero' => [0],
            'one' => [1],
            'ten' => [10],
        ];
    }
}
