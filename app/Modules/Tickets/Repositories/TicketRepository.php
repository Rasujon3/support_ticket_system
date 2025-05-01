<?php

namespace App\Modules\Tickets\Repositories;

use App\Modules\Tickets\Models\Ticket;
use Illuminate\Support\Facades\Log;

class TicketRepository
{
    public function all()
    {
        return Ticket::all();
    }

    public function store(array $data): ?Ticket
    {
        try {
            // Create the record in the database
            $ticket = Ticket::create($data);

            return $ticket;
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error in storing data: ' , [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            return null;
        }
    }

    public function update(Ticket $ticket, array $data): ?Ticket
    {
        try {
            // Perform the update
            $ticket->update($data);

            return $ticket;
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error updating data: ' , [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            return null;
        }
    }

    public function delete(Ticket $ticket)
    {
        try {
            $ticket->delete();
            return true;
        } catch (\Exception $e) {
            // Log error
            Log::error('Error deleting data: ' , [
                'country_id' => $ticket->id,
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            return false;
        }
    }

    public function find($id)
    {
        return Ticket::findOrFail($id);
    }
}
