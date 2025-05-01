<?php

namespace App\Modules\Tickets\Models;

use App\Models\User;
use App\Modules\Messages\Models\Message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
        'priority',
        'assigned_to',
    ];

    public static function rules($productId = null)
    {
        return [
            'name' => 'required|string|max:191|unique:products,name,' . $productId,
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ];
    }
    // A ticket is created by a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A ticket may be assigned to an admin
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    // A ticket has many messages
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
