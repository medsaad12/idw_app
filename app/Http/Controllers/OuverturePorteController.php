<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Datetime;


class OuverturePorteController extends Controller
{
  public function get(Request $request){
    $today = new DateTime();
    $weekStart = $today->modify('this week')->modify('Monday');
    for ($i = 0; $i <= 4; $i++) {
      $days[] = $weekStart->format('d-F-y');
      $weekStart->modify('+1 day');
    }

    print_r($days);
  }
}
