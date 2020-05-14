<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * @test Check login form.
     *
     * @return void
     */
    public function show_login_form_if_not_logged()
    {
      $this->browse(function (Browser $browser) {
        $browser->visit('/')
                ->assertVisible('label[for=email]')
                ->assertVisible('label[for=password]');
      });
    }
}
