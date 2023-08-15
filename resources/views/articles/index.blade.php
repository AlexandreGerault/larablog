<x-guest-layout>
    <main class="max-w-5xl mx-auto md:px-6 md:py-12">
        <h1>Derniers articles publiés</h1>

        <section class="grid gap-4 md:grid-cols-2">
            @foreach($articles as $article)
            <article id="article-{{ $article->id }}" class="px-12 py-6 bg-white shadow rounded flex flex-col gap-2 justify-between">
                <header>
                    <h2 class="font-bold text-primary-500">{{ $article->title }}</h2>
                    <p class="text-sm text-gray-500">{{ $article->created_at }}</p>
                </header>

                <p class="text-sm text-gray-500">{{ $article->chapo }}</p>

                <footer class="flex justify-end">
                    <a href="{{ route('article.show', $article) }}" class="text-sm px-4 py-2 rounded bg-primary-500 text-white hover:bg-primary-700 transition">
                        Lire la suite
                    </a>
                </footer>
            </article>
            @endforeach
        </section>
    </main>
</x-guest-layout>
