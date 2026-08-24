<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoardMember;
use Illuminate\Http\Request;

class BoardMemberController extends Controller
{
    public function index()
    {
        $boardMembers = BoardMember::orderBy('display_order')->orderBy('id')->get();
        return view('admin.board-members.index', compact('boardMembers'));
    }

    public function create()
    {
        return view('admin.board-members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'description' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'mobile' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bio' => 'nullable|string',
            'display_order' => 'nullable|integer|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('board-members', $filename, 'public');
            $data['image'] = 'board-members/' . $filename;
        }

        BoardMember::create($data);

        return redirect()->route('admin.board-members.index')
            ->with('success', 'Board member created successfully.');
    }

    public function edit(BoardMember $boardMember)
    {
        return view('admin.board-members.edit', compact('boardMember'));
    }

    public function update(Request $request, BoardMember $boardMember)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'description' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'mobile' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bio' => 'nullable|string',
            'display_order' => 'nullable|integer|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($boardMember->image && storage::disk('public')->exists($boardMember->image)) {
                storage::disk('public')->delete($boardMember->image);
            }

            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('board-members', $filename, 'public');
            $data['image'] = 'board-members/' . $filename;
        }

        $boardMember->update($data);

        return redirect()->route('admin.board-members.index')
            ->with('success', 'Board member updated successfully.');
    }

    public function destroy(BoardMember $boardMember)
    {
        // Delete image
        if ($boardMember->image && storage::disk('public')->exists($boardMember->image)) {
            storage::disk('public')->delete($boardMember->image);
        }

        $boardMember->delete();

        return redirect()->route('admin.board-members.index')
            ->with('success', 'Board member deleted successfully.');
    }

    public function toggleStatus(BoardMember $boardMember)
    {
        $boardMember->update([
            'status' => $boardMember->status === 'active' ? 'inactive' : 'active'
        ]);

        return redirect()->route('admin.board-members.index')
            ->with('success', 'Board member status updated successfully.');
    }
}
