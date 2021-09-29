<?php

namespace App\Repositories;

use App\Models\Profile;
use App\Repositories\ProfileRepositoryInterface;

class ProfileRepository extends BaseRepository implements ProfileRepositoryInterface
{
   /**
    * ProfileRepository constructor.
    *
    * @param Profile $model
    */
   public function __construct(Profile $model)
   {
       parent::__construct($model);
   }
}
