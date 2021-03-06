<?php

namespace Elhebert\SubresourceIntegrity\Tests;

use Elhebert\SubresourceIntegrity\SriServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            SriServiceProvider::class,
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();

        config([
            'subresource-integrity.base_path' => './tests/',
        ]);
    }
}
