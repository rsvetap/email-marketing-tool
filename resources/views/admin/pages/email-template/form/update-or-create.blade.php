<form method="post"
      action="{{ isset($template) ? route('admin.email-template.update', $template) : route('admin.email-template.store') }}">
    @csrf
    @method(isset($template) ? 'PUT' : 'POST')
    <div class="form-row">
        <div class="col-12">
            <div class="form-group">
                <label for="template_name">Template Name</label>
                <input type="text"
                       class="form-control"
                       id="template_name"
                       name="template_name"
                       value="{{ old('template_name', isset($template) ? $template->template_name : '') }}"
                       required>
            </div>
        </div>
    </div><!-- Template Name -->
    <div class="form-row">
        <div class="col-12">
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text"
                       class="form-control"
                       id="subject"
                       name="subject"
                       value="{{ old('subject', isset($template) ? $template->subject : '') }}"
                       required>
            </div>
        </div>
    </div><!-- Subject -->

    <div class="form-group">
        @include('admin.layout.components.form.ckeditor', [
            'title'    => 'Body (placeholders keys must be inside curly brackets @{{ key }} ): ',
            'id'       => 'body',
            'name'     => 'body',
            'value'    => old('body', isset($template) ? $template->body : ''),
            'language' => 'en',
            'height' => '600',
        ])
    </div><!-- Text Body -->

    <div class="row">
        <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-md btn-primary mt-1">
                {{ isset($template) ? 'Update' : 'Create' }}
            </button>
        </div>
    </div>
</form>
