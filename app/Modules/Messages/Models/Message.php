<?php

namespace App\Modules\Messages\Models;

use App\Models\User;
use App\Modules\Attachments\Models\Attachment;
use App\Modules\Tickets\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = [
        'ticket_id',
        'user_id',
        'message',
    ];

    public static function rules($productId = null)
    {
        return [
            'name' => 'required|string|max:191|unique:products,name,' . $productId,
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ];
    }
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }
}
