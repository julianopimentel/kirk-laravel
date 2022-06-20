<x-guest-layout>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>

    <div class="gradient">
        <div class="container">
            <img src="{{ asset('images/error/404.png') }}" class="img-fluid mb-4 w-50" alt="">
            <h2 class="mb-0 mt-4 text-white">Oops! This Page is Not Found.</h2>
            <p class="mt-2 text-white">The requested page dose not exist.</p>
            <a class="btn bg-white text-primary d-inline-flex align-items-center" href="{{ route('home.index') }}">Back
                to
                Home</a>
        </div>
        <div class="box">
            <div class="c xl-circle">
                <div class="c lg-circle">
                    <div class="c md-circle">
                        <div class="c sm-circle">
                            <div class="c xs-circle">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://browser.sentry-cdn.com/7.2.0/bundle.min.js"
        integrity="sha384-yvW0r7aI4VkwNfs/eOzYsODvXkNVQon3MBtow61jPf/pOR166EPvTSNBr9nG3C3y" crossorigin="anonymous">
    </script>
    <script src='https://js.sentry-cdn.com/97d1e62d2762401688a954bdecf330cd.min.js' crossorigin="anonymous"></script>
    <script>
        Sentry.init({
            dsn: "https://97d1e62d2762401688a954bdecf330cd@o1292892.ingest.sentry.io/6515130",
            beforeSend(event, hint) {
                // Check if it is an exception, and if so, show the report dialog
                if (event.exception) {
                    Sentry.showReportDialog({
                        eventId: event.event_id
                    });
                }
                return event;
            },
        });
    </script>
</x-guest-layout>
