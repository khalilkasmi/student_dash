<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Tymon\JWTAuth\Facades\JWTAuth;
use Alert   ;

class AuthController extends Controller
{
  public function register(Request $request)
  {
    $user = User::create([
      'email'    => $request->email,
      'password' => $request->password,
      'name' => $request->name,
    ]);

    $token = auth()->login($user);

    return $this->respondWithToken($token);
  }

  public function login()
  {
    $credentials = request(['email', 'password']);

    if (! $token = auth()->attempt($credentials)) {
      return response()->json(['error' => 'Unauthorized'], 401);
    }

    return $this->respondWithToken($token);
  }

  public function logout()
  {
    auth()->logout();

    return response()->json(['message' => 'Successfully logged out']);
  }

  protected function respondWithToken($token)
  {
    return response()->json([
      'access_token' => $token,
      'token_type'   => 'bearer',
      'expires_in'   => auth()->factory()->getTTL() * 60
    ]);
  }

  public function redirectToProvider(){
    return Socialite::driver('google')->stateless()->user();
  }

  public function handleProviderCallback(){
    $providerUser = Socialite::driver('google')->with(['hd'=>'edu.uiz.ac.ma'])->stateless()->user();

    if(explode("@", $providerUser->email)[1] !== "edu.uiz.ac.ma"){
      Alert::error('Pleas singin with @edu.uiz.ac.ma email', 'Error login in')->autoclose(10000);;
      return view('welcome');
    }

    $user = User::query()->firstOrNew(['email' => $providerUser->getEmail()]);


    if (!$user->exists) {
      if($providerUser->getName()){
      $user->name = $providerUser->getName();
      }else{
        $user->name = explode('@',$providerUser->getName())[0];
      }
      $user->avatar = $providerUser->getAvatar();
      $user->save();
    }

    $user_data = [
      'user_name'=> $user->name,
      'user_email'=> $user->email,
      'user_avatar'=> $user->avatar,
    ];

    $token = JWTAuth::fromUser($user);

    /*return new JsonResponse([
      'token' => $token
    ]);*/




    return view('callback', [
      'user' => $user,
      'token' => $token,
    ]);
  }
}
