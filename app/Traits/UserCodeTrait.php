<?php

namespace App\Traits;

use App\User;
use Keygen\Keygen;

/**
 * generates a user code
 */
trait UserCodeTrait
{
    public function generateUserCode($prefix) {
        $keygen = Keygen::length(8)->mutable('length', 'prefix');
        $usercode = $keygen->numeric()->prefix($prefix, false)->generate();
        return $usercode;
    }

    public function createUniqueUserCode($prefix) {
        $code = "";
        for($i=0; $i <= User::all()->count(); $i++) {
            $code = $this->generateUserCode($prefix);
            $check_if_exist = User::where('user_code', $code)->count();
            if ($check_if_exist === 0) {
                break;
            }
        }

        return $code;
        
    }
}
