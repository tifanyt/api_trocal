<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Objects extends Model
{

	protected $primaryKey = 'id';
  protected $guarded = ['id'];

  public function __construct() {
	  // Assignation de la table cible
	  $this->table = 'objects';

	  // Définir sur quelle base de données nous travaillons
	  $this->connection = session()->get('database_name');
  }
}
