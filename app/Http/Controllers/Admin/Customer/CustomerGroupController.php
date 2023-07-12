<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Customer\CustomerGroupUpdateRequest;
use App\Models\CustomerGroup;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CustomerGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.customer-group.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show(CustomerGroup $group): View
    {
        return view('admin.pages.customer-group.show', compact('group'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerGroupUpdateRequest $request)
    {
        $group = CustomerGroup::create($request->validated());
        $group->save();

        return redirect(route('admin.customer-group.index', $group))
            ->with('success', trans('system.flash.message.created', ['resource' => 'Customer Group']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerGroup $group, CustomerGroupUpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $group->update($data);

        return redirect(route('admin.customer-group.show', $group))
            ->with('success', trans('system.flash.message.updated', ['resource' => 'Customer Group']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CustomerGroup $group
     * @return RedirectResponse
     */
    public function destroy(CustomerGroup $group): RedirectResponse
    {
        $group->delete();

        return back()->with('success', trans('system.flash.message.deleted', ['resource' => 'Customer Group']));
    }

    /**
     * @return JsonResponse
     * @throws \Yajra\DataTables\Exceptions\Exception
     */
    public function datatable(): JsonResponse
    {
        $groups = CustomerGroup::all();

        return datatables()
            ->of($groups)
            ->addColumn('group_title',
                fn(CustomerGroup $group) => $this->rawTitle($group->title)
            )
            ->addColumn('group_action',
                fn(CustomerGroup $group) => view('admin.layout.components.datatable.actions', [
                    'actions' => [
                        'show' => [
                            'route_name' => 'admin.customer-group.show',
                            'url'        => route('admin.customer-group.show', $group),
                        ]
                    ]
                ])
            )
            ->rawColumns([
                'group_title',
                'group_action',
            ])
            ->make(true);
    }
}
