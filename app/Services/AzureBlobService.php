<?php

namespace App\Services;

use MicrosoftAzure\Storage\Blob\Internal\IBlob;
use MicrosoftAzure\Storage\Common\ServiceException;
use WindowsAzure\Common\ServicesBuilder;

class AzureBlobService
{
    /** @var string */
    protected $storageConnectionString;
    /** @var IBlob */
    protected $blobProxy;

    /**
     * AzureBlobService constructor.
     */
    public function __construct()
    {
        $this->storageConnectionString = env('AZURE_STORAGE');
        $this->blobProxy = ServicesBuilder::getInstance()->createBlobService($this->storageConnectionString);
    }

    /**
     * 建立 Container
     * @param string $containerName
     * @return bool
     */
    public function createContainer(string $containerName) : bool
    {
        try {
            $this->blobProxy->createContainer($containerName);
        } catch (ServiceException $exception) {
            echo $exception->getCode() . ':' . $exception->getMessage();
            return false;
        }

        return true;
    }
}