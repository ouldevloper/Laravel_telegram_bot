<?php


namespace App\Traits;


use http\Env;

class Bot
{
    use HttpRequest;
    private string $sUrlFormat = "https://api.telegram.org/bot%s/%s";
    public function __construct(){}

    private function api(string $method, mixed $data,array $params=null)
    {
        $url = sprintf($this->sUrlFormat, env('TELEGRAM_BOT_TOKEN'), $method);
        $params = !is_null($params) ? $params : [
            'chat_id' => env('TELEGRAM_BOT_ID'),
            'text'    => '<h1>Hello world</h1>',
            'parse_mode' => 'html'
        ];
        $aResult = $this->request($this->apiUrl, $params, []);
        var_dump($aResult);
    }

    public final function sendMessage()
    {
        $this->api('sendMessage');

    }

    public final function reply()
    {

    }
}
