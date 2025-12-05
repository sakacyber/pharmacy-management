{{-- THE ACTUAL CONTENT --}}
<div class="{{ $crud->getListContentClass() }}">

    <div class="row mb-0">
        <div class="col-sm-6">
            @if ($crud->buttons()->where('stack', 'top')->count() || $crud->exportButtons())
                <div class="d-print-none {{ $crud->hasAccess('create') ? 'with-border' : '' }}">

                    @include('crud::inc.button_stack', ['stack' => 'top'])

                </div>
            @endif
        </div>
        <div class="col-sm-6">
            <div id="datatable_search_stack" class="mt-sm-0 d-print-none mt-2"></div>
        </div>
    </div>

    {{-- Backpack List Filters --}}
    @if ($crud->filtersEnabled())
        @include('crud::inc.filters_navbar')
    @endif

    <table id="crudTable" class="table-striped table-hover nowrap shadow-xs border-xs mt-2 table rounded bg-white"
        data-responsive-table="{{ (int) $crud->getOperationSetting('responsiveTable') }}"
        data-has-details-row="{{ (int) $crud->getOperationSetting('detailsRow') }}"
        data-has-bulk-actions="{{ (int) $crud->getOperationSetting('bulkActions') }}"
        data-has-line-buttons-as-dropdown="{{ (int) $crud->getOperationSetting('lineButtonsAsDropdown') }}"
        cellspacing="0">
        <thead>
            <tr>
                {{-- Table columns --}}
                @foreach ($crud->columns() as $column)
                    <th data-orderable="{{ var_export($column['orderable'], true) }}"
                        data-priority="{{ $column['priority'] }}" data-column-name="{{ $column['name'] }}"
                        {{--
                    data-visible-in-table => if developer forced field in table with 'visibleInTable => true'
                    data-visible => regular visibility of the field
                    data-can-be-visible-in-table => prevents the column to be loaded into the table (export-only)
                    data-visible-in-modal => if column apears on responsive modal
                    data-visible-in-export => if this field is exportable
                    data-force-export => force export even if field are hidden
                    --}} {{-- If it is an export field only, we are done. --}}
                        @if (isset($column['exportOnlyField']) && $column['exportOnlyField'] === true) data-visible="false"
                      data-visible-in-table="false"
                      data-can-be-visible-in-table="false"
                      data-visible-in-modal="false"
                      data-visible-in-export="true"
                      data-force-export="true"
                    @else
                      data-visible-in-table="{{ var_export($column['visibleInTable'] ?? false) }}"
                      data-visible="{{ var_export($column['visibleInTable'] ?? true) }}"
                      data-can-be-visible-in-table="true"
                      data-visible-in-modal="{{ var_export($column['visibleInModal'] ?? true) }}"
                      @if (isset($column['visibleInExport']))
                         @if ($column['visibleInExport'] === false)
                           data-visible-in-export="false"
                           data-force-export="false"
                         @else
                           data-visible-in-export="true"
                           data-force-export="true" @endif
                    @else data-visible-in-export="true" data-force-export="false" @endif
                @endif
                >
                {{-- Bulk checkbox --}}
                @if ($loop->first && $crud->getOperationSetting('bulkActions'))
                    {!! View::make('crud::columns.inc.bulk_actions_checkbox')->render() !!}
                @endif
                {!! $column['label'] !!}
                </th>
                @endforeach

                @if ($crud->buttons()->where('stack', 'line')->count())
                    <th data-orderable="false" data-priority="{{ $crud->getActionsColumnPriority() }}"
                        data-visible-in-export="false" data-action-column="true">{{ trans('backpack::crud.actions') }}
                    </th>
                @endif
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                {{-- Table columns --}}
                @foreach ($crud->columns() as $column)
                    <th>
                        {{-- Bulk checkbox --}}
                        @if ($loop->first && $crud->getOperationSetting('bulkActions'))
                            {!! View::make('crud::columns.inc.bulk_actions_checkbox')->render() !!}
                        @endif
                        {!! $column['label'] !!}
                    </th>
                @endforeach

                @if ($crud->buttons()->where('stack', 'line')->count())
                    <th>{{ trans('backpack::crud.actions') }}</th>
                @endif
            </tr>
        </tfoot>
    </table>

    @if ($crud->buttons()->where('stack', 'bottom')->count())
        <div id="bottom_buttons" class="d-print-none text-sm-left text-center">
            @include('crud::inc.button_stack', ['stack' => 'bottom'])

            <div id="datatable_button_stack" class="hidden-xs float-right text-right"></div>
        </div>
    @endif

</div>
