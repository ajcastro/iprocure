<?php

namespace Iprocure\Api\Plan;

use Iprocure\Repositories\Plan\PlanRepositoryInterface;

class PlanController extends \SedpMis\BaseApi\BaseApiController
{
    public function __construct(PlanRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $res = parent::index();
        return \Response::make($res, 200, ['total' => 100]);
    }
}
