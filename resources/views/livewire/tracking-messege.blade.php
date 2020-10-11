@can('create', \App\Models\Tracker::class)
    <div class="card admin" wire:poll.50ms>
        @else
            <div class="card">
                @endcan

                <div class="card-header">
                    <div class="card-header-title">ট্র্যাকিং ম্যাসেজ সমূহ</div>
                </div>
                <div class="card-content">
                    @foreach($tracking_messages as $message)
                        <div class="box justify-between items-center" style="display: flex">
                            <div>
                                <h3>{{ $message->status_message }}</h3>
                                <p class=" text-sm text-gray-600">{{ $message->created_at }}</p>
                            </div>
                            @can('delete', $message)
                                <button wire:click="deleteMessage({{$message->id}})"
                                        class="text-red-500 focus:outline-none">&times;
                                </button>
                            @endcan
                        </div>
                    @endforeach


                    @can('create', \App\Models\Tracker::class)
                        <textarea class="textarea @error('message') is-danger @enderror" name="status_message"
                                  wire:model="message"
                                  cols="30" rows="2"></textarea>
                        @error('message')
                        <p class="help is-danger">
                            {{$message}}
                        </p>
                        @enderror
                        <button class="button is-danger is-small mt-2" wire:click="submit">নতুন ম্যাসেজ যুক্ত করুন
                        </button>
                    @endcan
                </div>
            </div>
