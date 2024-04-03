<?php

namespace App\Http\Controllers;

use App\Http\Requests\CurrencyRequest;
use App\Http\Responses\HomeResponse;

class HomeController extends Controller
{
    /**
     * Display the index page.
     */
    public function index(CurrencyRequest $request): HomeResponse
    {
        return app(HomeResponse::class);
    }
}
