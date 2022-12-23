<x-guest-layout>
    <div class="relative py-16 bg-white overflow-hidden">
        <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
            <div class="relative h-full text-lg max-w-prose mx-auto" aria-hidden="true">
                <svg class="absolute top-12 left-full transform translate-x-32" width="404" height="384" fill="none"
                     viewBox="0 0 404 384">
                    <defs>
                        <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20"
                                 patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)"/>
                </svg>
                <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-32" width="404"
                     height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20"
                                 patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)"/>
                </svg>
                <svg class="absolute bottom-12 left-full transform translate-x-32" width="404" height="384" fill="none"
                     viewBox="0 0 404 384">
                    <defs>
                        <pattern id="d3eb07ae-5182-43e6-857d-35c643af9034" x="0" y="0" width="20" height="20"
                                 patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#d3eb07ae-5182-43e6-857d-35c643af9034)"/>
                </svg>
            </div>
        </div>
        <div class="relative px-4 sm:px-6 lg:px-8">
            <div class="text-lg max-w-prose mx-auto">
                <h1>
                    <span class="block text-base text-center text-indigo-600 font-semibold tracking-wide uppercase">{{ $article->updatedAt }}</span>
                    <span
                        class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{ $article->title }}</span>
                </h1>
                <p class="mt-8 text-xl text-gray-500 leading-8">{{ $article->chapo }}</p>
            </div>
            <div class="mt-6 prose prose-indigo prose-lg text-gray-500 mx-auto">
                {{ $article->content }}
            </div>
        </div>
    </div>

    <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8 py-8">
        <h3 class="text-3xl font-bold mb-4">Espace commentaires</h3>

        <div class="bg-white shadow-lg rounded px-8 py-6">
            <form class="flex flex-col gap-4" method="post"
                  action="{{ route('article.comment', $article) }}">
                @csrf
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="flex-1">
                        <label for="email" class="block text-sm font-medium text-gray-700">Adresse mail</label>
                        <div class="mt-1">
                            <input type="email" name="email" id="email"
                                   class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                   placeholder="john@doe">
                        </div>
                    </div>

                    <div class="flex-1">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nom d&apos;utilisateur</label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name"
                                   class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                   placeholder="John Doe">
                        </div>
                    </div>
                </div>


                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700">Commentaire</label>
                    <div class="mt-1">
                        <textarea name="content" id="content"
                                  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                  placeholder="Just loved this article so much"></textarea>
                    </div>
                </div>

                <div class="self-end">
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Poster mon commentaire
                    </button>
                </div>
            </form>

            <section aria-label="comments" class="mt-6">
                @foreach($comments as $comment)
                <article class="px-6 py-4 rounded bg-gray-50">
                    <p class="text-lg font-semibold">
                        {{ $comment->name }}
                        @if($comment->email)
                        <a href="mailto:{{ $comment->email }}" class="text-blue-500 hover:text-blue-800">
                            &lt;{{ $comment->email }}&gt;
                        </a>
                        @endif
                    </p>
                    <p class="text-sm mb-2">{{ $comment->created_at->format('j F Y') }}</p>
                    <div>
                        {{ $comment->content }}
                    </div>
                </article>
                @endforeach
            </section>
        </div>
    </div>
</x-guest-layout>
