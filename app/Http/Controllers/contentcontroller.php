<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\StatusEnum;
use App\Models\Content;
use Illuminate\Validation\Rule;
use App\Enums\PlatformEnum;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $contents = Content::latest()->get();
            // Hitung jumlah konten berdasarkan status
        $statusCounts = [
            StatusEnum::DRAFT->value => $contents->where('Status', StatusEnum::DRAFT)->count(),
            StatusEnum::PUBLISHED->value => $contents->where('Status', StatusEnum::PUBLISHED)->count(),
            StatusEnum::ARCHIVED->value => $contents->where('Status', StatusEnum::ARCHIVED)->count(),
        ];

        return view('contents.index', compact('contents', 'statusCounts'));
    }

    public function create(){
        return view('contents.create');
    }

    public function store(Request $request){
        $request->validate([
            'EventName' => 'required|max:255',
            'Description' => 'required',
            'PIC' => 'required|max:255',
            'Deadline' => 'required|date',
            'Platform' => ['required', 'in:' . implode(',', PlatformEnum::values())],
            'Status' => ['required', Rule::in(StatusEnum::values())], // Jika status juga enum
        ]);

        Content::create($request->all());
        return redirect()->route('contents.index')->with('message', 'Konten berhasil ditambahkan!');
    }

    public function show(Content $content)
    {
        // Menampilkan detail content untuk user
        return view('contents.show', compact('content'));
    }

    public function edit($id){
        $content = Content::findOrFail($id);
        return view('contents.edit', compact('content'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'EventName' => 'required|max:255',
            'Description' => 'required',
            'PIC' => 'required|max:255',
            'Deadline' => 'required|date',
            'Platform' => ['required', 'in:' . implode(',', PlatformEnum::values())],
            'Status' => ['required', Rule::in(StatusEnum::values())], // Jika status juga enum
        ]);
    
        $content = Content::findOrFail($id);
        $content->update($request->all());
        return redirect()->route('contents.index')->with('message', 'Konten berhasil diperbarui!');
    }

    public function destroy($id){
        $content = Content::findOrFail($id);
        $content->delete();
        return redirect()->route('contents.index')->with('message', 'Konten berhasil dihapus!');
    }
}
