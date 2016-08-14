<?php

use App\Services\AzureBlobService;

class AzureBlobServiceUnitTest extends TestCase
{
    /** @var AzureBlobService */
    protected $target;

    protected function setUp()
    {
        parent::setUp();
        $this->target = App::make(AzureBlobService::class);
    }

    /** @test */
    public function 建立Container()
    {
        /** arrange */

        /** act */
        $containerName = 'mycontainer';
        $actual = $this->target->createContainer($containerName);

        /** assert */
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
}
