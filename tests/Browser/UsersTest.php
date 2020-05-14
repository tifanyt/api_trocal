<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UsersTest extends DuskTestCase
{
    /**
     * @test Log in.
     *
     * @return void
     */
    public function log_in()
    {
      $this->browse(function (Browser $browser) {
        $browser->visit('/login')
                ->type('email', 'madeleine.yu@gmail.com')
                ->type('password', 'talos1')
                ->click('.btn-primary');
      });
    }

    /**
     * @test List of transactions.
     *
     * @return void
     */
    public function list_users()
    {
      $this->browse(function (Browser $browser) {
        $browser->visit('/users')
                ->assertSee('Liste des utilisateurs');
      });
    }

    /**
     * @test Add a user form.
     *
     * @return void
     */
    public function add_user_form()
    {
      $this->browse(function (Browser $browser) {
        $browser->visit('/users/add')
                ->assertSee('Ajouter un user')
                ->assertVisible('label[for=firstname]')
                ->assertVisible('label[for=lastname]')
                ->assertVisible('label[for=email]')
                ->assertVisible('label[for=password]')
                ->assertVisible('label[for=post_code]')
                ->assertVisible('label[for=bio]')
                ->assertVisible('label[for=avatar]')
                ->assertVisible('label[for=phone]');
      });
    }

    /**
     * @test Edit a user form.
     *
     * @return void
     */
    public function edit_user_form()
    {
      $this->browse(function (Browser $browser) {
        $browser->visit('/users/1/edit')
                ->assertSee('Éditer les informations de Madeleine Yu')
                ->assertVisible('label[for=firstname]')
                ->assertVisible('label[for=lastname]')
                ->assertVisible('label[for=email]')
                ->assertVisible('label[for=bio]')
                ->assertVisible('label[for=post_code]')
                ->assertVisible('label[for=avatar]')
                ->assertVisible('label[for=phone]');
      });
    }

    /**
     * @test Delete validation.
     *
     * @return void
     */
    public function show_delete_message()
    {
      $this->browse(function (Browser $browser) {
        $browser->visit('/users/1/delete')
                ->assertVisible('.alert-danger');
      });
    }
}
