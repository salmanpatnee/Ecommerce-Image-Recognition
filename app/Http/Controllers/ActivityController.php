<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActivityResource;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index() {
        return inertia('Activities/Index', [
            'activities' => ActivityResource::collection(Activity::paginate()),
        ]);
    }
}
