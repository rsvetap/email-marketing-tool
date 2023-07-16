<div class="card">
    <div class="card-body">
        <form method="post"
              action="{{ isset($customer) ? route('admin.customer.update', $customer) : route('admin.customer.store') }}">
            @csrf
            @method(isset($customer) ? 'PUT' : 'POST')
            <div class="form-row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text"
                               class="form-control"
                               id="first_name"
                               name="first_name"
                               value="{{ old('first_name', isset($customer) ? $customer->first_name : '') }}"
                               required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="surname">Last Name</label>
                        <input type="text"
                               class="form-control"
                               id="last_name"
                               name="last_name"
                               value="{{ old('last_name', isset($customer) ? $customer->last_name : '') }}"
                               >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="surname">Email</label>
                        <input type="text"
                               class="form-control"
                               id="email"
                               name="email"
                               value="{{ old('email', isset($customer) ? $customer->email : '') }}"
                        >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sex">Sex</label>
                        <select class="form-control mb-2" name="sex">
                            <option value="" @selected(old('sex', isset($customer) ? $customer->sex : '') == '')>
                                Empty
                            </option>
                            @foreach((\App\Enums\CustomerSexEnum::cases()) as $sex)
                                <option value="{{ $sex->value }}"
                                    @selected(old('sex', (isset($customer) && !is_null($customer->sex)) ? $customer->sex->value : '') == $sex->value)>
                                    {{ ucfirst($sex->value) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="birth_date">Birth Date</label>
                        <input type="date"
                               class="form-control"
                               id="birth_date"
                               name="birth_date"
                               value="{{ old('birth_date', (isset($customer) && !is_null($customer->birth_date)) ? $customer->birth_date->format('Y-m-d') : '') }}"
                        >
                    </div>
                </div>

            </div>

            @include('admin.layout.components.error-messages')

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-md btn-primary mt-1 float-right">
                        {{ isset($customer) ? 'Update' : 'Create' }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
