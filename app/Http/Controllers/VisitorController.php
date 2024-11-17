<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;


class VisitorController extends Controller
{
  public function index()
  {
      $totalVisitors = Visitor::distinct('ip_address')->count('ip_address');

      return view('visitors.index', compact('totalVisitors'));
  }
}
