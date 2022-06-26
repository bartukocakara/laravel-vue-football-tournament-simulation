<?php

namespace App\Http\Controllers\Api;

use App\Services\MatchService;

class MatchController extends Controller
{
    private $matchService;

    public function __construct(MatchService $matchService)
    {
        $this->matchService = $matchService;
    }

    /**
     * @return void
     */
    public function index()
    {
        return $this->matchService->playAll();
    }
}
