<?php

namespace App\Http\Controllers\Traits;

use GuzzleHttp\Client;
use App\Exceptions\UnauthorizedException;
use GuzzleHttp\Exception\RequestException;
use Mockery\Exception;

trait ProxyHelpers
{
    public function authenticate()
    {
        $client = new Client();

        try {
            $url = request()->root() . '/api/oauth/token';

            $params = array_merge(config('passport.proxy'), [
                'username' => request('email'),
                'password' => request('password'),
            ]);
            $respond = $client->request('POST', $url, ['form_params' => $params]);
            dd($respond);

        } catch (RequestException $exception) {
            dd($exception->getMessage());
            throw new Exception($exception);
        }

        if ($respond->getStatusCode() !== 401) {
            return json_decode($respond->getBody()->getContents(), true);
        }

        throw new \Exception('账号或密码错误');
    }
}