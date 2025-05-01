<?php

namespace App\Modules\Tickets\Controllers;

use App\Modules\Product\Models\Product;
use App\Modules\Product\Queries\ProductDatatable;
use App\Modules\Product\Repositories\ProductRepository;
use App\Modules\Product\Requests\ProductRequest;
use App\Modules\Tickets\Models\Ticket;
use App\Modules\Tickets\Queries\TicketDatatable;
use App\Modules\Tickets\Repositories\TicketRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;

class TicketController extends AppBaseController
{
    protected $productRepository;
    protected $productDatatable;

    // Inject the repository using the constructor
    public function __construct(TicketRepository $productRepo, TicketDatatable $productDatatable)
    {
        $this->productRepository = $productRepo;
        $this->productDatatable = $productDatatable;
    }
    /**
     * Display a list of tickets.
     * - User sees their own tickets.
     * - Admin sees all tickets.
     */
    public function index()
    {
        $user = Auth::user();

        $tickets = $user->isAdmin()
            ? Ticket::latest()->paginate(10)
            : $user->tickets()?->latest()?->paginate(10);

        return view('Tickets::index', compact('tickets'));
    }

    /**
     * Show the ticket creation form.
     */
    public function create()
    {
        return view('Tickets::create');
    }

    /**
     * Store a new ticket.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'priority'    => 'required|in:low,medium,high',
        ]);

        Ticket::create([
            'user_id'     => Auth::id(),
            'title'       => $request->title,
            'description' => $request->description,
            'priority'    => $request->priority,
            'status'      => 'open',
        ]);

        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully.');
    }
    /**
     * Show a single ticket with its messages (conversation).
     */
    public function show(Ticket $ticket)
    {
        $this->authorizeTicketAccess($ticket);

        $messages = $ticket->messages()->with('user')->get();

        return view('Tickets::show', compact('ticket', 'messages'));
    }
    /**
     * Assign ticket to an admin (Admin only).
     */
    public function assign(Request $request, Ticket $ticket)
    {
        $request->validate([
            'admin_id' => 'required|exists:users,id',
        ]);

        $ticket->update(['assigned_to' => $request->admin_id]);

        return back()->with('success', 'Ticket assigned successfully.');
    }

    /**
     * Update ticket status (Admin only).
     */
    public function updateStatus(Request $request, Ticket $ticket)
    {
        $request->validate([
            'status' => 'required|in:open,in_progress,resolved,closed',
        ]);

        $ticket->update(['status' => $request->status]);

        return back()->with('success', 'Ticket status updated.');
    }

    /**
     * Authorize access for ticket viewing.
     */
    private function authorizeTicketAccess(Ticket $ticket)
    {
        $user = Auth::user();

        if ($user->isAdmin() || $ticket->user_id === $user->id || $ticket->assigned_to === $user->id) {
            return true;
        }

        abort(403, 'Unauthorized');
    }
}
