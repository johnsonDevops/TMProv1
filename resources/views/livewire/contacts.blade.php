<div>

    {{-- -------------------------- --}}
    <style>
        .is-hidden {
            display: none;
        }

        .none {
            display: none;
        }
    </style>
    <script>
        function liveSearch() {
            // Locate the card elements
            let cards = document.querySelectorAll('.cards')
            // Locate the search input
            let search_query = document.getElementById("searchbox").value;
            // Loop through the cards
            for (var i = 0; i < cards.length; i++) {
                // If the text is within the card...
                if (cards[i].innerText.toLowerCase()
                    // ...and the text matches the search query...
                    .includes(search_query.toLowerCase())) {
                    // ...remove the `.is-hidden` class.
                    cards[i].classList.remove("is-hidden");
                } else {
                    // Otherwise, add the class.
                    cards[i].classList.add("is-hidden");
                }
            }
        }
    </script>

    <div class="pt-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
            <div class="bg-white p-5 overflow-hidden shadow sm:rounded-lg relative">

                <label for="searchbox" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" oninput="liveSearch()" id="searchbox"
                        class="block w-full p-4 pl-10 text-normal border border-gray-300 rounded-lg bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Search ...">

                    <button wire:click="$emit('refreshDirectory')" onClick="window.location.reload()"
                        onclick="document.getElementById('searchbox').value = ''"
                        class="text-white absolute right-2.5 bottom-2.5 bg-indigo-500 hover:bg-indigo-500 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2">
                        Reset
                    </button>
                </div>
                {{-- -------------------------- --}}
                <div class="hidden md:block">
                    <ul
                        class="mt-4 items-center w-full text-xs font-medium text-gray-900 bg-white border border-gray-200 sm:flex  ">


                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                            <div class="flex items-center pl-3">
                                <input id="allBtn" type="radio" value="" name="list-radio"
                                class="w-4 h-4 text-pink-400 bg-gray-100 border-gray-300 focus:ring-pink-400  focus:ring-2  ">
                            <label for="allBtn"
                                class="truncate overflow-hidden w-full py-3 ml-2 text-xs font-medium text-gray-900 ">All</label>
                            </div>
                        </li>


                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                            <div class="flex items-center pl-3">
                                <input id="productionBtn" type="radio" value="" name="list-radio"
                                    class="w-4 h-4 text-pink-400 bg-gray-100 border-gray-300 focus:ring-pink-400  focus:ring-2">
                                <label for="productionBtn"
                                    class="truncate w-full py-3 ml-2 text-xsfont-medium text-gray-900 ">Production</label>
                            </div>
                        </li>

                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                            <div class="flex items-center pl-3">
                                <input id="miscBtn" type="radio" value="" name="list-radio"
                                    class="w-4 h-4 text-pink-400 bg-gray-100 border-gray-300 focus:ring-pink-400  focus:ring-2  ">
                                <label for="miscBtn"
                                    class="truncate overflow-hidden w-full py-3 ml-2 text-xs font-medium text-gray-900 ">Misc.</label>
                            </div>
                        </li>

                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                            <div class="flex items-center pl-3">
                                <input id="drBtn" type="radio" value="" name="list-radio"
                                    class="w-4 h-4 text-pink-400 bg-gray-100 border-gray-300 focus:ring-pink-400 focus:ring-2  ">
                                <label for="drBtn"
                                    class="truncate w-full py-3 ml-2 text-xs font-medium text-gray-900 ">Dressing
                                    Room</label>
                            </div>
                        </li>

                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                            <div class="flex items-center pl-3">
                                <input id="powerBtn" type="radio" value="" name="list-radio"
                                    class="w-4 h-4 text-pink-400 bg-gray-100 border-gray-300 focus:ring-pink-400    focus:ring-2  ">
                                <label for="powerBtn"
                                    class="truncate w-full py-3 ml-2 text-xs font-medium text-gray-900 ">Power</label>
                            </div>
                        </li>
                    </ul>
                    {{-- --------------------------------------- --}}

                    <ul
                        class="mt-4 items-center w-full text-xs font-medium text-gray-900 bg-white border border-gray-200 sm:flex  ">

                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                            <div class="flex items-center pl-3">
                                <input id="audioBtn" type="radio" value="" name="list-radio"
                                    class="w-4 h-4 text-pink-400 bg-gray-100 border-gray-300 focus:ring-pink-400    focus:ring-2  ">
                                <label for="audioBtn"
                                    class="truncate w-full py-3 ml-2 text-xs font-medium text-gray-900 ">Audio</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                            <div class="flex items-center pl-3">
                                <input id="wardrobeBtn" type="radio" value="" name="list-radio"
                                    class="w-4 h-4 text-pink-400 bg-gray-100 border-gray-300 focus:ring-pink-400    focus:ring-2  ">
                                <label for="wardrobeBtn"
                                    class="truncate w-full py-3 ml-2 text-xs font-medium text-gray-900 ">Wardrobe</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                            <div class="flex items-center pl-3">
                                <input id="securityBtn" type="radio" value="" name="list-radio"
                                    class="w-4 h-4 text-pink-400 bg-gray-100 border-gray-300 focus:ring-pink-400    focus:ring-2  ">
                                <label for="securityBtn"
                                    class="truncate w-full py-3 ml-2 text-xs font-medium text-gray-900 ">Security</label>
                            </div>
                        </li>

                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                            <div class="flex items-center pl-3">
                                <input id="riggingBtn" type="radio" value="" name="list-radio"
                                    class="w-4 h-4 text-pink-400 bg-gray-100 border-gray-300 focus:ring-pink-400    focus:ring-2  ">
                                <label for="riggingBtn"
                                    class="truncate w-full py-3 ml-2 text-xs font-medium text-gray-900 ">Rigging</label>
                            </div>
                        </li>
                        <li class="w-full  ">
                            <div class="flex items-center pl-3">
                                <input id="carppropBtn" type="radio" value="" name="list-radio"
                                    class="w-4 h-4 text-pink-400 bg-gray-100 border-gray-300 focus:ring-pink-400    focus:ring-2  ">
                                <label for="carppropBtn"
                                    class="truncate w-full py-3 ml-2 text-xs font-medium text-gray-900 ">Carps/Props</label>
                            </div>
                        </li>
                    </ul>

                    {{-- --------------------------------------- --}}

                    <ul
                        class="mt-4 items-center w-full text-xs font-medium text-gray-900 bg-white border border-gray-200 sm:flex  ">

                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                            <div class="flex items-center pl-3">
                                <input id="lightingBtn" type="radio" value="" name="list-radio"
                                    class="w-4 h-4 text-pink-400 bg-gray-100 border-gray-300 focus:ring-pink-400    focus:ring-2  ">
                                <label for="lightingBtn"
                                    class="truncate w-full py-3 ml-2 text-xs font-medium text-gray-900 ">Lighting</label>
                            </div>
                        </li>

                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                            <div class="flex items-center pl-3">
                                <input id="videoBtn" type="radio" value="" name="list-radio"
                                    class="w-4 h-4 text-pink-400 bg-gray-100 border-gray-300 focus:ring-pink-400    focus:ring-2  ">
                                <label for="videoBtn"
                                    class="truncate w-full py-3 ml-2 text-xs font-medium text-gray-900 ">Video</label>
                            </div>
                        </li>


                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                            <div class="flex items-center pl-3">
                                <input id="autoBtn" type="radio" value="" name="list-radio"
                                    class="w-4 h-4 text-pink-400 bg-gray-100 border-gray-300 focus:ring-pink-400    focus:ring-2  ">
                                <label for="autoBtn"
                                    class="truncate w-full py-3 ml-2 text-xs font-medium text-gray-900 ">Automation</label>
                            </div>
                        </li>


                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                            <div class="flex items-center pl-3">
                                <input id="sfxBtn" type="radio" value="" name="list-radio"
                                    class="w-4 h-4 text-pink-400 bg-gray-100 border-gray-300 focus:ring-pink-400    focus:ring-2  ">
                                <label for="sfxBtn"
                                    class="truncate w-full py-3 ml-2 text-xs font-medium text-gray-900 ">Sfx</label>
                            </div>
                        </li>


                        <li class="w-full  ">
                            <div class="flex items-center pl-3">
                                <input id="barrierBtn" type="radio" value="" name="list-radio"
                                    class="w-4 h-4 text-pink-400 bg-gray-100 border-gray-300 focus:ring-pink-400    focus:ring-2  ">
                                <label for="barrierBtn"
                                    class="truncate w-full py-3 ml-2 text-xs font-medium text-gray-900 ">Barrier</label>
                            </div>
                        </li>

                    </ul>
                    {{-- --------------------------------------- --}}

                    <ul
                        class="mt-4 items-center w-full text-xs font-medium text-gray-900 bg-white border border-gray-200 sm:flex  ">

                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                            <div class="flex items-center pl-3">
                                <input id="cateringBtn" type="radio" value="" name="list-radio"
                                    class="w-4 h-4 text-pink-400 bg-gray-100 border-gray-300 focus:ring-pink-400    focus:ring-2  ">
                                <label for="cateringBtn"
                                    class="truncate w-full py-3 ml-2 text-xs font-medium text-gray-900 ">Catering</label>
                            </div>
                        </li>


                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                            <div class="flex items-center pl-3">
                                <input id="merchBtn" type="radio" value="" name="list-radio"
                                    class="w-4 h-4 text-pink-400 bg-gray-100 border-gray-300 focus:ring-pink-400    focus:ring-2  ">
                                <label for="merchBtn"
                                    class="truncate w-full py-3 ml-2 text-xs font-medium text-gray-900 ">Merch</label>
                            </div>
                        </li>


                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                            <div class="flex items-center pl-3">
                                <input id="lnBtn" type="radio" value="" name="list-radio"
                                    class="w-4 h-4 text-pink-400 bg-gray-100 border-gray-300 focus:ring-pink-400    focus:ring-2  ">
                                <label for="lnBtn"
                                    class="truncate w-full py-3 ml-2 text-xs font-medium text-gray-900 ">Live
                                    Nation Touring</label>
                            </div>
                        </li>

                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                            <div class="flex items-center pl-3">
                                <input id="mgtBtn" type="radio" value="" name="list-radio"
                                    class="w-4 h-4 text-pink-400 bg-gray-100 border-gray-300 focus:ring-pink-400    focus:ring-2  ">
                                <label for="mgtBtn"
                                    class="truncate w-full py-3 ml-2 text-xs font-medium text-gray-900 ">Management</label>
                            </div>
                        </li>


                        <li class="w-full">
                            <div class="flex items-center pl-3">
                                <input id="createBtn" type="radio" value="" name="list-radio"
                                    class="w-4 h-4 text-pink-400 bg-gray-100 border-gray-300 focus:ring-pink-400    focus:ring-2  ">
                                <label for="createBtn"
                                    class="truncate w-full py-3 ml-2 text-xs font-medium text-gray-900 ">Creative</label>
                            </div>
                        </li>

                    </ul>

                    {{-- --------------------------------------- --}}

                    <ul
                        class="mt-4 items-center w-full text-xs font-medium text-gray-900 bg-white border border-gray-200 ">


                        <li class="inline-block">
                            <div class="flex items-center pl-3">
                                <input id="vendorBtn" type="radio" value="" name="list-radio"
                                    class="w-4 h-4 text-pink-400 bg-gray-100 border-gray-300 focus:ring-pink-400    focus:ring-2  ">
                                <label for="vendorBtn"
                                    class="truncate w-full py-3 ml-2 text-xs font-medium text-gray-900 ">Vendors</label>
                            </div>
                        </li>
                        <li class="ml-14 inline-block border-l">
                            <div class="flex items-center pl-3">
                                <input id="backlineBtn" type="radio" value="" name="list-radio"
                                    class="w-4 h-4 text-pink-400 bg-gray-100 border-gray-300 focus:ring-pink-400    focus:ring-2  ">
                                <label for="backlineBtn"
                                    class="truncate w-full py-3 ml-2 text-xs font-medium text-gray-900 ">Backline</label>
                            </div>
                        </li>


                    </ul>

                </div>
            </div>
        </div>
    </div>


    <div class="pt-4 pb-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
            <div class="overflow-hidden bg-white shadow sm:rounded-md">
                <ul role="list">
                    @foreach ($users as $user)
                        <li data-tags="{{ $user->department->dept_name ?? '-----' }}"
                            class="cards item bg-white border-b">

                            <div class="flex items-center px-4 py-4 sm:px-6">
                                <div class="flex min-w-0 flex-1 items-center">
                                    <div class="flex-shrink-0">

                                        @isset($user->profile_photo_path)
                                            <img class="h-12 w-12 rounded-full"
                                                src="{{ $user->profile_photo_path ?? '' }}" alt="">
                                        @endisset



                                        @empty($user->profile_photo_path)
                                            <span
                                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                <img class="h-12 w-12 rounded-full object-cover"
                                                    src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />
                                            </span>
                                        @endempty


                                    </div>
                                    <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                        <div>
                                            <p class="truncate text-sm font-bold">{{ $user->name ?? '' }}</p>
                                            <p class="mt-2 flex items-center text-sm text-gray-500">
                                                <span
                                                    class="truncate capitalize">{{ str_replace('_', ' ', $user->department->dept_name ?? '') }}
                                                    ||
                                                    {{ $user->title ?? '' }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mr-3">
                                    <a href="sms:{{ $user->phone ?? '' }}&body=Hello" class="block">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-pink-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                                        </svg>
                                    </a>
                                </div>

                                <div class="mr-3">
                                    <a href="mailto:{{ $user->email ?? '' }}" class="block ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-pink-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="2">
                                    <a href="tel:{{ $user->phone ?? '' }}" class="block">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-pink-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <span class="none">{{ $user->alias ?? '' }}
                        </li>
                    @endforeach
            </div>
        </div>
    </div>


    <script>
        const items = document.getElementsByClassName("item");

        showTag = (event, tag) => {
            for (let i = 0; i < items.length; i++) {
                if (tag === "all" || items[i].dataset.tags.includes(tag)) {
                    items[i].style.display = "block";
                } else {
                    items[i].style.display = "none";
                }
            }
        }

        document.getElementById("allBtn").addEventListener("click", (event) => showTag(event, 'all'));

        document.getElementById("productionBtn").addEventListener("click", (event) => showTag(event, 'production'));
        document.getElementById("miscBtn").addEventListener("click", (event) => showTag(event, 'misc'));
        document.getElementById("drBtn").addEventListener("click", (event) => showTag(event, 'dressing_room'));
        document.getElementById("powerBtn").addEventListener("click", (event) => showTag(event, 'power'));
        document.getElementById("backlineBtn").addEventListener("click", (event) => showTag(event, 'backline'));
        document.getElementById("audioBtn").addEventListener("click", (event) => showTag(event, 'audio'));
        document.getElementById("wardrobeBtn").addEventListener("click", (event) => showTag(event, 'wardrobe'));
        document.getElementById("securityBtn").addEventListener("click", (event) => showTag(event, 'security'));
        document.getElementById("riggingBtn").addEventListener("click", (event) => showTag(event, 'rigging'));
        document.getElementById("carppropBtn").addEventListener("click", (event) => showTag(event, 'carps_props'));
        document.getElementById("lightingBtn").addEventListener("click", (event) => showTag(event, 'lighting'));
        document.getElementById("videoBtn").addEventListener("click", (event) => showTag(event, 'video'));
        document.getElementById("autoBtn").addEventListener("click", (event) => showTag(event, 'automation'));
        document.getElementById("sfxBtn").addEventListener("click", (event) => showTag(event, 'sfx'));
        document.getElementById("barrierBtn").addEventListener("click", (event) => showTag(event, 'barrier'));
        document.getElementById("cateringBtn").addEventListener("click", (event) => showTag(event, 'catering'));
        document.getElementById("merchBtn").addEventListener("click", (event) => showTag(event, 'merch'));
        document.getElementById("lnBtn").addEventListener("click", (event) => showTag(event, 'live_nation_touring'));
        document.getElementById("mgtBtn").addEventListener("click", (event) => showTag(event, 'management'));
        document.getElementById("createBtn").addEventListener("click", (event) => showTag(event, 'creative'));
        document.getElementById("vendorBtn").addEventListener("click", (event) => showTag(event, 'vendors'));
    </script>




    {{-- -------------------------- --}}
</div>
