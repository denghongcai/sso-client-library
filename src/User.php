<?php
/**
 * Created by PhpStorm.
 * User: DHC
 * Date: 2015/11/4
 * Time: 10:19
 */

namespace HongcaiDeng\SSO_Client;

use InvalidArgumentException;
use Requests;
use Requests_Exception;

class User
{
    private $config = [];

    public function __construct($config)
    {
        $this->config = array_merge($this->config, $config);
    }

    /**
     * update user info
     *
     * @param $ticket
     * @param $info
     * @return object|null
     * @throws InvalidArgumentException if response is unexpected
     * @throws Requests_Exception
     */
    function update($ticket, $info)
    {
        $headers = ['Content-Type' => 'application/json'];
        $options = ['timeout' => $this->config['timeout']];
        $info = (array)$info;
        $info['ticket'] = $ticket;

        try {
            $request = Requests::put($this->config['update_user_url'], $headers, json_encode($info), $options);
            $json = json_decode($request->body);
            if ($json === null) {
                throw new InvalidArgumentException(sprintf('unexpected data from server: %s', $request->body));
            }
            return $json;
        }
        catch (\Requests_Exception_HTTP_404 $err) {
            return null;
        }
    }
}