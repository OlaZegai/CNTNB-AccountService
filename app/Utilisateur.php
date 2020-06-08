<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Utilisateur extends Model
{
    use SoftDeletes;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'IDUtilisateur';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Nom', 'Prenom', 'NomCompagnie','DateInscription', 'IDAdresse', 'NumeroTelephone', 'Courriel', 'Photo', 'Password', 'ZoneService', 'Status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['Password', 'Remember_token'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'DateInscription' => 'datetime'
    ];

    public function roles(){
         return $this->belongsToMany(Role::class, 'utilisateur_roles');
    }
}
