<?php

namespace App\Repositories;

use App\Models\Payment;
use App\Repositories\PaymentRepositoryInterface;

class PaymentRepository extends BaseRepository implements PaymentRepositoryInterface
{
   /**
    * PaymentRepository constructor.
    *
    * @param Payment $model
    */
   public function __construct(Payment $model)
   {
       parent::__construct($model);
   }
}
