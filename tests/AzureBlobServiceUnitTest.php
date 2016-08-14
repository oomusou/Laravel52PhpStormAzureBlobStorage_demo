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

    /** @test */
    public function 建立Blob()
    {
        /** arrange */

        /** act */
        $containerName = 'mycontainer';
        $blobName = 'myblob';
        $content = fopen(__DIR__ . '/blob.txt', 'r');
        $actual = $this->target->createBlob($containerName, $blobName, $content);

        /** assert */
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
}
