<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
   public function payment(){
   	return $this->belongsTo(payment::class,'id','invoice_id');
   }
}
