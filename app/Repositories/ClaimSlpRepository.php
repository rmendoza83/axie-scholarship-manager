<?php

namespace App\Repositories;

use App\Models\ClaimSlp;
use App\Repositories\ClaimSlpRepositoryInterface;

class ClaimSlpRepository extends BaseRepository implements ClaimSlpRepositoryInterface
{
   /**
    * ClaimSlpRepository constructor.
    *
    * @param ClaimSlp $model
    */
   public function __construct(ClaimSlp $model)
   {
       parent::__construct($model);
   }
}
