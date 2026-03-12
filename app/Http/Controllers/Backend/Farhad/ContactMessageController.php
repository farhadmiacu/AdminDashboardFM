<?php

namespace App\Http\Controllers\Backend\Farhad;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $contactMessages = ContactMessage::query()->latest('id');

            return DataTables::of($contactMessages)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return '<strong>' . $row->name . ' ' . $row->surname . '</strong>';
                })
                ->addColumn('email', function ($row) {
                    return $row->email;
                })
                ->addColumn('nation', function ($row) {
                    return $row->nation ?? 'N/A';
                })
                ->addColumn('activity', function ($row) {
                    return $row->activity ?? 'N/A';
                })
                ->addColumn('telephone', function ($row) {
                    return $row->telephone ?? 'N/A';
                })
                ->addColumn('message', function ($row) {
                    return str($row->message)->limit(50);
                })
                ->editColumn('status', function ($row) {
                    $status = $row->status ? trim($row->status) : 'pending';
                    $badgeClass = 'bg-secondary';

                    $lowerStatus = strtolower($status);
                    if ($lowerStatus == 'pending') $badgeClass = 'bg-danger';
                    if ($lowerStatus == 'replied') $badgeClass = 'bg-warning';
                    if ($lowerStatus == 'closed') $badgeClass = 'bg-success';

                    return '<span class="badge ' . $badgeClass . '">' . ucfirst($status) . '</span>';
                })
                ->addColumn('action', function ($row) {
                    $action = '';
                    $action .= '<a href="' . route('admin.contact-messages.show', $row->id) . '" class="btn btn-sm btn-info me-1" title="View Message">
                                <i class="fa-regular fa-eye"></i>
                            </a>';
                    $action .= '<form action="' . route('admin.contact-messages.destroy', $row->id) . '" method="POST" style="display:inline-block;">
                                ' . csrf_field() . method_field('DELETE') . '
                                <button type="submit" class="btn btn-sm btn-danger delete-button" title="Delete">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>';
                    return $action;
                })
                ->rawColumns(['name', 'email', 'nation', 'activity', 'telephone', 'message', 'status', 'action'])
                ->make(true);
        }

        return view('backend.layouts.contact_messages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contactMessage = ContactMessage::findOrFail($id);
        return view('backend.layouts.contact_messages.show', compact('contactMessage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contactMessage = ContactMessage::findOrFail($id);
        return view('backend.layouts.contact_messages.edit', compact('contactMessage'));
    }

    /**
     * Update status of the contact message.
     */
    public function updateStatus(Request $request, $id)
    {
        $contactMessage = ContactMessage::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,replied,closed',
        ]);

        $contactMessage->status = $request->status;
        $contactMessage->save();

        return back()->with('success', 'Status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contactMessage = ContactMessage::findOrFail($id);
        $contactMessage->delete();
        return redirect()->back()->with('success', 'Contact message deleted successfully');
    }
}
