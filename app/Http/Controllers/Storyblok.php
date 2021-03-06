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
        $catchAlls= explode('/', $catchall);
        $slug=end($catchAlls);
        $endpoint = implode("", [
            $baseUrl,
            $basePath,
            $apiPath,
            $slug,
        ]);
        $params = [
            "token" => env("STORYBLOK_PREVIEW_ACCESS_TOKEN"),
            "version" => "draft",
        ];
        $response = Http::acceptJson()->contentType("application/json")->get($endpoint, $params);
        if ($response->status() === 404) {
            return view("components/content/error/notfound", ['error' => "Are you sure that a page with slug: '" . $slug .  "' exists on Storyblok?"]);
        }
        $responseBody = $response->body();
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
        } catch (\Exception $e) {
            return "View " . $pathTemplate . " not found. " . $e->getMessage();
        }
    }
}
