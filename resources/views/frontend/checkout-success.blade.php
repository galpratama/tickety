<x-frontend.layout>
    @section('title', 'Checkout Success')
    <section class="relative h-screen pt-10 overflow-hidden lg:pb-32">
        <div class="container relative flex flex-col items-center justify-center max-w-screen-xl text-center">
            <img src="{{ asset('assets/svgs/ic-files.svg') }}" alt="tickety-assets">
            <h2 class="mt-[30px] text-[32px] font-bold">
                Success Checkout
            </h2>
            <p class="mt-4 mb-10 text-lg leading-8 text-iron-grey">
                We will send ticket details through your <br class="hidden md:block">
                email, please sit tight and enjoy your time.
            </p>
            <a href="{{ url('/') }}" class="btn-secondary px-[34px]">
                Book Other Ticket
            </a>
        </div>
        <!-- Wavy line ornament -->
        <svg class="absolute -z-10 left-[55%] -translate-x-1/2 md:top-[54%]" width="1798" height="458"
            viewBox="0 0 1798 458" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M1797.06 432.197C1741.36 446.406 1600.85 500.88 1589.35 360.165C1579.75 242.745 1138.42 530.865 1201.96 251.33C1265.5 -28.2063 1470.39 196.792 1366.09 212.908C1261.8 229.024 1174.49 226.894 992.822 48.8456C811.155 -129.202 907.631 273.408 636.93 239.729C330.693 201.629 375.969 -82.7952 3.10449 305.451"
                stroke="#DF82CA" stroke-width="6" />
        </svg>
    </section>
</x-frontend.layout>
