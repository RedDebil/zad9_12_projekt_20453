<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Wyświetlanie listy użytkowników.
     */
    public function index(Request $request)
    {
        // Pobierz rolę, jeśli jest ustawiona w zapytaniu
        $role = $request->input('role', '');

        // Sprawdź, czy użytkownik ustawił filtr
        if ($role) {
            // Jeśli rolę wybrano, filtrujemy użytkowników
            $users = User::where('role', $role)->get();
        } else {
            // Jeśli rolę nie wybrano, pobieramy wszystkich użytkowników
            $users = User::all();
        }

        // Role do wyboru w formularzu
        $roles = [
            '' => 'Wszystkie role', 
            'user' => 'User', 
            'mod' => 'Pracownik', 
            'admin' => 'Administrator'
        ];

        return view('admin.users.index', compact('users', 'roles'));
    }


    /**
     * Formularz tworzenia nowego użytkownika.
     */
    public function create()
    {
        $roles = ['user', 'mod', 'admin'];
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Przechowywanie nowego użytkownika w bazie.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:user,mod,admin',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'Użytkownik został dodany.');
    }


    /**
     * Formularz edycji użytkownika.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Aktualizacja danych użytkownika.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:user,mod,admin',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only('name', 'email', 'role'));

        return redirect()->route('users.index')->with('success', 'Użytkownik został zaktualizowany.');
    }

    /**
     * Usunięcie użytkownika.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Użytkownik został usunięty.');
    }
}
