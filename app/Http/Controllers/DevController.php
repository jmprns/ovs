<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DevController extends Controller
{
    public function __invoke()
    {
        Voter::factory(99)->create();
    }
}
