@foreach ($headAndNeckDetails as $headAndNeckDetail)
    <div class="modal fade" id="{{ $headAndNeckDetail->treatment_id }}" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! $headAndNeckDetail->description !!}
                    {{-- <h5>About {{ $headAndNeckDetail->type }}</h5>
                    {{-- <h5>About Shoulder Post-surgery Rehab</h5>
                    <p>

                        There are a variety of shoulder surgeries that may have to be done in order to stabilize the
                        shoulder, repair damaged tendons or ligaments. With the advances in arthroscopic surgery,
                        recovery
                        times for shoulder injuries have improved, however physical therapy is still needed to reduce
                        pain
                        quickly, restore range of motion, improve strength and return the individual to the normal
                        activities they like to do.</p>

                    <h5>
                        How physical therapy helps
                    </h5>
                    <p>

                        Post-surgery recovery can be difficult on sleeping, bathing, dressing and many other normal
                        daily
                        activities we take for granted. Our physical therapists work with you to teach you how to adapt
                        to
                        these activities of daily living while recovering.
                        Physical therapy focuses on providing you with inflammation and pain control to reduce your pain
                        as
                        quickly as possible while you are recovering. The surgical process can often leave muscles
                        cramped
                        and irritated. Our gentle hands-on therapy is perfect for soothing sore muscles and restoring
                        normal
                        muscle movement.
                    </p>
                    <p>
                        We work closely with your physician on the correct protocol to rehabilitate your shoulder after
                        surgery. Every person’s surgery is unique and rest assured your recovery is treated as such.
                        According to your protocol, we will help restore your range of motion, increase your strength
                        and
                        help you return to normal activities using your shoulder. Call us today to find out more how we
                        can
                        help you have a complete recovery after shoulder surgery!
                    </p> --}}

                </div>
            </div>
        </div>
    </div>
@endforeach
