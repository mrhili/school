<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transporting extends Model
{
    //


    public $fillable = [
      'num_immatriculation',
      'imm_anterieure',
      'er_mc',
      'er_mc_country',
      'mutation',
      'usage',
      'proprietaire',
      'adresse',
      'fin_validite',
      'marque',
      'type',
      'genre',
      'modele',
      'num_chassis',
      'n_cylindres',
      'puissance_fiscal',
      'nombre_place',
      'poids_total_ac',
      'poids_a_vide',
      'poids_tmc',
    ];


}
