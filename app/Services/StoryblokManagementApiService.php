<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;



class StoryblokManagementApiService
{
    public $endpoint = "";
    private $token = "";
    private $space = "";

    public function __construct($space = "", $token = "")
    {
        $this->token = ($token === "") ? env("STORYBLOK_MANAGEMENT_ACCESS_TOKEN") : $token;
        $this->space = ($space === "") ? env("STORYBLOK_SPACE") : $space;

        $baseUrl = "https://mapi.storyblok.com";
        $basePath = "/v1/spaces/" . $this->space . "/";
        $apiPath = "";

        $this->endpoint = implode("", [
            $baseUrl,
            $basePath,
            $apiPath,
        ]);
    }

    public function getComponents()
    {
        $seconds = 0;

        $params = [];
        $endpoint = $this->endpoint . "components/";
        //dd($endpoint);
        try {
            $responseBody = cache()->remember('api-sb-manag-components', $seconds, function () use ($endpoint, $params) {
                return Http
                    /*::withOptions([
                        'debug' => true,
                    ])*/
                    ::contentType("application/json")
                    ->withToken($this->token, "")
                    ->get($endpoint, $params)->body();
            });
        } catch (\Exception $e) {
            dd($e->getMessage());
            return null;
        }

        $responseObject = json_decode($responseBody, false);

        return $responseObject;
    }
}
