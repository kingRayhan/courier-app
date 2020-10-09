<div class="card">
    <div class="card-header">
        <div class="card-header-title">ট্র্যাকিং ম্যাসেজ সমূহ</div>
    </div>
    <div class="card-content">

        {{$parcel->trackings}}

        <textarea class="textarea @error('message') is-danger @enderror" name="status_message" wire:model="message"
                  cols="30" rows="2"></textarea>

        @error('message')
        <p class="help is-danger">
            {{$message}}
        </p>
        @enderror


        <button class="button is-danger is-small mt-2" wire:click="submit">নতুন ম্যাসেজ যুক্ত করুন</button>
    </div>
</div>
