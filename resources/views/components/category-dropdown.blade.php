<x-dropdown>
                    @slot('trigger')
                        <button class="py-2 pl-3 pr-9py-2 pl-3 pr-9 mx-3 bg-transparent placeholder-black font-semibold text-sm lg:w-32 lg:inline-flex">
                            {{isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories'}}
                            <x-icon name="down-arrow"/>
                        </button> 
                    @endslot
                        <x-dropdown-item href="/" :active="request()->routeIs('home')">All</x-dropdown-item>
                        

                            @foreach ($categories as $category)

                            <x-dropdown-item href="/" :active="!$currentCategory">All</x-dropdown-item>
                                @foreach ($categories as $category)
                                    <x-dropdown-item :active='$category->is($currentCategory)'
                                            href="?category={{ $category->slug }}">{{ ucwords($category->name) }}
                                    </x-dropdown-item>
                                @endforeach
                    
                        @endforeach
                    </x-dropdown>