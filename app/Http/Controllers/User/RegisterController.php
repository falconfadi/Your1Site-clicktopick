<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ActivateUserRequest;
use App\Http\Requests\API\ResetPasswordConfirmRequest;
use App\Http\Requests\API\ResetPasswordRequest;
use App\Http\Requests\Auth\UserRegisterRequest;
use App\Http\Traits\TwilioTrait;
use App\Models\User;
use Carbon\Carbon;
use Dompdf\Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    use TwilioTrait;

    public function create()
    {
        return view('website.auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $validate = $request->except('avatar');
        if ($request->hasFile('avatar'))
            $validate['avatar'] = Storage::disk('public')->put('users', $request->file('avatar'));
        else
            $validate['avatar'] = Str::of(Storage::putFile('public/users/default', (base_path('public/assets/media/users/default.jpg'))))->replace('public/', '');

        $user = User::query()->create($validate);
//        $user = $user->generateActivationCode();

        /** @var User|Boolean $errorOrUser */
        if (!($user instanceof User)) {
            if ($user->avatar)
                $user->avatar = Storage::disk('public')->delete($user->avatar);

            $user->delete();
            return redirect()->route('user.register');
        } else {
            $user->status=1;
            $user->mobile_verified_at=Carbon::now();
            $user->save();
            //this login for testing will be next step put verification
            $credentials = $request->only('email', 'password');
            if (auth('user')->attempt($credentials)) {
                return redirect()->route('user.index');
            }

            $request->session()->put('user', $user);
                         return redirect()->route('user.login');

        }
    }

    public function verification()
    {
        $user = \session()->get('user');
        return view('website.auth.verification', compact('user'));
    }

    public function activeUser(ActivateUserRequest $request): RedirectResponse
    {
        $code = implode($request->get('activation_code'));
        $mobile = $request->get('phone_number');
        $user = User::query()->where('phone_number', $mobile)->first();

        if (!$user) {
            $request->session()->flash('error', __('front.wrong'));
            return redirect()->route('register');
        }

        if ($user->isActive()) {
            $request->session()->flash('error', __('api.user_already_active'));
            return redirect()->back();
        }

        if ($user->code == $code) {
            $user->activateUserAccount()->save();
            auth('user')->login($user);
            return redirect()->route('user.index');
        } else {
            $request->session()->flash('error', __('front.the_code is invalid'));
            return redirect()->route('user.verification')->with(['user' => $user]);
        }
    }

    public function forgetPassword()
    {
        return view('website.auth.forget-password');
    }

    public function sendCode(Request $request): RedirectResponse
    {
        $request->validate([
            'phone_number' => 'required|exists:users,phone_number',
        ]);
        $user = User::query()->where('phone_number', $request->get('phone_number'))->first();
        if ($user) {
            try {
                $user = $user->generatePasswordToken();
                if ($user instanceof User) {
                    $user->save();
                    $request->session()->flash('success', __('front.we_send_a_code'));
                    $request->session()->put('user', $user);
                    return redirect()->route('user.get-code');
                } else {
                    $request->session()->flash('error', __('front.invalid_number'));
                    return redirect()->route('user.forget-password');
                }
            } catch (\Exception $e) {
                $request->session()->flash('error', __('front.invalid_number'));
                return redirect()->route('user.forget-password');
            }
        } else {
            $request->session()->flash('error', __('front.user_not_registered'));
            return redirect()->route('user.register');
        }
    }

    public function getCodePage()
    {
        $user = \session()->get('user');
        return view('website.auth.check-code', compact('user'));
    }

    public function checkCode(ResetPasswordConfirmRequest $request): RedirectResponse
    {
        $code = implode($request->get('reset_token'));
        $mobile = $request->get('phone_number');
        $user = User::where('phone_number', $mobile)->first();

        $checkCode = $user->checkPasswordCode($code);
        if ($checkCode) {
            $user->reset_verified = "yes";
            $passwordChanged = $user->changePassword($request->get('password'));

            if ($passwordChanged) {
                $request->session()->flash('success', __('front.password_changed'));
                return redirect()->route('user.register');
            } else {
                $request->session()->flash('error', __('front.password_not_changed'));
                return redirect()->route('user.register');
            }
        } else {
            $request->session()->flash('error', __('front.code_not_valid'));
            return redirect()->route('user.forget-password');
        }
    }

    public function resendVerification(Request $request): JsonResponse
    {
        $user = User::query()->where('phone_number', $request->get('phone_number'))->first();
        $user = $user->generateActivationCode();
        /** @var User|Boolean $errorOrUser */
        if (($user instanceof User)) {
            $user->save();
            return response()->json(['success']);
        } else {
            return response()->json(['error']);
        }
    }
}
