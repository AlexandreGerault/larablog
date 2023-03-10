<x-guest-layout>
    <header class="lg:relative">
        <div class="mx-auto max-w-7xl w-full pt-16 pb-20 text-center lg:py-48 lg:text-left">
            <div class="px-4 lg:w-1/2 sm:px-8 xl:pr-16">
                <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl lg:text-5xl xl:text-6xl">
                    <span class="block xl:inline">Alexandre Gérault</span>
                    <span class="block text-indigo-600 xl:inline">Un développeur curieux</span>
                </h1>
                <p class="mt-3 max-w-md mx-auto text-lg text-gray-500 sm:text-xl md:mt-5 md:max-w-3xl">
                    Passionné de développement j&apos;ai commencé à apprendre les notions de bases en autodidacte.
                    Attiré par les sciences j&apos;ai commencé un cursus universitaire de physique avant de me
                    réorienter vers une formation <strong>Développeur d&apos;application Symfony</strong> avec
                    OpenClassrooms, réalisée en alternance avec <em>Hexium</em>.
                </p>
                <div class="mt-10 sm:flex sm:justify-center lg:justify-start">
                    <div class="rounded-md shadow">
                        <a href="{{ asset('files/cv_alexandre_gerault.pdf') }}"
                           class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                            Télécharger mon CV
                        </a>
                    </div>
                    <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                        <a href="/portfolio"
                           class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                            Mes réalisations
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative w-full h-64 sm:h-72 md:h-96 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 lg:h-full">
            <img class="absolute inset-0 w-full h-full object-cover" src="{{ asset('img/photo.jpg') }}" alt="">
        </div>
    </header>

    <hr class="my-16"/>

    <div class="max-w-7xl mx-auto py-16 px-2 sm:px-6 lg:px-8">
        @include('static.about')
    </div>

    @include('partials.contact')
</x-guest-layout>
