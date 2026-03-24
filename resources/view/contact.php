<x-main-layout>

<section class="max-w-4xl mx-auto px-6 py-16">

    <div class="mb-10">
        <h1 class="text-4xl font-bold mb-4">
            Contact Us
        </h1>

        <p class="text-gray-600">
            Have a question, feedback, or need help with NDG Framework?
            Fill out the form below and we'll get back to you as soon as possible.
        </p>
    </div>

    <form class="space-y-6" method="POST" action="/sendmail">
        <?= csrf_field() ?>

        <div>
            <label class="block text-sm font-medium mb-2">
                Name
            </label>

            <input
                type="text"
                placeholder="Your name"
                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                name="name"
            >
        </div>

        <div>
            <label class="block text-sm font-medium mb-2">
                Email
            </label>

            <input
                type="email"
                placeholder="you@example.com"
                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                name="email"
            >
        </div>

        <div>
            <label class="block text-sm font-medium mb-2">
                Message
            </label>

            <textarea
                rows="5"
                placeholder="Write your message..."
                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                name="message"
            ></textarea>
        </div>

        <button
            class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition"
        >
            Send Message
        </button>

    </form>

</section>

</x-main-layout>