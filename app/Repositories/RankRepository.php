<?php

namespace App\Repositories;

use App\Models\Rank;
use App\Repositories\RankRepositoryInterface;

class RankRepository extends BaseRepository implements RankRepositoryInterface
{
   /**
    * RankRepository constructor.
    *
    * @param Rank $model
    */
   public function __construct(Rank $model)
   {
       parent::__construct($model);
   }
}
