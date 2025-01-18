<?php

namespace App\Http\Controllers;

use App\Models\PostsModel;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\AssignOp\Pow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function index()
    {
        $userId = auth()->id(); 
        $user = Users::find($userId); // Получаем данные пользователя по его ID

        return view('account', compact('user')); // Передаем объект пользователя в представление
        // return view('account');
    }

    public function update(Request $request)
    {
        // Валидация входящих данных
        $request->validate([
            'login' => 'min:4|max:100',
            'email' => 'min:4|max:100',
            //'password' => 'min:4|max:100',
        ]);

        // Получаем текущего авторизованного пользователя
        $userId = auth()->id(); 
        $user = Users::find($userId); 

        // Обновляем данные пользователя если они введены
        if ($request->input('login') != '') {
            $user->login = $request->input('login');
        }
        
        if ($request->input('password') != '') {
            $user->password = Hash::make($request->input('password'));
        }

        if ($request->input('email') != '') {
            $user->email = $request->input('email');
        }

        logger()->info('Incoming request data:', $request->all());//это для просмотра какие данные пришли
        
        // Сохраняем изменения в базе данных
        $user->save();

        //return redirect()->route('account.index')->with('success', 'Данные успешно обновлены.');//сообщение что данные обновлены
        return redirect()->route('account.index');
    }

    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'user_id' => 'required|exists:users_models,id',
        ]);

        $user = Users::find($request->user_id);
        
        if ($request->hasFile('avatar')) {
            // Удаляем старый аватар, если он есть
            if ($user->avatar && $user->avatar !== 'no') {
                Storage::delete($user->avatar);
            }

            // Сохраняем новый аватар
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
            $user->save();

            return response()->json(['success' => true, 'avatar_url' => Storage::url($path)]);
        }

        return response()->json(['success' => false]);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('main');
    }

}
