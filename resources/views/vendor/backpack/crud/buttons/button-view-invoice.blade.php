@if ($crud->hasAccess('update'))
    <a class="btn btn-sm btn-link" target="_blank" href="{{ url($crud->route . '/' . $entry->getKey() . '/view') }}"
        data-toggle="tooltip"><i class="la la-eye"></i> Invoice</a>
@endif
