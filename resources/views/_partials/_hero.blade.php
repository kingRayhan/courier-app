<div class="app-hero hero is-large bg-cover">
    <!-- hero body -->
    <div class="hero-body mx-auto">
        <div class="text-center bg-black inline-block p-5 bg-opacity-50 rounded">
            <h1 class="text-3xl mb-2 text-white">
                আপনার ব্যবসার জন্য নির্ভরযোগ্য ডেলিভারি পার্টনার
            </h1>
            <p class="text-xl text-white">
                ঢাকাসহ সারাদেশে, প্রোডাক্ট ডেলিভার হবে দ্রুততম সময়ে।
            </p>

            <form action="{{route('tracker')}}" method="GET">
                <div class="field has-addons my-5">
                    <div class="control w-full">
                        <input class="input" name="tracking_code" type="text" placeholder="পার্সেল আইডি" required>
                    </div>
                    <div class="control">
                        <button class="button is-danger"> ট্র্যাক করুন</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- hero footer -->
</div>
