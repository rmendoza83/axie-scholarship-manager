<?php

namespace App\Repositories;

use App\Models\Team;
use App\Repositories\TeamRepositoryInterface;

class TeamRepository extends BaseRepository implements TeamRepositoryInterface
{
   /**
    * TeamRepository constructor.
    *
    * @param Team $model
    */
   public function __construct(Team $model)
   {
       parent::__construct($model);
   }
}
