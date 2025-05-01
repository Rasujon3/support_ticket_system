<?php

namespace App\Modules\Tickets\Requests;

use App\Modules\Product\Models\Product;
use App\Modules\Tickets\Models\Ticket;
use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // You can add any authorization logic here
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $productId = $this->route('product') ? $this->route('product')->id : null;
        return Ticket::rules($productId);
    }
}
