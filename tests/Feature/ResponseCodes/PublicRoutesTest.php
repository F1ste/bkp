<?php

namespace Tests\Feature\ResponseCodes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PublicRoutesTest extends TestCase
{
    /**
     * @testWith ["/"]
     *           ["/about"]
     *           ["/authorization"]
     *           ["/contacts"]
     *           ["/faq"]
     *           ["/login"]
     *           ["/mail_send"]
     *           ["/partners"]
     *           ["/policy"]
     *           ["/privacy"]
     *           ["/projects"]
     *           ["/quick-search"]
     *           ["/register"]
     *           ["/rol"]
     *           ["/search"]
     */
    public function testPublicRoutesResponseOk(string $url)
    {
        $this->get($url)->assertOk();
    }

    /**
     * @testWith ["/this-page-does-not-exist"]
     *           ["/storage/not-existed-image-file.jpeg"]
     */
    public function testPage404(string $url)
    {
        $this->get($url)->assertNotFound();
    }
}
