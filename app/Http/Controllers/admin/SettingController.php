<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MailRequest;
use App\Models\Smtp;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function mailSetting()
    {
        $mailSettings = Smtp::first();
        return view('backend.admin.setting.mail.index', compact('mailSettings'));
    }

    public function updateMailSettings(MailRequest $request)
    {

        Smtp::updateOrCreate(['id' => 1], $request->validated());

        return redirect()->back()->with('success', 'Mail settings updated successfully!');
    }
}
