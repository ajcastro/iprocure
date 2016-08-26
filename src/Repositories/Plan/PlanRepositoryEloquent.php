<?php

namespace Iprocure\Repositories\Plan;

use SedpMis\BaseRepository\BaseRepositoryEloquent;
use SedpMis\BaseRepository\RepositoryInterface;
use Plan;

class PlanRepositoryEloquent extends BaseRepositoryEloquent implements RepositoryInterface, PlanRepositoryInterface
{
    public function __construct(Plan $model)
    {
        $this->model = $model;
    }
}
