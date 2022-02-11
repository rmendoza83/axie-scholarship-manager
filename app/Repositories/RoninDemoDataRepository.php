<?php

namespace App\Repositories;

use App\Models\RoninDemoData;
use App\Repositories\BaseRepository;
use App\Repositories\RoninDemoDataRepositoryInterface;

class RoninDemoDataRepository extends BaseRepository implements RoninDemoDataRepositoryInterface
{
   /**
    * RankRepository constructor.
    *
    * @param RoninDemoData $model
    */
   public function __construct(RoninDemoData $model)
   {
       parent::__construct($model);
   }
}
