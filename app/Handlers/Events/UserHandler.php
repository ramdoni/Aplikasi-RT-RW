<?php

namespace App\Handlers\Events;

class UserHandler
{

    /**
     * [onUserLogin description]
     * @param  [type] $event [description]
     * @return [type]        [description]
     */
    public function onUserLogin($event)
    {
        dd($event);
    }

    /**
     * [onUserLogout description]
     * @param  [type] $event [description]
     * @return [type]        [description]
     */
    public function onUserLogout($event)
    {
        dd($event);
        
    }
}
