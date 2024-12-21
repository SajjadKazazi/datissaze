<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\Settings\CommunicationSettings;
use App\Support\Settings\DefaultTextSettings;
use App\Support\Settings\GeneralSettings;
use App\Support\Settings\MainPageSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    public function general_settings(GeneralSettings $settings): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        return view('admin.settings.general', compact('settings'));
    }


    public function update(Request $request, GeneralSettings $settings)
    {

        $settings->site_name = $request->get('site_name');
        $settings->site_logo = $request->get('site_logo');
        $settings->favicon = $request->get('favicon');
        $settings->site_description = $request->get('site_description');
        $settings->page_image = $request->get('page_image');
        $settings->project_page_image = $request->get('project_page_image');
        $settings->service_page_image = $request->get('service_page_image');
        $settings->save();
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');

        return back()->with('success_add','اطلاعات با موفقیت بروزرسانی شد');
    }

    public function mainPage(MainPageSettings $settings): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.settings.main-page', compact('settings'));
    }

    public function update_mainPage(Request $request, MainPageSettings $settings): \Illuminate\Http\RedirectResponse
    {
        $settings->site_name = $request->get('site_name');
        $settings->site_description = $request->get('site_description');
        $settings->save();
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');

        return back()->with('success_add','اطلاعات با موفقیت بروزرسانی شد');
    }

    public function communication(CommunicationSettings $settings): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.settings.communication', compact('settings'));
    }

    public function update_communication(Request $request, CommunicationSettings $settings): \Illuminate\Http\RedirectResponse
    {
        $settings->address = $request->get('address');
        $settings->email = $request->get('email');
        $settings->postal_code = $request->get('postal_code');
        $settings->tel = $request->get('tel');
        $settings->mobile = $request->get('mobile');
        $settings->telegram = $request->get('telegram');
        $settings->whatsapp = $request->get('whatsapp');
        $settings->instagram = $request->get('instagram');
        $settings->facebook = $request->get('facebook');
        $settings->bale = $request->get('bale');
        $settings->save();
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');

        return back()->with('success_add','اطلاعات با موفقیت بروزرسانی شد');
    }


    public function DefaultText(DefaultTextSettings $settings): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.settings.defaultText', compact('settings'));
    }

    public function DefaultText_communication(Request $request, DefaultTextSettings $settings): \Illuminate\Http\RedirectResponse
    {
        $settings->projects_text = $request->get('projects_text');
        $settings->services_text = $request->get('services_text');
        $settings->pages_text = $request->get('pages_text');

        $settings->save();
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');

        return back()->with('success_add','اطلاعات با موفقیت بروزرسانی شد');
    }

}
