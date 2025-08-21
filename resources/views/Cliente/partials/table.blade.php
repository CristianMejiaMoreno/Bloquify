
{{ $dataTable->table() }}



@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush