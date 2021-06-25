<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email', //unique zur User-Tabelle und der E-Mail-Spalte
            'password' => 'required|string|confirmed|min:6' //confirmation-field verlangen
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']), //Passwort hashen - inklusive Salt
        ]);

        $token = $user->createToken('hmtoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201); //success
    }

    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required|string', 
            'password' => 'required|string'
        ]);

        //Validiere eingegebene Email mit der Email-Spalte in der Datenbank
        //first() hat zwar keine Auswirkungen, da email unique ist..
        $user = User::where('email', $fields['email'])->first();

        //Validiere Passwort
        //Wenn Userobjekt nichts zugewiesenbekommen hat, weil die angegebene E-Mail nicht in der DB liegt
        //oder der Hash-Check des passworts negativ ausfällt..
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'Falsche E-Mail oder falsches PW...'
            ], 401); //-> unauthorized statuscode
        }

        //wenn Login erfolgreich

        $token = $user->createToken('hmtoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201); //success
    }

    public function logout(Request $request){

        Auth::logout();
        return response(null, 200); 

        /*auth()->user()->tokens()->delete(); //Alle möglichen Tokens löschen --brad way

        return[
            'message' => 'Logged out!'
        ];*/
    }


}
