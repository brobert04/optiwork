<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OpenAI\Laravel\Facades\OpenAI;

class ChatBot extends Model
{
    use HasFactory;

    private $intrebari = [
        'Creeaza eveniment',

        'Solicit Concediu',
        'Vreau concediu',
        'Am nevoie de concediu',


        'Cine este seful meu?',
        'In ce departament sunt?',
        'Unde lucrez?',
        'Ce lucrez eu?',


        'Am vreun concediu planificat?',
        'Cand mai am liber?'
    ];

    private $raspunsuri = [

        ];

    public static function analizeaza(string $intrebare){
        if($intrebare === 'Creeaza eveniment'){
            return "Eveniment creat";
        }elseif($intrebare === 'Solicit Concediu' || $intrebare === 'Vreau concediu' || $intrebare === 'Am nevoie de concediu'){
            return route('employee.furlough.index');
        }elseif($intrebare === 'Cine este seful meu?'){
            return auth()->user()->employee->employer->user->name;
        }elseif($intrebare === 'Departamentul meu' || $intrebare === 'In ce departament sunt?' || $intrebare === 'Unde lucrez?' || $intrebare === 'Ce lucrez eu?'){
            return auth()->user()->employee->department;
        }
        elseif($intrebare === 'Am vreun concediu planificat?'){
            return  auth()->user()->employee->concedii()->exists() ? 'Da' : 'Nu';
        }
        else{
            $result = OpenAI::completions()->create([
                'model' => 'text-davinci-003',
                'prompt' => $intrebare,
            ]);
            return $result['choices'][0]['text'];
        }
    }
}
