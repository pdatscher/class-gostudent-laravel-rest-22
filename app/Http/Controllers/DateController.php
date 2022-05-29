<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AvailableDate;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class DateController extends Controller
{
    public function save (Request $request) : JsonResponse {

        try {
            $date = AvailableDate::create($request->all());
            return response()->json($date, 201);
        } catch (\Exception $e) {
            return response()->json("saving date failed: " . $e->getMessage(), 420);
        }
    }

    public function update (Request $request, $id) : JsonResponse {

        try {
            $date = AvailableDate::where('id', $id)->first();

            if ($date != null) {
                $date->update($request->all());
            }
            return response()->json($date, 201);
        } catch (\Exception $e) {
            return response()->json("updating date failed: " . $e->getMessage(), 420);
        }
    }

    public function delete ($id) : JsonResponse {
        $date = AvailableDate::where('id', $id)->first();
        if ($date != null) {
            $date->delete();
        }
        else {
            throw new \Exception("date with id = ' . $id . ' couldn't be deleted - it does not exist");
        }
        return response()->json('date with id = ' . $id . ' successfully deleted', 200);
    }
}
