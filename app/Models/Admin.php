<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'nom', 'email', 'password',
    ];

    // Relations si nécessaire
}
?>
