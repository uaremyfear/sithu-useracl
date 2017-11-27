<?php

namespace Sithu\UserAcl;

use Illuminate\Support\Facades\Facade;

class UserAclFacade extends Facade
{
    protected static function getFacadeAccessor() { 
        return 'sithu-useracl';
    }
}
