<x-layout>

@include('posts._header')

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <x-post-featured-card :post="$posts[0]"/>

           <x-blog-grid :posts="$posts"/>

            <div class="lg:grid lg:grid-cols-3">
        

               
            </div>
        </main>


</x-layout>
