<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // Menampilkan daftar event
    public function index()
    {
        $events = Event::latest()->get();
        return view('events.index', compact('events'));
    }

    // Menampilkan form create event
    public function create()
    {
        return view('events.create');
    }

    // Menyimpan data event baru
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'EventName' => 'required|max:255',
            'Category' => 'nullable|max:255',
            'Description' => 'required',
            'Date' => 'required|date',
            'PIC' => 'required|max:255',
            'CollaboratorName' => 'nullable|max:255',
            'CollaboratorContact' => 'nullable|max:255'
        ]);

        // Menyimpan data ke database
        Event::create([
            'EventName' => $request->input('EventName'),
            'Category' => $request->input('Category'),
            'Description' => $request->input('Description'),
            'Date' => $request->input('Date'),
            'PIC' => $request->input('PIC'),
            'CollaboratorName' => $request->input('CollaboratorName'),
            'CollaboratorContact' => $request->input('CollaboratorContact')
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('events.index')->with('message', 'Event berhasil ditambahkan!');
    }

    // Menampilkan detail event untuk user
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    // Menampilkan form edit event
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    // Memperbarui data event yang sudah ada
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        // Validasi data yang masuk
        $request->validate([
            'EventName' => 'required|max:255',
            'Category' => 'nullable|max:255',
            'Description' => 'required',
            'Date' => 'required|date',
            'PIC' => 'required|max:255',
            'CollaboratorName' => 'nullable|max:255',
            'CollaboratorContact' => 'nullable|max:255'
        ]);

        // Update data event di database
        $event->update([
            'EventName' => $request->input('EventName'),
            'Category' => $request->input('Category'),
            'Description' => $request->input('Description'),
            'Date' => $request->input('Date'),
            'PIC' => $request->input('PIC'),
            'CollaboratorName' => $request->input('CollaboratorName'),
            'CollaboratorContact' => $request->input('CollaboratorContact')
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('events.index')->with('message', 'Event berhasil diperbarui!');
    }

    // Menghapus event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('events.index')->with('message', 'Event berhasil dihapus!');
    }
}
