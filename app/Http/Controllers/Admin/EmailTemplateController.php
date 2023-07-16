<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmailTemplate\EmailTemplateUpdateRequest;
use App\Models\Customer;
use App\Models\EmailTemplate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EmailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.email-template.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show(EmailTemplate $template): View
    {
        $customers = Customer::all();

        return view('admin.pages.email-template.show', compact(['template', 'customers']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmailTemplateUpdateRequest $request)
    {
        $emailTemplate = EmailTemplate::create($request->validated());
        $emailTemplate->save();

        return redirect(route('admin.email-template.show', $emailTemplate))
            ->with('success', trans('system.flash.message.created', ['resource' => 'Email Template']));
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('admin.pages.email-template.create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmailTemplateUpdateRequest $request, EmailTemplate $template): RedirectResponse
    {
        $data = $request->validated();
        $template->update($data);

        return redirect(route('admin.email-template.show', $template))
            ->with('success', trans('system.flash.message.updated', ['resource' => 'Email Template']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param EmailTemplate $emailTemplate
     * @return RedirectResponse
     */
    public function destroy(EmailTemplate $emailTemplate): RedirectResponse
    {
        $emailTemplate->delete();

        return back()->with('success', trans('system.flash.message.deleted', ['resource' => 'Email Template']));
    }

    /**
     * @return JsonResponse
     * @throws \Yajra\DataTables\Exceptions\Exception
     */
    public function datatable(): JsonResponse
    {
        $emailTemplates = EmailTemplate::all();

        return datatables()
            ->of($emailTemplates)
            ->addColumn('email_template_subject',
                fn(EmailTemplate $emailTemplate) => $emailTemplate->subject
            )
            ->addColumn('email_template_created_at',
                fn(EmailTemplate $emailTemplate) => $this->rawDateTime(dateTime: $emailTemplate->created_at)
            )
            ->addColumn('email_template_updated_at',
                fn(EmailTemplate $emailTemplate) => $this->rawDateTime(dateTime: $emailTemplate->updated_at)
            )
            ->addColumn('email_template_action',
                fn(EmailTemplate $emailTemplate) => view('admin.layout.components.datatable.actions', [
                    'actions' => [
                        'show' => [
                            'route_name' => 'admin.email-template.show',
                            'url'        => route('admin.email-template.show', $emailTemplate),
                        ],
                        'delete' => [
                            'route_name' => 'admin.email-template.destroy',
                            'url'        => route('admin.email-template.destroy', $emailTemplate),
                        ],
                    ]
                ])
            )
            ->rawColumns([
                'email_template_created_at',
                'email_template_updated_at',
                'email_template_action',
            ])
            ->make(true);
    }
}
