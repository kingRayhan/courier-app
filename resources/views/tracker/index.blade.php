<x-app-layout>
    <x-slot name="pageTitle">
        Tracking #{{ $tracking_id }}
    </x-slot>

    <div class="container my-5">
        <div class="columns">
            <div class="column is-2">
                Tracking ID <br>
                {{ $tracking_id }}
            </div>
            <div class="column is-6">
                <div class="timeline">
                    <header class="timeline-header">
                        <span class="tag is-medium is-primary">শুরু</span>
                    </header>

                    @foreach($tracking_messages as $item)
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <div class="timeline-content">
                                <p class="heading">{{$item->created_at->format('d F Y')}}</p>
                                <p>{{ $item->status_message }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            <div class="column is-4 bg-gray-200 shadow">
                <h3 class=" text-2xl">কাস্টমার ও অর্ডারের বিস্তারিত তথ্য</h3>
                <hr class=" border-red-500 border-2 w-12">

                <div class="level mt-4">
                    <div class="level-left">গ্রাহক এর নাম</div>
                    <div class="level-right">{{ $parcel->customer_name }}</div>
                </div>

                <div class="level">
                    <div class="level-left">গ্রাহক ফোন নম্বর</div>
                    <div class="level-right">{{ $parcel->customer_phone }}</div>
                </div>

                <div class="level">
                    <div class="level-left">গ্রাহক ঠিকানা</div>
                    <div class="level-right">{{ $parcel->customer_address }}</div>
                </div>

                <div class="level">
                    <div class="level-left">পার্সেল এর ওজন</div>
                    <div class="level-right">{{ $parcel->weight }} কেজি</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
