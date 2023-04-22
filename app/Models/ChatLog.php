<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_uuid',
        'user_id',
        'continut'
    ];

  protected $casts = [
    'continut' => 'json'
  ];

  protected $table = 'chatlog';

  public function ultimaConversatie(){
      $raspunsuri =  $this->continut['raspunsuri'];
      ksort($raspunsuri);
      return end($raspunsuri);
  }
}
