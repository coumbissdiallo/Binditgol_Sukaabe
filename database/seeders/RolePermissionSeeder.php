<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Commune;
use App\Models\Maternite;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Créer les permissions
        $permissions = ['users.view', 'users.create', 'users.update', 'users.delete', 'child.create', 'child.update'];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm, 'guard_name' => 'web']);
        }

        //  Créer les rôles et leur attribuer des permissions
        $roles = [
            'super_admin' => $permissions,
            'asc' => ['child.create', 'child.update'],
            'parent' => [],
            'agent' => [],
            'officier' => [],
            'maternite' => [],
        ];

        foreach ($roles as $roleName => $perms) {
            $role = Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
            $role->syncPermissions($perms);
        }

        //  Créer des utilisateurs fixes
        $admin = User::firstOrCreate(['email' => 'superadmin@gmail.com'], [
            'nom' => 'Diallo',
            'prenom' => 'Coumba',
            'telephone' => '772321322',
            'id_commune' => Commune::where('nom_commune', 'Koungheul')->first()?->id,
            'password' => Hash::make('passer01'),
        ]);
        $admin->assignRole('super_admin');

        $asc = User::firstOrCreate(['email' => 'agentsante@gmail.com'], [
            'nom' => 'Diallo',
            'prenom' => 'Moussa',
            'telephone' => '774221322',
            'id_commune' => Commune::where('nom_commune', 'Malem Hodar')->first()?->id,
            'password' => Hash::make('passer01'),
        ]);
        $asc->assignRole('asc');

        $parent = User::firstOrCreate(['email' => 'parent@gmail.com'], [
            'nom' => 'Badji',
            'prenom' => 'Eva',
            'telephone' => '775559720',
            'id_commune' => Commune::where('nom_commune', 'Birkilane')->first()?->id,
            'password' => Hash::make('passer01'),
        ]);
        $parent->assignRole('parent');

        $parent = User::firstOrCreate(['email' => 'parentEva@gmail.com'], [
            'nom' => 'Badji',
            'prenom' => 'Eva',
            'telephone' => '775549720',
            'id_commune' => Commune::where('nom_commune', 'Toubacouta')->first()?->id,
            'password' => Hash::make('passer01'),
        ]);
        $parent->assignRole('parent');

        $officier = User::firstOrCreate(['email' => 'officier@gmail.com'], [
            'nom' => 'Cisse',
            'prenom' => 'Rassoul',
            'telephone' => '778203730',
            'id_commune' => Commune::where('nom_commune', 'Toubacouta')->first()?->id,
            'password' => Hash::make('passer01'),
        ]);
        $officier->assignRole('officier');

        $agentcivil = User::firstOrCreate(['email' => 'agentcivil@gmail.com'], [
            'nom' => 'Perez',
            'prenom' => 'Elsa',
            'telephone' => '778924388',
            'id_commune' => Commune::where('nom_commune', 'Toubacouta')->first()?->id,
            'password' => Hash::make('passer01'),
        ]);
        $agentcivil->assignRole('agent');

        $maternite = User::firstOrCreate(['email' => 'maternite@gmail.com'], [
            'nom' => 'Khadija',
            'prenom' => 'Diedhiou',
            'telephone' => '773324547',
            'id_maternite' => Maternite::where('nom_maternite', 'Maternité de Toubacouta')->first()?->id,
            'id_commune' => Commune::where('nom_commune', 'Toubacouta')->first()?->id,
            'password' => Hash::make('passer01'),
        ]);
        $maternite->assignRole('maternite');

        //  Créer des utilisateurs dynamiques
        $this->createUsersByRole('parent');
        $this->createUsersByRole('agent');
        $this->createUsersByRole('officier');
        $this->createUsersByRole('asc');

        //  Créer des utilisateurs liés aux maternités
        $this->createMaterniteUsers();
    }

    private function createUsersByRole(string $roleName, int $count = 5): void
    {
        $communes = Commune::inRandomOrder()->take($count)->get();

        foreach ($communes as $i => $commune) {
            $user = User::firstOrCreate(['email' => $roleName . $i . '@example.com'], [
                'nom' => ucfirst($roleName) . 'Nom' . $i,
                'prenom' => ucfirst($roleName) . 'Prenom' . $i,
                'telephone' => '77' . rand(1000000, 9999999),
                'id_commune' => $commune->id,
                'password' => Hash::make('passer01'),
            ]);
            $user->assignRole($roleName);
        }
    }

    private function createMaterniteUsers(int $count = 5): void
    {
        $maternites = Maternite::inRandomOrder()->take($count)->get();

        foreach ($maternites as $i => $mat) {
            $user = User::firstOrCreate(['email' => 'maternite' . $i . '@example.com'], [
                'nom' => 'MaterniteNom' . $i,
                'prenom' => 'MaternitePrenom' . $i,
                'telephone' => '77' . rand(1000000, 9999999),
                'id_commune' => $mat->id_commune,
                'id_maternite' => $mat->id,
                'password' => Hash::make('passer01'),
            ]);
            $user->assignRole('maternite');
        }
    }
}
