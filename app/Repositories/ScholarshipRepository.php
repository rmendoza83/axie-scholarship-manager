<?php

namespace App\Repositories;

use App\Models\Scholarship;
use App\Repositories\ScholarshipRepositoryInterface;

class ScholarshipRepository extends BaseRepository implements ScholarshipRepositoryInterface
{
   /**
    * ScholarshipRepository constructor.
    *
    * @param Scholarship $model
    */
   public function __construct(Scholarship $model)
   {
       parent::__construct($model);
   }
}
