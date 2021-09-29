<?php

namespace App\Repositories;

use App\Models\Slp;
use App\Repositories\SlpRepositoryInterface;

class SlpRepository extends BaseRepository implements SlpRepositoryInterface
{
   /**
    * SlpRepository constructor.
    *
    * @param Slp $model
    */
   public function __construct(Slp $model)
   {
       parent::__construct($model);
   }
}
