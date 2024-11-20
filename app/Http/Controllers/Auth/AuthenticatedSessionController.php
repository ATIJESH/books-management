<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\Book;
use App\Models\Review;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * Here, we validate the login request, attempt to log the user in,
     * and return an appropriate response.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Validate and authenticate the request
        $credentials = $request->validated();

        // Authenticate the user using the credentials from the validated request
        if (Auth::attempt($credentials)) {
            // Regenerate session to prevent session fixation attacks
            $request->session()->regenerate();

            // Redirect the user to their intended destination (default is /dashboard)
            return redirect()->intended('/dashboard');
        }

        // Return back with an error if authentication fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Destroy an authenticated session.
     *
     * Logs out the user, invalidates the session, and regenerates the CSRF token.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Logout the user
        Auth::guard('web')->logout();

        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to home page after logging out
        return redirect('/');
    }
}

