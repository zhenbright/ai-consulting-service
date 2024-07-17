<div>
    <p><strong>{{ trans('core/base::tables.name') }}</strong>: {{ $quote->name }}</p>
    <p><strong>{{ trans('core/base::tables.email') }}</strong>: {{ $quote->email }}</p>

    <hr>

    @foreach ($quote->fields as $key => $field)
        @if ($field)
            <p><strong>{{ $key }}</strong>: {{ $field }}</p>
        @endif
    @endforeach

    @if ($quote->message)
        <hr>

        <div class="p-3 rounded-1 bg-secondary text-black bg-opacity-10 mb-3">
            <p class="mb-0">{{ $quote->message }}</p>
        </div>
    @endif
</div>
