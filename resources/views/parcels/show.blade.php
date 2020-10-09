<x-dashboard>

    <x-slot name="pageTitle">
        পার্সেল #{{$parcel->tracking_id}}
    </x-slot>

    <?php
    $price = new \App\BusinessLogic\ParcelPricing($parcel->weight, $parcel->parcel_price);
    $delivery_charge = $price->getDeliveryCost();
    $client_payable = $price->getTotalBill();
    $cod_charge = $price->getCodCharge();
    $merchant_payable = $price->getMerchantPaybackAmount();
    ?>

    <div class="columns">
        <div class="column">

            @if(auth()->user()->is_admin)
                @include('parcels._merchant-info')
            @endif

            <div class="mt-4">
                @include('parcels._client-info')
            </div>

            @if(auth()->user()->is_admin)
                <div class="mt-4">
                    @include('parcels._status-updater')
                </div>
            @else
                <div class="mt-4">
                    @include('parcels._status')
                </div>
            @endif
        </div>

        <div class="column">
            @include('parcels._parcel-info')
            <div class="column">
                <livewire:tracking-messege parcel="{{$parcel->id}}"/>
            </div>
        </div>
</x-dashboard>
