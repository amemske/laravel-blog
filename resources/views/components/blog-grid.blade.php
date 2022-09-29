@props(['posts'])
<div class="lg:grid lg:grid-cols-6">
                
                @foreach ($posts as $post )
                
                   <x-blog-card  :post="$post" class="{{$loop->iteration > 2 ? 'col-span-2' : 'col-span-3'}}"/>
                   @endforeach 
                   
</div>