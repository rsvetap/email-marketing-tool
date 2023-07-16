<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmailTool\EmailToolSendRequest;
use App\Services\EmailSendingService;
use App\Models\EmailTemplate;
use Exception;
use Illuminate\Http\RedirectResponse;

class EmailToolController extends Controller
{
    protected EmailSendingService $emailService;

    public function __construct(EmailSendingService $emailService)
    {
        $this->emailService = $emailService;
    }

    /**
     * Send email template to recipients
     *
     * @param EmailToolSendRequest $request
     * @return RedirectResponse
     */
    public function send(EmailToolSendRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // Retrieve the selected email template from the database
        $template = EmailTemplate::find($data['template']);

        try {
            $this->emailService->sendEmailToRecipients($data['customers'], $template);
        } catch (Exception $e) {
            return redirect()->back()->with('error', trans('system.flash.message.email_failed', ['error_message' => $e->getMessage()]));
        }

        return redirect()->back()->with('success', trans('system.flash.message.email_succeed'));
    }
}
