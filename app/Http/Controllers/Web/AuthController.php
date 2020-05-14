<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Objects;
use App\User;
use App\Transactions;

class AuthController extends Controller
{
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
      if($request->isMethod('post')) {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
          return view('login', ['error' => 'Wrong login credentials.']);
        }

        $user = auth()->user();

        if ($user->admin !== 1) {
          return view('login', ['error' => 'You need admin access to login.']);
        }

        $loggedToken = $this->respondWithToken($token)->original['access_token'];

        session(['loggedToken' => $loggedToken]);
        return redirect()->route('dashboard');
      } else {
        return view('login');
      }
    }

    /**
     * Return dashboard view.
     *
     * @return
     */
    public function dashboard(Request $request)
    {
      if($request->session()->get('loggedToken') !== null) {
        if($request->session()->get('loggedToken') !== null) {
            $objects=Objects::get();
            $transactions=Transactions::get();
            $users=User::get();
            return view('welcome', [
              'objects' => $objects,
              'transactions' => $transactions,
              'users' => $users
            ]);
          }
      } else {
        return redirect()->route('login')->with('error', 'Please login to access dashboard.');
      }
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }


    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
