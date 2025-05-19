<select class="form-select form-select-lg custom-selct2"
@foreach ($options as $key => $value)
    {{ $key }}="{{ is_array($value) ? json_encode($value) : $value }}"
@endforeach
>
<!-- Options will be dynamically loaded -->
</select>
<div class="select2-error text-danger mt-1" style="display: none;">
    An error occurred while loading options. Please try again.
</div>

@push('header')
    <style>
        .select2-container--bootstrap5
        .select2-selection--multiple
        .select2-selection__rendered
        .select2-selection__choice
        .select2-selection__choice__remove {
            left: 6px !important;
        }

        .select2-dropdown .select2-results__option {
            padding: 0.75rem 2.25rem !important;
        }
    </style>
@endpush

@push('footer')
    <script>
        $(document).ready(function() {
            $('.custom-selct2').each(function() {
                let $select = $(this);
                let $errorDiv = $select.next('.select2-error');

                // Collect all data-* attributes dynamically
                let select2Options = {
                    ajax: {
                        url: $select.data('url'),
                        dataType: 'json',
                        delay: $select.data('delay') || 250,
                        data: function(params) {
                            // Start with default params
                            let queryParams = {
                                search: params.term || '', // Search term
                                page: params.page || 1    // Pagination page
                            };

                            // Add extra filters dynamically from data-* attributes
                            let extraFilters = $select.data('filters'); // Expecting a JSON object in data-filters
                            if (extraFilters && typeof extraFilters === 'object') {
                                queryParams = { ...queryParams, ...extraFilters };
                            }

                            return queryParams;
                        },
                        processResults: function(data, params) {
                            const page = params.page || 1;

                            $errorDiv.hide(); // Hide error message on success
                            return {
                                results: data.data.map(item => ({
                                    id: item.id,
                                    text: item.title || item.name || item.label || item.value
                                })),
                                pagination: {
                                    more: (page * 20) < data.meta.total // Indicates if more pages are available
                                }
                            };
                        },
                        error: function() {
                            $errorDiv.show(); // Show error message on failure
                        },
                        cache: $select.data('cache') || true
                    }
                };

                // Fetch and set default selected items if data-selected is provided
                let selectedIds = $select.data('selected');


                if (selectedIds && Array.isArray(selectedIds) && selectedIds.length > 0) {
                    $.ajax({
                        url: $select.data('url'),
                        dataType: 'json',
                        data: { ids: selectedIds }, // Pass selected IDs to the API
                        success: function(data) {
                            let preselectedData = data.data.map(item => ({
                                id: item.id,
                                text: item.title || item.name || item.label || item.value
                            }));
                            preselectedData.forEach(item => {
                                let option = new Option(item.text, item.id, true, true);
                                $select.append(option).trigger('change');
                            });
                        },
                        error: function() {
                            console.error('Failed to fetch default selected items.');
                        }
                    });
                }

                // Initialize select2 with dynamic options
                $select.select2(select2Options);
            });
        });
    </script>
@endpush
