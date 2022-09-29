<?php


namespace App\Http\Lib;
class Abilities
{
    public function getAbilities($role) {
        $abilities =  [
          'admin' => ['edit-any', 'create', 'destroy-any', 'edit-user', 'hoppeldepee'],
          'user' => ['edit-own', 'create', 'hoppeldepee'],
          'editor'  => ['edit-any', 'hoppeldepee']
        ];
        if(in_array($role, array_keys($abilities))) {
            return $abilities[$role];
        } else {
            return array();
        }
    }
}
