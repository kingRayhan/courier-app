<x-dashboard>

    <x-slot name="headerHook">
        <link rel="stylesheet" href="{{ asset('select2/select2.min.css') }}">
    </x-slot>

    <x-slot name="footerHook">
        <script src="{{ asset('jquery.min.js') }}"></script>
        <script src="{{ asset('select2/select2.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('.select2').select2();
            });
        </script>
    </x-slot>

    <div class="columns">
        <div class="column is-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-title">নতুন দোকান নিবন্ধন করুন</div>
                </div>
                <div class="card-content">
                    <form action="{{ route('shops.store') }}" method="POST">
                        @csrf
                        <div class="field">
                            <label class="label">নাম</label>
                            <div class="control">
                                <input
                                    class="input @error('name') is-danger @enderror"
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    placeholder="দোকানের নাম">
                                @error('name')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">পার্সেল গ্রহণ করার ঠিকানা</label>
                            <div class="control">
                                <textarea
                                    class="textarea @error('pickup_address') is-danger @enderror"
                                    name="pickup_address"
                                    placeholder="পার্সেল গ্রহণ করার ঠিকানা">{{ old('pickup_address') }}</textarea>
                                @error('pickup_address')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">দোকানের ফোন নম্বর</label>
                            <div class="control">
                                <input class="input @error('shop_phone') is-danger @enderror"
                                       type="text"
                                       name="shop_phone"
                                       value="{{ old('shop_phone') }}"
                                       placeholder="দোকানের ফোন নম্বর"/>
                                @error('shop_phone')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">এরিয়া</label>
                            <div class="control has-icons-left">
                                <select class="select2 w-2/3" name="area_id">
                                    <option value="">...</option>
                                    @foreach($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                                    @endforeach
                                </select>
                                @error('area_id')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">জোন</label>
                            <div class="control has-icons-left">
                                <select class="select2 w-2/3" name="zone_id">
                                    <option value="">...</option>
                                    @foreach($zones as $zone)
                                        <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                                    @endforeach
                                </select>
                                @error('zone_id')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        {{--    --}}
                        <div class="field">
                            <button class="button is-danger">সেভ করুন</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-dashboard>
