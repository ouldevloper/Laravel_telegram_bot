<?php


namespace App\Traits;

trait HttpRequest
{
    /**
     * @param string $sURL
     * @param array $aPostFields
     * @param array $aHeaders
     * @return mixed
     */
    public final function request(string $sURL, array $aPostFields = [], array $aHeaders = [])
    {
        $oCurl = curl_init();

        $aCurlOpt = [
            CURLOPT_USERAGENT => "Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)",
            CURLOPT_ENCODING  => "gzip",
            CURLOPT_TIMEOUT   => 60,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_HEADER     => 0,
            CURLOPT_HTTPHEADER => $aHeaders,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL            => $sURL,
        ];

        if (!is_null($aPostFields)) {
            $aCurlOpt[CURLOPT_POST] = 1;

            if (is_array($aPostFields)) {
                $aPostFields = http_build_query($aPostFields);
            }

            $aCurlOpt[CURLOPT_POSTFIELDS] = $aPostFields;
        }

        curl_setopt_array($oCurl, $aCurlOpt);
        $aResult = curl_exec($oCurl);

        if ($aResult == false) {
            $aResult = curl_error($oCurl);
        }

        curl_close($oCurl);
        return json_decode($aResult, true);
    }

}
