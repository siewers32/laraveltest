<?php


namespace App\Http\Lib;
class Abilities
{
    public function getAbilities($role) {
        $abilities =  [
          'admin' => ['edit-any', 'create', 'destroy-any', 'edit-user'],
          'user' => ['edit-own', 'create'],
          'editor'  => ['edit-any']
        ];
        if(in_array($role, array_keys($abilities))) {
            return $abilities[$role];
        } else {
            return array();
        }
    }
}
