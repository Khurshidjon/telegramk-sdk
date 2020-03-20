<?php

namespace App\Http\Controllers;

use App\Setting;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SdkController extends Controller
{

    public function setWebhook(Request $request)
    {
        $result = $this->sendDataToTelegram('setwebhook', [
            'query' => [
                'url' => $request->url() .'/'.\Telegram::getAccessToken()
            ]
        ]);
        return $result;
    }

    public function getWeehbhook(Request $request)
    {
        $result = $this->sendDataToTelegram('getWebhookInfo');
        return $result;
    }

    public function sendDataToTelegram($route = '', $params = '', $method = 'POST')
    {
        $client = new Client([
            'base_url' => 'https://api.telegram.org' . \Telegram::getAccessToken() . '/'
        ]);
        $result = $client->request($method, $route, $params);
        return (string)$result->getBody();
    }

    public function store(Request $request)
    {
        Setting::where('key', '!=', NULL)->delete();
        foreach ($request->expect('_token') as $key => $value)
        {
            $setting = new Setting();
            $setting->key = $key;
            $setting->value = $request->key;
            $setting->save();

        }
    }
}
