<?php
/**
 * Created by PhpStorm.
 * User: DHC
 * Date: 2015/11/4
 * Time: 11:39
 */

namespace HongcaiDeng\SSO_Client\Facades;

use Illuminate\Support\Facades\Facade;

class SSOClient extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sso-client';
    }
}