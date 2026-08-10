<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::query()

            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('nik', 'like', "%{$search}%");
            })

            ->when($request->status, function ($query, $status) {
                $query->where('status', $status);
            })

            ->when($request->role, function ($query, $role) {
                $query->where('role', $role);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();
        
            // menghitung statistik register user    
            $stat = [
                'total' => User::count(),
                'active' => User::where('status','active')->count(),
                'pending' => User::where('status','pending')->count(),
                'rejected' => User::where('status','rejected')->count(),
            ];
            return view('admin.users.index', compact(
                'users',
                'stat'
            ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Hapus foto jika ada
        if ($user->photo && Storage::disk('public')->exists($user->photo)) {
            Storage::disk('public')->delete($user->photo);
        }

        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Pengguna berhasil dihapus.');
    }

    public function activate(User $user)
    {
        $user->update([
            'status' => 'active',
        ]);
        return redirect()
            ->route('admin.users.show', $user)
            ->with('success', 'Pengguna berhasil diaktifkan.');
    }

    public function reject(User $user)
    {
        $user->update([
            'status' => 'rejected',
        ]);
        return redirect()
            ->route('admin.users.show', $user)
            ->with('success', 'Pengguna berhasil ditolak.');
    }

}
