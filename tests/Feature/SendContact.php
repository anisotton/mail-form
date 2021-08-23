<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SendContact extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function send_contact()
    {
        $response = $this->get('/');

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/')
                    ->type('nome', 'Anderson Isotton')
                    ->type('email', 'anderson@isotton.com.br')
                    ->type('phone', '1234567890')
                    ->attach('document', __DIR__.'/photos/mountains.png')
                    ->assertSee('E-mail enviado com sucesso.');
        });
    }
}
