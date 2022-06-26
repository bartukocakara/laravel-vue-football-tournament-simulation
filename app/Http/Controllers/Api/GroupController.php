<?php

namespace App\Http\Controllers\Api;

use App\Services\GroupService;

class GroupController extends Controller
{
    private $groupService;

    public function __construct(GroupService $groupService)
    {
        $this->groupService = $groupService;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->groupService->getAll();
    }
}
