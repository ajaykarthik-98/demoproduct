@extends('layouts.bootstrap')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<div class="hero-wrap ftco-degree-bg" style="background-image: url('{{ asset('carbook-master/images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
            <div class="col-lg-8 ftco-animate">
                <div class="text w-100 text-center mb-md-5 pb-md-5">
                    <h1 class="mb-4">Fast &amp; Easy Way To Rent A Car</h1>
                    <p style="font-size: 18px;">A small river named Duden flows by their place...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Booking Form Section -->
<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-12 featured-top">
                <div class="row no-gutters">
                    <div class="col-md-4 d-flex align-items-center">
                        <form action="{{ route('booking.store') }}" method="POST" class="request-form ftco-animate bg-primary p-4" id="bookingForm">
                            @csrf

                            <h2 class="mb-4">Make Your Trip</h2>

                            <div class="row">

                                <!-- Pickup Type -->
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="label d-block">Pick-up Type <span class="text-danger">*</span></label>
                                        <div class="form-check form-check-inline text-white">
                                            <input class="form-check-input" type="radio" name="pickup_type" id="pickup_door" value="door" checked required>
                                            <label class="form-check-label" for="pickup_door">Door</label>
                                        </div>
                                        <div class="form-check form-check-inline text-white">
                                            <input class="form-check-input" type="radio" name="pickup_type" id="pickup_office" value="office" required>
                                            <label class="form-check-label" for="pickup_office">Office</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delivery Type -->
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="label d-block text-white">Delivery Type <span class="text-danger">*</span></label>
                                        <div class="d-flex align-items-center">
                                            <input type="radio" name="delivery_type" id="delivery_door" value="door" checked class="mr-2" required>
                                            <label for="delivery_door" class="mb-0 text-white">Door Collection</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pickup Details -->
                            <h5 class="text-white mb-2 mt-3">Pick-up Details</h5>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label">Phone <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Phone" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="label">Address <span class="text-danger">*</span></label>
                                <input type="text" id="pickup_address" class="form-control" autocomplete="off" required>
                                <div id="pickup_suggestions" class="list-group position-absolute w-100" style="z-index: 9999;"></div>
                            </div>

                            <!-- Drop-off -->
                            <h5 class="text-white mb-2 mt-3">Delivery Details</h5>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label">Phone <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Phone" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="label">Address <span class="text-danger">*</span></label>
                                <input type="text" id="drop_address" class="form-control" autocomplete="off" required>
                                <div id="drop_suggestions" class="list-group position-absolute w-100" style="z-index: 9999;"></div>
                            </div>

                            <!-- Date & Time -->
                            <div class="d-flex">
                                <div class="form-group mr-2">
                                    <label class="label">Pick-up date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="pick_date" name="pick_date" required>
                                </div>

                                <div class="form-group">
                                    <label class="label">Pick-up time <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="time_pick" required>
                                </div>
                            </div>

                            <div class="form-group mt-4">
                                <button type="button" id="openDisclaimer" class="btn btn-secondary py-3 px-4">
                                    Book Delivery
                                </button>
                            </div>

                        </form>
                    </div>

                    <div class="col-md-8 d-flex align-items-center">
                        <div class="services-wrap rounded-right w-100">
                            <h3 class="heading-section mb-4">Better Way to Rent Your Perfect</h3>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<!-- Disclaimer Modal -->
<div class="modal fade" id="disclaimerModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Disclaimer</h5>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <div class="modal-body">

                <ul>
                    <li>All goods are accepted for transportation strictly at the owner’s risk.</li>
                    <li>The company shall not be liable for any damage, breakage, leakage, theft, pilferage, delay, or loss arising due to accidents, handling, natural calamities, or improper packing by the consignor.</li>
                    <li>The consignor must disclose fragile, hazardous, high-value, or perishable items before booking. Failure to declare may void any claim.</li>
                    <li>The company does not provide insurance unless requested by the consignor in writing.</li>
                    <li>Delivery time mentioned is only an estimate, and may vary due to traffic, weather, or operational reasons.</li>
                    <li>Any complaints or claims must be reported within 24 hours of delivery.</li>
                </ul>

                <hr>

                <ul>
                    <li>எல்லா பொருள்களும் உரிமையாளரின் ஆபத்தில் மட்டுமே ஏற்றுக்கொள்ளப்படும்.</li>
                    <li>விபத்து, கையாளுதல், இயற்கை பேரழிவு, அல்லது அனுப்புநரின் தவறான பேக்கிங் காரணமாக ஏற்படும் சேதம், உடைப்பு, சிதைவு, திருட்டு, பறிப்பு, தாமதம் முதலியவற்றிற்குப் நிறுவனம் எந்த வகையிலும் பொறுப்பல்ல.</li>
                    <li>மெத்தையானவை, ஆபத்தானவை, அதிக மதிப்புள்ளவை அல்லது விரைவில் கெடுபவை போன்ற பொருட்கள் முன்பே அறிவிக்கப்பட வேண்டும். அறிவிக்கத் தவறினால் எந்தவொரு கோரிக்கையும் செல்லாது.</li>
                    <li>அனுப்புநர் எழுத்து மூலம் கோரினால் மட்டுமே காப்பீடு வழங்கப்படும்.</li>
                    <li>குறிப்பிட்ட டெலிவரி நேரம் கணிப்பாகும்; போக்குவரத்து, காலநிலை அல்லது செயல்பாட்டு காரணங்களால் மாறலாம்.</li>
                    <li>எந்தவொரு புகார் அல்லது கோரிக்கையும் டெலிவரியின் 24 மணி நேரத்திற்குள் அறிவிக்கப்பட வேண்டும்.</li>
                </ul>

                <div class="form-check mt-3 d-flex align-items-center">
                    <input class="form-check-input me-2" type="checkbox" id="agreeCheckbox" required>
                    <label class="form-check-label mb-0" for="agreeCheckbox">I agree to the terms <span class="text-danger">*</span></label>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" id="confirmBtn" class="btn btn-primary" disabled>OK</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelBtn">Cancel</button>
            </div>

        </div>
    </div>
</div>

<!-- Scripts -->
<script>
    document.addEventListener("DOMContentLoaded", function() {

        const bookingForm = document.getElementById('bookingForm');
        const modal = new bootstrap.Modal(document.getElementById('disclaimerModal'));

        document.getElementById('openDisclaimer').onclick = () => modal.show();

        document.getElementById('agreeCheckbox').onchange = function() {
            document.getElementById('confirmBtn').disabled = !this.checked;
        };

        document.getElementById('confirmBtn').onclick = function() {
            modal.hide();
            bookingForm.submit();
        };

        // Fix: Cancel closes modal and resets form
        document.getElementById('cancelBtn').onclick = function() {
            modal.hide();
            bookingForm.reset();
        };
    });
</script>

<!-- PositionStack Autocomplete Script -->
<script>
    document.addEventListener("DOMContentLoaded", function() {

        function setupAutocomplete(inputId, boxId) {
            const input = document.getElementById(inputId);
            const box = document.getElementById(boxId);

            input.addEventListener("keyup", function() {
                let query = input.value.trim();

                if (query.length < 2) {
                    box.innerHTML = "";
                    return;
                }

                fetch(`https://api.positionstack.com/v1/forward?access_key=key&query=${query}, Theni&limit=5`)
                    .then(res => res.json())
                    .then(data => {
                        box.innerHTML = "";

                        if (!data.data) return;

                        data.data.forEach(item => {
                            if (item.label) {
                                let option = document.createElement("a");
                                option.classList.add("list-group-item", "list-group-item-action");
                                option.textContent = item.label;

                                option.onclick = function() {
                                    input.value = item.label;
                                    box.innerHTML = "";
                                };

                                box.appendChild(option);
                            }
                        });
                    })
                    .catch(error => console.log(error));
            });
        }

        setupAutocomplete("pickup_address", "pickup_suggestions");
        setupAutocomplete("drop_address", "drop_suggestions");
    });
</script>
