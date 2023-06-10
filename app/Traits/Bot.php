<?php


namespace App\Traits;


trait Bot
{
    use HttpRequest;
    private string $apiUrl = "https://api.telegram.org/bot%s/%s";
    public function __construct(

    )
    {}

    private function api(...$params)
    {
        $aResult = $this->request($this->apiUrl, $params, []);
        var_dump($aResult);
    }

    public final function send()
    {
        $sMethod = "send";

    }

    public final function reply()
    {

    }
}
