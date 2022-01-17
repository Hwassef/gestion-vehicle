<div>

    <div wire:ignore>
        <select class="select2" id="select2-dropdown">
            <option value="">Select Option</option>
            @foreach($destinations as $item)
            <option value="{{ $item }}">{{ $item }}</option>
            @endforeach
        </select>
    </div>

</div>

@push('scripts')

<script>
   $('select2-dropdown').select2();

</script>

@endpush
