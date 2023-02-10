<?php

namespace App\Http\Controllers;

use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        // TASK: load the relationship average of team size
        $countries = Country::all()
            ->map(function ($country) {
                $country->teams_avg_size = $country->teams()->average('size');

                return $country;
            });

        return view('countries.index', compact('countries'));
    }
}
