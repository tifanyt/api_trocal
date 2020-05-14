<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ObjectsTest extends DuskTestCase
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
     * @test List of objects.
     *
     * @return void
     */
    public function list_objects()
    {
      $this->browse(function (Browser $browser) {
        $browser->visit('/objects')
                ->assertSee('Liste des objets');
      });
    }

    /**
     * @test Add an object form.
     *
     * @return void
     */
    public function add_object_form()
    {
      $this->browse(function (Browser $browser) {
        $browser->visit('/objects/add')
                ->assertSee('Ajouter un objet')
                ->assertVisible('label[for=user_id]')
                ->assertVisible('label[for=description]')
                ->assertVisible('label[for=key_words]')
                ->assertVisible('label[for=category]')
                ->assertVisible('label[for=photo]');
      });
    }

    /**
     * @test Edit an object form.
     *
     * @return void
     */
    public function edit_object_form()
    {
      $this->browse(function (Browser $browser) {
        $browser->visit('/objects/2/edit')
                ->assertSee('Éditer un objet')
                ->assertVisible('label[for=user_id]')
                ->assertVisible('label[for=description]')
                ->assertVisible('label[for=key_words]')
                ->assertVisible('label[for=category]')
                ->assertVisible('label[for=state]')
                ->assertVisible('label[for=photo]');
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
        $browser->visit('/objects/2/delete')
                ->assertVisible('.alert-danger');
      });
    }
}
