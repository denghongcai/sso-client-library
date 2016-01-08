<?php
/**
 * Created by PhpStorm.
 * User: DHC
 * Date: 2015/11/4
 * Time: 11:23
 */

namespace HongcaiDeng\SSO_Client;

use HongcaiDeng\SSO_Client\Ticket;

class SSOClient
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function instance($type)
    {
        switch ($type)
        {
            case 'ticket':
                return new Ticket($this->config);
            case 'user':
                return new User($this->config);
            default:
                return false;
        }
    }
}