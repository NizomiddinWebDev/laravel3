<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AnswerController extends Controller
{
    public function create(Application $application){
        return view('answers.create',['application'=>$application]);
    }

    public function store(Application $application,Request $request){
    $page = $request->page;
        // Bot tokeni
    $botToken = '2144744724:AAEh4B44VUB6hpCMRrxwAYs2G-H-0xQdXzY';

    // Telegram Bot API manzili
    $apiUrl = 'https://api.telegram.org/bot' . $botToken . '/sendMessage';
    $apiUrl2 = 'https://api.telegram.org/bot' . $botToken . '/sendPhoto';

    // Foydalanuvchiga yuboriladigan habar ma'lumotlari
    $chatId = $application->user->profile->tg_id; // Foydalanuvchi IDsi
    $message = 'Assalomu alaykum, bu test xabar.';

    // So'rovni yuborish uchun ma'lumotlar tayyorlash
    $data = [
    'chat_id' => $chatId,
    'text' => "<b>#Javob</b>\n$request->answer",
    'parse_mode' => 'HTML'
    ];
        $answer = Answer::create([
            'application_id'=>$application->id,
            'body'=>$request->answer
        ]);
        if($answer){
            $req = Http::post($apiUrl,$data);
        }
        if ($req->status()==200) {
            $message = "Savol ID:#$application->id Javob Bot orqali yuborildi!";
            return redirect()->to("http://127.0.0.1:8000/dashboard?page=$page")->with('message_tg_success',$message);
        }else{
            $message = "Savol ID:#$application->id Javob Bot yuborib bo'lmadi!";
            return redirect()->to("http://127.0.0.1:8000/dashboard?page=$page")->with('message_tg_error',$message);
        }

    }
}
