<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Models\ChatBot;
use App\Models\ChatLog;
use App\Models\FurloughRequests;
use http\Env\Response;
use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotController extends Controller
{
    public function postRaspund(Request $request){
         $intrebare = $request->get('intrebare', false);
         $cu = $request->get('chatUUID', false);
        if(!$intrebare){
                $raspuns = "Missing question";
                return response()->json([
                    'raspuns' => $raspuns,
                    'moment' => now()
                ]);
        }
        if(!$cu){
            $raspuns = "Missing Chat UUID";
            return response()->json([
                'raspuns' => $raspuns,
                'moment' => now()
            ]);
        }
        $moment = $request->get('moment');
        $chatlog = ChatLog::where('chat_uuid', $cu)->first() ?: ChatLog::create([
            'chat_uuid' => $cu,
            'user_id' => auth()->user()->id,
            'continut' => [
                'intrebari' => [],
                'raspunsuri' => []
            ]
        ]);
        $raspuns = ChatBot::analizeaza($intrebare);

        $intrebari = $chatlog->continut['intrebari'];
        $raspunsuri = $chatlog->continut['raspunsuri'];

        $raspunsuri[$moment] = $raspuns;
        $intrebari[$moment] = $intrebare;

        $chatlog->update(
            [
                'continut' => [
                    'intrebari' => $intrebari,
                    'raspunsuri' =>$raspunsuri
                ]
            ]
        );

        return response()->json([
            'raspuns' => $raspuns,
            'moment' => now()
        ]);
    }
}


