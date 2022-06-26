<?php

namespace App\Services;

use App\Repositories\Interfaces\IGroupRepositoryInterface;
use App\Http\Resources\Group\GroupResource;

/**
 * Class groupService
 * @package App\Services
 */
class GroupService
{
    /**
     * @var IGroupRepositoryInterface
     */
    private $groupRepository;

    /**
     * @param IGroupRepositoryInterface $groupRepository
     */
    public function __construct(IGroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     *
     * @return mixed
     */
    public function getAll()
    {
        $groups = $this->groupRepository->getAll();
        return $this->getGroupedResource($groups);
    }

    /**
     * @param $groups
     * @return mixed
     */
    public function getGroupedResource($groups)
    {
        $groups = groupResource::collection($groups);
        return $groups->groupBy('week');
    }

    /**
     * @param $clubs
     * @return mixed
     */
    public function generateGroups($clubs)
    {
        $this->groupRepository->truncate();
        $group = collect();
        $weekCount = FormulaService::setTotalWeek($clubs);

        foreach (range(1, $weekCount) as $weekNumber) {
            $group = $group->merge($this->groupRepository->setWeekgroup($weekNumber, $clubs, $group));
        }

        $data = $this->groupRepository->setRevenge($group->toArray(), $weekCount);

        $this->groupRepository->insert($data);

        return $this->getGroupedResource($data);
    }

}
