<?php

namespace App\Http\Controllers\Api\v2;
use App\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v2\PersonResource;

class PersonController extends Controller
{
    public function show(Person $person):PersonResource
    {
      return new PersonResource($person);
    }
}
