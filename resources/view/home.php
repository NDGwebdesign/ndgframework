<x-main-layout>

    <section class="min-h-screen flex flex-col justify-center items-center text-center px-6">

        <!-- Logo / Title -->
        <h1 class="text-5xl font-bold mb-4">
            NDG Framework
        </h1>

        <p class="text-lg text-gray-500 mb-8">
            A modern lightweight PHP framework by NDG Webdesign.
        </p>

        <!-- CTA -->
        <div class="flex gap-4">
            <a href="/docs"
                class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Documentation
            </a>

            <a href="https://github.com/NDGwebdesign"
                class="px-6 py-3 border rounded-lg hover:bg-gray-100 transition" target="_blank">
                GitHub
            </a>
        </div>

    </section>


    <!-- Features -->
    <section class="py-20 bg-gray-50">

        <div class="max-w-5xl mx-auto text-center">

            <h2 class="text-3xl font-semibold mb-10">
                Why NDG Framework?
            </h2>

            <div class="grid md:grid-cols-3 gap-8">

                <div class="p-6 bg-white rounded-xl shadow">
                    <h3 class="font-bold mb-2">⚡ Fast</h3>
                    <p class="text-gray-500">
                        Lightweight architecture without unnecessary overhead.
                    </p>
                </div>

                <div class="p-6 bg-white rounded-xl shadow">
                    <h3 class="font-bold mb-2">🧩 Flexible</h3>
                    <p class="text-gray-500">
                        Build apps your way with simple routing & layouts.
                    </p>
                </div>

                <div class="p-6 bg-white rounded-xl shadow">
                    <h3 class="font-bold mb-2">🎨 Modern</h3>
                    <p class="text-gray-500">
                        Tailwind CSS & Vite ready out of the box.
                    </p>
                </div>

            </div>

        </div>

    </section>


    <!-- Footer note -->
    <section class="text-center py-10 text-gray-400 text-sm">
        NDG Framework — built for developers 🚀
    </section>

</x-main-layout>