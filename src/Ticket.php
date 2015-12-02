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

class Ticket
{
    private $config = [];

    public function __construct($config)
    {
        $this->config = array_merge($this->config, $config);
    }

    /**
     * retrive user using ticket
     *
     * @param $token
     * @return object|null
     * @throws InvalidArgumentException if response is unexpected
     * @throws Requests_Exception
     */
    function retriveUser($ticket)
    {
        $headers = ['Accept' => 'application/json'];
        $options = ['timeout' => $this->config['timeout']];

        try {
            $request = Requests::get(str_replace(':ticket', $ticket, $this->config['retrive_user_url']), $headers, $options);
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
