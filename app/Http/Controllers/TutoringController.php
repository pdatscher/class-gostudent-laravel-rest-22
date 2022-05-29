<?php

namespace App\Http\Controllers;

use App\Models\AvailableDate;
use App\Models\Image;
use App\Models\User;
use App\Models\TutoringOffer;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Types\Integer;

class TutoringController extends Controller
{
    public function index() {
        $tutoringOffers = TutoringOffer::with(['user', 'dates'])->get();
        return $tutoringOffers;

        // AUSGABE INDEX - TUTORING OFFERS LISTE
        //$tutoringOffers = DB::table('tutoring_offers')->get();
        //return view('index',compact('tutoringOffers'));
    }

    public function findByID($id) : TutoringOffer {

        $tutoringOffer = TutoringOffer::where('id', $id)
            ->with(['user', 'dates'])
            ->first();
        return $tutoringOffer;
    }

    public function checkID ($id) {
        $tutoringOffer =  TutoringOffer::where('id', $id)->first();
        return $tutoringOffer != null ?
            response()->json(true, 200) :
            response()->json(false, 200);
    }

    public function show($id){
        $tutoringOffer = DB::table('tutoring_offers')->find($id);
        //dd($tutoringOffer);
        return view('show',compact('tutoringOffer'));
    }

    public function findBySubject(string $subject) {
        $tutoringOffer = TutoringOffer::with(['user', 'dates'])
            ->where('subject', 'LIKE', '%' . $subject. '%')
            ->get();
        return $tutoringOffer;
    }


    /**
     * create new book
     */

    public function save(Request $request) : JsonResponse {

        //$request = $this->parseRequest($request);

        DB::beginTransaction();
        try {
            $newTutoringOffer = new TutoringOffer;//::create($request->all());
            $newTutoringOffer->headline = $request->headline;
            $newTutoringOffer->subject = $request->subject;
            $newTutoringOffer->description = $request->description;
            $newTutoringOffer->user_id = $request->user_id;
            $newTutoringOffer->save();

            // save available dates
            if (isset($request['dates']) && is_array($request['dates'])) {
                foreach ($request['dates'] as $date) {
                    $date = AvailableDate::firstOrNew([
                        'day' => $date['day'],
                        'time' => $date['time']
                    ]);
                    $newTutoringOffer->dates()->save($date);
                }
            }

            // save user
            if (isset($request['users']) && is_array($request['users'])) {
                foreach ($request['users'] as $user) {
                    $user = User::firstOrNew([
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'password' => $user['password'],
                        'isTutor' => $user['isTutor'],
                    ]);
                    $newTutoringOffer->user()->save($user);
                }
            }


            DB::commit();
            return response()->json($newTutoringOffer, 201);

        }
        catch (\Exception $e) {
            DB::rollBack();
            return response()->json("Speichern des neuen Nachhilfeangebotes fehlgeschlagen:" . $e->getMessage(), 420);
        }

    }


    private function parseRequest(Request $request) : Request {

        $date = new \DateTime($request->published);
        $request['published'] = $date;
        return $request;


    }

}

