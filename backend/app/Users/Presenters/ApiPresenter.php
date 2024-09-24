<?php
namespace App\Users\Presenters;

class ApiPresenter
{
    public function userDescription(): string {
        $descArr = [];
        $desc = ['php', 'js', 'golang', 'java'];
        $randKeys = (array) array_rand($desc, rand(1,4));

        foreach ($randKeys as $val) {
            $descArr[] = $desc[$val];
        }

        return trim(implode(', ', $descArr), '"');
    }

}
