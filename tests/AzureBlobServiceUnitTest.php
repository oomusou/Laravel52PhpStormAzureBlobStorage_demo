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

    /** @test */
    public function 顯示所有Blob()
    {
        /** arrange */

        /** act */
        $containerName = 'mycontainer';
        $actual = $this->target->listAllBlobs($containerName)->all();

        /** assert */
        $expected = [
            ['name' => 'myblob', 'url'  => 'https://laravel52blobstorage.blob.core.windows.net/mycontainer/myblob']
        ];
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function 下載Blob()
    {
        /** arrange */

        /** act */
        $containerName = 'mycontainer';
        $blobName = 'myblob';
        $actual = $this->target->downloadBlob($containerName, $blobName);

        /** assert */
        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function 刪除Blob()
    {
        /** arrange */

        /** act */
        $containerName = 'mycontainer';
        $blobName = 'myblob';
        $actual = $this->target->deleteBlob($containerName, $blobName);

        /** assert */
        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function 刪除Container()
    {
        /** arrange */

        /** act */
        $containerName = 'mycontainer';
        $actual = $this->target->deleteContainer($containerName);

        /** assert */
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
}
