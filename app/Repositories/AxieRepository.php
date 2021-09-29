<?php

namespace App\Repositories;

use App\Models\Axie;
use App\Repositories\BaseRepository;
use App\Repositories\AxieRepositoryInterface;

class AxieRepository extends BaseRepository implements AxieRepositoryInterface
{
   /**
    * AxieRepository constructor.
    *
    * @param Axie $model
    */
   public function __construct(Axie $model)
   {
       parent::__construct($model);
   }
}
