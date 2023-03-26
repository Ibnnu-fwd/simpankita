<?php

namespace App\Repositories;

use App\Interfaces\OfficerInterface;
use App\Models\DetailUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OfficerRepository implements OfficerInterface
{
    private $detailUser;
    private $user;

    public function __construct(DetailUser $detailUser, User $user)
    {
        $this->detailUser = $detailUser;
        $this->user = $user;
    }

    public function get()
    {
        return $this->detailUser->with('user')->get();
    }

    public function store($data)
    {
        DB::beginTransaction();

        try {
            $user = $this->user->create([
                'username' => $data['username'],
                'email'    => $data['email'],
                'password' => password_hash($data['password'], PASSWORD_DEFAULT),
                'role'     => $this->user::ROLE_OFFICER,
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }

        try {
            if (isset($data['avatar'])) {
                $filename = time() . '.' . $data['avatar']->getClientOriginalExtension();
                $data['avatar']->storeAs('public/officer', $filename);
                $data['avatar'] = 'officer/' . $filename;
            }
            $data['birth_date'] = date('Y-m-d', strtotime($data['birth_date']));
            $this->detailUser->create(array_merge($data, ['user_id' => $user->id]));
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }

        DB::commit();
    }

    public function find($id)
    {
        return $this->detailUser->with('user')->find($id);
    }

    public function destroy($id)
    {
        $detailUser = $this->detailUser->find($id);
        $user = $this->user->find($detailUser->user_id);

        DB::beginTransaction();

        try {
            $detailUser->setInactive();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }

        try {
            $user->setInactive();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }

        DB::commit();
    }

    public function activate($id)
    {
        $detailUser = $this->detailUser->find($id);
        $user       = $this->user->find($detailUser->user_id);

        $detailUser->is_active = 1;
        $user->is_active       = 1;

        $detailUser->save();
        $user->save();

        return true;
    }

    public function update($data, $id)
    {
        $detailUser = $this->detailUser->find($id);
        $user = $this->user->find($detailUser->user_id);

        if($data['password'] != null) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        } else {
            $data['password'] = $user->password;
        }

        $data['birth_date'] = date('Y-m-d', strtotime($data['birth_date']));
        if(isset($data['avatar'])) {
            if($detailUser->avatar != null) {
                unlink(public_path('storage/' . $detailUser->avatar));
            }

            $filename = time() . '.' . $data['avatar']->getClientOriginalExtension();
            $data['avatar']->storeAs('public/officer', $filename);
            $data['avatar'] = 'officer/' . $filename;
        }

        DB::beginTransaction();

        try {
            $detailUser->update($data);

        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }

        try {
            $user->update([
                'username' => $data['username'],
                'email'    => $data['email'],
                'password' => $data['password'],
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }

        DB::commit();
    }
}
