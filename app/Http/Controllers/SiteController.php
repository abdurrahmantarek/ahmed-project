<?php

namespace App\Http\Controllers;
//use App\Setting;
use App\Models\Project;
use App\Models\User;
use App\Rules\ReCaptcha;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiteController extends Controller
{
    public function redirectToProjects()
    {

        return redirect()->route('home');
    }
    protected function updateDotEnv($key, $newValue, $delim = '')
    {

        $path = base_path('.env');
        // get old value from current env
        $oldValue = env($key);

        // was there any change?
        if ($oldValue === $newValue) {
            return;
        }

        // rewrite file content with changed data
        if (file_exists($path)) {
            // replace current value with new value
            file_put_contents(
                $path, str_replace(
                    $key . '=' . $delim . $oldValue . $delim,
                    $key . '=' . $delim . $newValue . $delim,
                    file_get_contents($path)
                )
            );
        }
    }

    public function openWebsite()
    {

//        Setting::find(1)->update([
//            'value' => 'on'
//        ]);

//        $this->updateDotEnv('MAINTENANCE_MODE', 'on');
        return redirect()->route('home');

    }
    public function maintenanceWebsite()
    {
//        Setting::find(1)->update([
//            'value' => 'off'
//        ]);
//        $this->updateDotEnv('MAINTENANCE_MODE', 'off');
    }
    public function reserveButtonStatus(Request $request)
    {
        if($request->get('status') === "on") {

            Setting::find(2)->update([
                'value' => 'on'
            ]);
//            $this->updateDotEnv('RESERVE_BUTTON', 'on');

        }elseif ($request->get('status') === "off") {

            Setting::find(2)->update([
                'value' => 'off'
            ]);
//            $this->updateDotEnv('RESERVE_BUTTON', 'off');

        }

//        Artisan::call('cache:clear');
//        Artisan::call('config:clear');

        return "DONE";
    }
    public function logout(Request $request)
    {

        $request->session()->pull('logged');

        return redirect()->route('home');
    }
    public function loginData(Request $request)
    {
        $request->validate([
//            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);

        $user = User::where('national_id', $request->username)->where('password', $request->password);

        if($user->exists()){

            $request->session()->put('logged', true);
            $request->session()->put('user', $user->first());
            return redirect()->route('home');

        }

        return back()->withErrors(['login' => '8lat']);

    }
    public function login()
    {
        return view('site.login');
    }

    public function home()
    {
        $projects = Project::orderBy('sorting_date', 'asc')->get();

        return view('site.home', compact('projects'));
    }

    public function rules()
    {
        return view('site.rules');
    }
    public function reserve($id)
    {
        $project = Project::find($id);

        session()->put('project', $project);

        return view('site.reserve', compact('project'));
    }
    public function step1()
    {
        return view('site.step1');
    }
    public function step2()
    {
        return view('site.step2');
    }
    public function step3()
    {
        return view('site.step3');
    }
    public function step4()
    {
        return view('site.step4');
    }
}
