<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Purchase extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;

  protected $table = 'purchase';

    public static function getProductsFromPurchase($id){
        return DB::table('purchased_product')
        ->select('id_product', 'name', 'price', 'discount', 'quantity')
        ->where('id_purchase', $id)
        ->get();
    }

    public static function getProductsWaitingForConfirmation(){

      $purchases = Purchase::all();
      $logs = [];

      foreach($purchases as $purchase){
        $last_log = PurchaseLog::where('id_purchase', $purchase->id)->orderByRaw('date_time DESC')->first();

        if(strcmp($last_log->purchase_state, "Waiting for payment approval") == 0)
          array_push($logs, $last_log);
      }

      return $logs;
    }
}
