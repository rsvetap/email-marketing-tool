<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Customer\CustomerAttachGroupsRequest;
use App\Http\Requests\Admin\Customer\CustomerStoreRequest;
use App\Http\Requests\Admin\Customer\CustomerUpdateRequest;
use App\Models\Customer;
use App\Models\CustomerGroup;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.customer.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show(Customer $customer): View
    {
        $groups = CustomerGroup::all();

        return view('admin.pages.customer.show', compact(['customer', 'groups']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerStoreRequest $request)
    {
        $customer = Customer::create($request->validated());
        $customer->save();

        return redirect(route('admin.customer.show', $customer))
            ->with('success', trans('system.flash.message.created', ['resource' => 'Customer']));
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('admin.pages.customer.create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Customer $customer, CustomerUpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $customer->update($data);

        return redirect(route('admin.customer.show', $customer))
            ->with('success', trans('system.flash.message.updated', ['resource' => 'Customer']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Customer $customer
     * @return RedirectResponse
     */
    public function destroy(Customer $customer): RedirectResponse
    {
        $customer->delete();

        return back()->with('success', trans('system.flash.message.deleted', ['resource' => 'Customer']));
    }

    /**
     * @return JsonResponse
     * @throws \Yajra\DataTables\Exceptions\Exception
     */
    public function datatable(): JsonResponse
    {
        $customers = Customer::all();

        return datatables()
            ->of($customers)
            ->addColumn('customer_first_name',
                fn(Customer $customer) => $this->rawTitle($customer->first_name)
            )
            ->addColumn('customer_last_name',
                fn(Customer $customer) => $this->rawTitle($customer->last_name)
            )
            ->addColumn('customer_email',
                fn(Customer $customer) => $this->rawEmail($customer->email)
            )
            ->addColumn('customer_sex',
                fn(Customer $customer) => $customer->sex
            )
            ->addColumn('customer_birth_date',
                fn(Customer $customer) => $this->rawDateTime(dateTime: $customer->birth_date)
            )
            ->addColumn('customer_created_at',
                fn(Customer $customer) => $this->rawDateTime(dateTime: $customer->created_at)
            )
            ->addColumn('customer_updated_at',
                fn(Customer $customer) => $this->rawDateTime(dateTime: $customer->updated_at)
            )
            ->addColumn('customer_action',
                fn(Customer $customer) => view('admin.layout.components.datatable.actions', [
                    'actions' => [
                        'show' => [
                            'route_name' => 'admin.customer.show',
                            'url'        => route('admin.customer.show', $customer),
                        ],
                        'delete' => [
                            'route_name' => 'admin.customer.destroy',
                            'url'        => route('admin.customer.destroy', $customer),
                        ],
                    ]
                ])
            )
            ->rawColumns([
                'customer_first_name',
                'customer_last_name',
                'customer_email',
                'customer_sex',
                'customer_birth_date',
                'customer_created_at',
                'customer_updated_at',
                'customer_action',
            ])
            ->make(true);
    }

    public function attachGroups(CustomerAttachGroupsRequest $request, Customer $customer)
    {
        $groupIds = $request->input('groups', []);

        // Detach all existing groups
        $customer->groups()->detach();

        // Attach selected groups
        foreach ($groupIds as $groupId) {
            $group = CustomerGroup::findOrFail($groupId);
            $customer->groups()->attach($group);
        }

        return redirect()->route('admin.customer.show', $customer)
            ->with('success', trans('system.flash.message.updated', ['resource' => 'Customer Groups']));
    }
}
