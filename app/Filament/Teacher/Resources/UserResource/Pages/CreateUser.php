<?php

namespace App\Filament\Teacher\Resources\UserResource\Pages;

use App\Enums\UserRoles;
use App\Filament\Teacher\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;


    protected function handleRecordCreation(array $data): Model
    {
        $user = DB::transaction(function () use ($data) {
            $user = new User([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => UserRoles::STUDENT
            ]);

           $user->save();

           $user->group()->attach($data['group_id']);

           return $user;
        });

        return $user;
    }
}
