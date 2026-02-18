<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\SeedUsersRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    // === Funciones ===
    private function handleMissingImplementation()
    {
        return redirect(route('users.index', [
            'error' => 'Sin implementar'
        ]));
    }


    // === Recurso ===
    /**
     * Display a listing of the resource.
     */
    public function index($role = null)
    {
        // Recuperamos a los usuarios
        if (!$role) {
            $users = User::all();
        } else {
            $users = User::role($role)->get();
        }

        // Inyectamos en la lista un atributo con los roles de los usuarios
        foreach ($users as $user) {
            $user['roles_string'] = $user->getRoleNames()->implode(', ');
        }

        $tableConfig = config('tables.users');

        return Inertia::render('Users/Index', [
            'rows' => $users,
            'tableConfig' => $tableConfig
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->handleMissingImplementation();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return $this->handleMissingImplementation();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }

    /**
     * Seed users.
     */
    public function seed(SeedUsersRequest $request)
    {
        $count = $request->validated('count', 5);

        // Profesores
        User::factory()->count($count)->create()->each(function ($user) {
            $user->assignRole('teacher');
        });
        // Estudiantes
        User::factory()->count($count)->create()->each(function ($user) {
            $user->assignRole('student');
        });

        return back();
    }
}
