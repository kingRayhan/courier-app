<x-dashboard>
    <div class="columns">
        <div class="column is-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-title">নতুন জোন তৈরি করুন</div>
                </div>
                <div class="card-content">
                    <form action="{{ route('zones.store') }}" method="POST">
                        @csrf
                        <div class="field">
                            <label class="label">নাম</label>
                            <div class="control">
                                <input
                                    class="input @error('name') is-danger @enderror"
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    placeholder="জোন এর নাম">

                                @error('name')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="field">
                            <button class="button is-danger">সেভ করুন</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-dashboard>
