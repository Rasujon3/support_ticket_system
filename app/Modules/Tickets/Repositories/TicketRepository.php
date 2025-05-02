<?php

namespace App\Modules\Tickets\Repositories;

use App\Models\User;
use App\Modules\Tickets\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TicketRepository
{
    public function getTicketData()
    {
        $user = Auth::user();
        return $user->isAdmin()
            ? Ticket::latest()->paginate(10)
            : $user->tickets()->latest()->paginate(10);
    }

    public function store(array $data): ?Ticket
    {
        try {
            $data['user_id'] = Auth::id();
            $data['status'] = 'open';

            // Create the record in the database
            $store = Ticket::create($data);

            return $store;
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
    public function getMessageData($ticket)
    {
        return $ticket->messages()->with('user')->get();
    }

    public function assignUpdate(Ticket $ticket, array $data): ?Ticket
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
    public function updateStatus(Ticket $ticket, array $data): ?Ticket
    {
        try {
            // Perform the update
            $ticket->update($data);

            return $ticket;
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error status updating data: ' , [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            return null;
        }
    }
    public function getAdminsData()
    {
        return User::where('role', 'admin')->get();
    }
    public function getUserData()
    {
        return Auth::user();
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
