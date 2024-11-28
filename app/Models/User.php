<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
    public $table = "users";
    public $primaryKey = 'id';
}