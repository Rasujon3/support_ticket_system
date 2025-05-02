<?php

namespace App\Modules\Messages\Controllers;

use App\Modules\Attachments\Models\Attachment;
use App\Modules\Messages\Models\Message;
use App\Modules\Messages\Queries\MessageDatatable;
use App\Modules\Messages\Repositories\MessageRepository;
use App\Modules\Tickets\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AppBaseController;

class MessageController extends AppBaseController
{
    protected $productRepository;
    protected $productDatatable;

    // Inject the repository using the constructor
    public function __construct(MessageRepository $productRepo, MessageDatatable $productDatatable)
    {
        $this->productRepository = $productRepo;
        $this->productDatatable = $productDatatable;
    }

    /**
     * Store a new ticket reply.
     */
    public function store(Request $request, Ticket $ticket)
    {
        $request->validate([
            'message'     => 'required|string',
            'attachments.*' => 'nullable|file|max:5120', // max 5MB each
        ]);

        // Check permission (creator or assigned admin)
        $user = Auth::user();
        if ($user->id !== $ticket->user_id && $user->id !== $ticket->assigned_to && !$user->isAdmin()) {
            abort(403, 'Unauthorized');
        }

        // Save message
        $message = Message::create([
            'ticket_id' => $ticket->id,
            'user_id'   => $user->id,
            'message'   => $request->message,
        ]);

        // Handle attachments
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $originalName = $file->getClientOriginalName();
                $filePath = $this->storeFile($file);

                Attachment::create([
                    'message_id'    => $message->id,
                    'file_path'     => $filePath,
                    'original_name' => $originalName,
                ]);
            }
        }

        return redirect()->route('tickets.show', $ticket->id)->with('success', 'Reply added successfully.');
    }
    private function storeFile($file)
    {
        // Define the directory path
        $filePath = 'files/images/messages';
        $directory = public_path($filePath);

        // Ensure the directory exists
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        // Generate a unique file name
        $fileName = uniqid('messages_', true) . '.' . $file->getClientOriginalExtension();

        // Move the file to the destination directory
        $file->move($directory, $fileName);

        // path & file name in the database
        $path = $filePath . '/' . $fileName;
        return $path;
    }
}
