<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Storyblok extends Controller
{
    /**
     * Provision a new web server.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $catchall = "home")
    {
        $baseUrl = "https://api.storyblok.com";
        $basePath = "/v2/cdn/";
        $apiPath = "stories/";
        $endpoint = implode("", [
            $baseUrl,
            $basePath,
            $apiPath,
            $catchall,
        ]);
        $params = [
            "token" => env("STORYBLOK_ACCESS_TOKEN"),
        ];
        $seconds = 0;
        $responseBody = cache()->remember('users', $seconds, function () use ($endpoint, $params) {
            return Http::acceptJson()->contentType("application/json")->get($endpoint, $params)->body();
        });
        //$response = Http::acceptJson()->contentType("application/json")->get($endpoint, $params);
        $responseObject = json_decode($responseBody, false);
        if ($request->query('api', 0) == 1) {
            if ($request->query('onlycontent', 0) == 1) {
                return $responseObject->story->content;
            }

            return $responseObject;
        }
        $pageTemplate = $responseObject->story->content->component;
        $pathTemplate = 'components/content/' . $pageTemplate;

        try {
            return view($pathTemplate, ['story' => $responseObject->story]);
        } catch (\InvalidArgumentException $e) {
            return "View " . $pathTemplate . " not found. " . $e->getMessage();
        }
    }
}
