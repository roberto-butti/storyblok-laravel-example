<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;

 
class Storyblok extends Controller
{
    /**
     * Provision a new web server.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke($catchall)
    {
        return "SLUG: " . $catchall;
    }
}