@extends('layouts.app')

@section('content')
    <div>

        <!-- Content -->
        <div class="w-full lg:ps-64">
            <div class="space-y-4 sm:space-y-6">
                <!-- your content goes here ... -->
                <div
                    class="w-full bg-[url('https://ca-times.brightspotcdn.com/dims4/default/25c5c0f/2147483647/strip/true/crop/4096x2160+0+0/resize/1200x633!/quality/75/?url=https%3A%2F%2Fcalifornia-times-brightspot.s3.amazonaws.com%2Fda%2F17%2F3e9f3b0943e7858b45ab542744be%2Fthe-flash-flsh-ff-87683r.jpg')] h-full bg-cover relative bg-center">
                    <div class="absolute inset-0 bg-white/10 backdrop-blur-xl dark:bg-slate-900/60"></div>
                    <div class="relative mx-auto py-5 bg-black/40 backdrop-blur-lg dark:bg-neutral-900/60">

                        <div class="container mx-auto text-center xl:mt-48 xl:mb-5 mt-40 mb-4 w-11/12">

                            <h1 class="text-white uppercase text-3xl xl:text-4xl font-bold tracking-wider leading-3 mt-7 font-keania">The Flash</h1>
                            <ul class="flex gap-4 mt-10 text-white justify-center">
                                <li class="flex items-center space-x-1">
                                    <!-- Star Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-4 h-4 text-yellow-500 fill-yellow-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-4 h-4 text-yellow-500 fill-yellow-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-4 h-4 text-yellow-500 fill-yellow-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-4 h-4 text-yellow-500 fill-yellow-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-4 h-4 text-yellow-500 fill-yellow-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                    </svg>
                                    <!-- Rating -->
                                    <span class="text-gray-300 text-sm">7.5</span>
                                </li>

                                <li class="-my-2.5 text-gray-300 text-2xl"><strong>.</strong></li>
                                <li class="text-gray-300 texst-sm">2018</li>
                            </ul>

                            <ul class="flex gap-4 mt-10 text-white justify-center">
                                <li class="text-gray-300">
                                    <a href=""><span class="text-xs border border-slate-500 dark:border-slate-700 px-5 py-2 rounded-full dark:hover:bg-slate-700 hover:bg-slate-500 font-bold dark:text-slate-400 dark:hover:text-slate-200 cursor-pointer mr-2 focus:bg-slate-500 dark:focus:bg-slate-700">Action</span> </a>
                                    <a href=""><span class="text-xs border border-slate-500 dark:border-slate-700 px-5 py-2 rounded-full dark:hover:bg-slate-700 hover:bg-slate-500 font-bold dark:text-slate-400 dark:hover:text-slate-200 cursor-pointer mr-2 focus:bg-slate-500 dark:focus:bg-slate-700">Drama</span> </a>
                                    <a href=""><span class="text-xs border border-slate-500 px-5 py-2 rounded-full dark:hover:bg-slate-700 hover:bg-slate-500 dark:border-slate-700 font-bold dark:text-slate-400 dark:hover:text-slate-200 cursor-pointer focus:bg-slate-500 dark:focus:bg-slate-700">Adventure</span></a>
                                </li>
                            </ul>

                            <p class="text-white mt-9 leading-relaxed text-sm">
                                Due to unforeseeable circumstances, the Robinsons, a family of space colonists, crash-land
                                on an unknown planet. Now, they must fight for survival and escape, despite the dangers
                                surrounding them.
                            </p>

                            <ul class="flex flex-wrap gap-2 mt-5 justify-center items-center">
                                <li class="bg-blue-600 text-white px-10 py-4 rounded-full uppercase text-xs font-black hover:cursor-pointer hover:bg-blue-700 duration-200"
                                    aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-full-screen-modal"
                                    data-hs-overlay="#hs-full-screen-modal">
                                    <i class="fa fa-play pr-1" aria-hidden="true"></i> <button
                                        class="uppercase">Trailer</button>
                                </li>
                                <li
                                    class="bg-blue-600 text-white px-8 py-4 rounded-full uppercase text-xs font-black hover:cursor-pointer hover:bg-blue-700 duration-200">
                                    <i class="fa-solid fa-plus"></i> <button class="uppercase">Watchlist </button>
                                </li>
                            </ul>

                            {{-- SOCIAL LINKS --}}
                            <ul class="flex gap-5 mt-6 justify-center">
                                <li>
                                    <a href=""><i class="fa-brands fa-whatsapp text-white text-lg hover:text-slate-400 duration-200"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa-brands fa-facebook text-white text-lg hover:text-slate-400 duration-200"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa-brands fa-x-twitter text-white text-lg hover:text-slate-400 duration-200"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa-brands fa-instagram text-white text-lg hover:text-slate-400 duration-200"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content -->

        <div class="w-full lg:ps-64">
            <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-7">

                <div class="grid md:grid-cols-8 grid-cols-none gap-5">
                    <!-- First Element -->
                    <div class="col-span-12 sm:col-span-6 sm:gap-4">
                        <h1 class="font-bold dark:text-white text-2xl pb-4">Seasons and Episodes</h1>
                        <div class="hs-accordion-group space-y-3">
                            <div class="hs-accordion active bg-white border -mt-px rounded-lg dark:bg-slate-800 dark:border-slate-700"
                                id="hs-bordered-heading-one">
                                <button
                                    class="hs-accordion-toggle hs-accordion-active:text-blue-600 inline-flex items-center gap-x-3 w-full font-semibold text-start text-gray-800 py-4 px-5 hover:text-gray-500 disabled:opacity-50 disabled:pointer-events-none dark:hs-accordion-active:text-blue-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:outline-none dark:focus:text-neutral-400"
                                    aria-expanded="true" aria-controls="hs-basic-bordered-collapse-one">
                                    <svg class="hs-accordion-active:hidden block size-3.5"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5v14"></path>
                                    </svg>
                                    <svg class="hs-accordion-active:block hidden size-3.5"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                    </svg>
                                    Season 01 <span class="text-sm">9 Episodes</span>
                                </button>
                                <div id="hs-basic-bordered-collapse-one"
                                    class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300"
                                    role="region" aria-labelledby="hs-bordered-heading-one">
                                    <div class="pb-4 px-5">
                                        <hr class="border-0 h-[1px] bg-slate-200 dark:bg-slate-700 mb-5">
                                        <div class="grid xl:grid-cols-9 items-center gap-10">
                                            <div class="col-span-1">
                                                <h1 class="text-end font-bold text-white text-3xl">01</h1>
                                            </div>
                                            <div class="col-span-8 -mt-6 sm:-mt-0 flex gap-4">
                                                <img src="https://img.awafim.tv/images/dzMP1J3rq1L1.192x0.webp" alt="" class="xl:h-28 h-40 rounded-md">
                                                <h1 class="font-inter"><a href="" class="text-slate-800 dark:text-white dark:hover:text-slate-200 text-sm font-bold" wire:navigate>Chapter One: The Pilot</a> <br> <span class="dark:text-slate-300 text-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae corporis ut eveniet pariatur. Placeat, quia, soluta asperiores iusto architecto, dolor obcaecati eos magni voluptatibus molestias ad assumenda reprehenderit. In, voluptas.</span></h1>
                                                <br>
                                            </div>
                                        </div>
                                        <hr class="border-0 h-[1px] bg-slate-200 dark:bg-slate-700 my-5">
                                        <div class="grid xl:grid-cols-9 items-center gap-10">
                                            <div class="col-span-1">
                                                <h1 class="text-end font-bold text-white text-3xl">02</h1>
                                            </div>
                                            <div class="col-span-8 -mt-6 sm:-mt-0 flex gap-4">
                                                <img src="https://img.awafim.tv/images/dzMP1J3rq1L1.192x0.webp" alt="" class="xl:h-28 h-40 rounded-md">
                                                <h1 class="font-inter"><a href="" class="text-slate-800 dark:text-white dark:hover:text-slate-200 text-sm font-bold" wire:navigate>Chapter Two: The Pilot</a> <br> <span class="dark:text-slate-300 text-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae corporis ut eveniet pariatur. Placeat, quia, soluta asperiores iusto architecto, dolor obcaecati eos magni voluptatibus molestias ad assumenda reprehenderit. In, voluptas.</span></h1>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="hs-accordion bg-white border -mt-px rounded-lg dark:bg-slate-800 dark:border-slate-700"
                                id="hs-bordered-heading-two">
                                <button
                                    class="hs-accordion-toggle hs-accordion-active:text-blue-600 inline-flex items-center gap-x-3 w-full font-semibold text-start text-gray-800 py-4 px-5 hover:text-gray-500 disabled:opacity-50 disabled:pointer-events-none dark:hs-accordion-active:text-blue-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:outline-none dark:focus:text-neutral-400"
                                    aria-expanded="false" aria-controls="hs-basic-bordered-collapse-two">
                                    <svg class="hs-accordion-active:hidden block size-3.5"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5v14"></path>
                                    </svg>
                                    <svg class="hs-accordion-active:block hidden size-3.5"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                    </svg>
                                    Season 02 <span class="text-sm">5 Episodes</span>
                                </button>
                                <div id="hs-basic-bordered-collapse-two"
                                    class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                    role="region" aria-labelledby="hs-bordered-heading-two">
                                    <div class="pb-4 px-5">
                                        <hr class="border-0 h-[1px] bg-slate-200 dark:bg-slate-700 mb-5">
                                        <div class="grid xl:grid-cols-9 items-center gap-10">
                                            <div class="col-span-1">
                                                <h1 class="text-end font-bold text-white text-3xl">01</h1>
                                            </div>
                                            <div class="col-span-8 -mt-6 sm:-mt-0 flex gap-4">
                                                <img src="https://img.awafim.tv/images/dzMP1J3rq1L1.192x0.webp" alt="" class="xl:h-28 h-40 rounded-md">
                                                <h1 class="font-inter"><a href="" class="text-slate-800 dark:text-white dark:hover:text-slate-200 text-sm font-bold" wire:navigate>Chapter One: The Pilot</a> <br> <span class="dark:text-slate-300 text-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae corporis ut eveniet pariatur. Placeat, quia, soluta asperiores iusto architecto, dolor obcaecati eos magni voluptatibus molestias ad assumenda reprehenderit. In, voluptas.</span></h1>
                                                <br>
                                            </div>
                                        </div>
                                        <hr class="border-0 h-[1px] bg-slate-200 dark:bg-slate-700 my-5">
                                        <div class="grid xl:grid-cols-9 items-center gap-10">
                                            <div class="col-span-1">
                                                <h1 class="text-end font-bold text-white text-3xl">02</h1>
                                            </div>
                                            <div class="col-span-8 -mt-6 sm:-mt-0 flex gap-4">
                                                <img src="https://img.awafim.tv/images/dzMP1J3rq1L1.192x0.webp" alt="" class="xl:h-28 h-40 rounded-md">
                                                <h1 class="font-inter"><a href="" class="text-slate-800 dark:text-white dark:hover:text-slate-200 text-sm font-bold" wire:navigate>Chapter Two: The Pilot</a> <br> <span class="dark:text-slate-300 text-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae corporis ut eveniet pariatur. Placeat, quia, soluta asperiores iusto architecto, dolor obcaecati eos magni voluptatibus molestias ad assumenda reprehenderit. In, voluptas.</span></h1>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="border-0 h-0.5 dark:bg-slate-700 bg-slate-300 my-10">

                        <section class="py-8 lg:py-8 antialiased">
                            <div class="mx-auto">
                                <div class="flex justify-between items-center mb-6">
                                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion (20)
                                    </h2>
                                </div>
                                <form class="mb-6">
                                    <div class="grid grid-cols-2 gap-3">
                                        <div
                                            class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                            <label for="comment" class="sr-only">Your name</label>
                                            <input type="text"
                                                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                                placeholder="Name (required)">
                                        </div>
                                        <div
                                            class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                            <label for="comment" class="sr-only">Your email</label>
                                            <input type="text"
                                                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                                placeholder="Email">
                                        </div>
                                    </div>
                                    <div
                                        class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                        <label for="comment" class="sr-only">Your comment</label>
                                        <textarea id="comment" rows="6"
                                            class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                            placeholder="Write a comment..." required></textarea>
                                    </div>
                                    <button type="submit"
                                        class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                        Post comment
                                    </button>
                                </form>
                                <article class="p-6 text-base bg-gray-100 rounded-lg dark:bg-gray-800">
                                    <footer class="flex justify-between items-center mb-2">
                                        <div class="flex items-center">
                                            <p
                                                class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                                <img class="mr-2 w-6 h-6 rounded-full"
                                                    src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                                    alt="Michael Gough">Michael Gough
                                            </p>
                                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate
                                                    datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time>
                                            </p>
                                        </div>
                                    </footer>
                                    <p class="text-gray-500 dark:text-gray-400">Very straight-to-point article. Really
                                        worth time reading. Thank you! But tools are just the
                                        instruments for the UX designers. The knowledge of the design tools are as important
                                        as the
                                        creation of the design strategy.</p>
                                    <div class="flex items-center mt-4 space-x-4">
                                        <button type="button"
                                            class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                                            <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                            </svg>
                                            Reply
                                        </button>
                                    </div>
                                </article>
                                <article
                                    class="p-6 mb-3 ml-6 lg:ml-12 mt-3 text-base  bg-gray-100 rounded-lg dark:bg-gray-800">
                                    <footer class="flex justify-between items-center mb-2">
                                        <div class="flex items-center">
                                            <p
                                                class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                                <img class="mr-2 w-6 h-6 rounded-full"
                                                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                                    alt="Jese Leos">Jese Leos
                                            </p>
                                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate
                                                    datetime="2022-02-12" title="February 12th, 2022">Feb. 12, 2022</time>
                                            </p>
                                        </div>
                                    </footer>
                                    <p class="text-gray-500 dark:text-gray-400">Much appreciated! Glad you liked it ☺️</p>
                                    <div class="flex items-center mt-4 space-x-4">
                                        <button type="button"
                                            class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                                            <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                            </svg>
                                            Reply
                                        </button>
                                    </div>
                                </article>
                            </div>
                        </section>

                    </div>

                    <!-- Second Element -->
                    <div class="md:col-span-2 col-span-12">
                        <hr class="border-0 h-0.5 dark:bg-slate-700 bg-slate-300 my-10 md:hidden">
                        <h1 class="font-bold font-inter text-gray-800 dark:text-white text-xl">Recommended Shows</h1>

                        <div class="grid lg:grid-cols-2 grid-cols-3 gap-4 mt-4">
                            <div class="w-full">
                                <a href="" wire:navigate>
                                    <img src="https://nkiri.com/wp-content/uploads/2024/11/the-day-of-the-jackal-tv-series-200x300.jpg"
                                        alt=""
                                        class="rounded-lg border dark:border-slate-700 lg:hover:scale-105 duration-200 w-full border-slate-100">
                                </a>

                                <div class="flex justify-between mt-2 gap-10">
                                    <a href=""
                                        class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm truncate dark:hover:text-slate-300"
                                        wire:navigate><span class="">HitPig (2024)</span></a>
                                </div>
                            </div>
                            <div class="w-full">
                                <a href="" wire:navigate>
                                    <img src="https://nkiri.com/wp-content/uploads/2024/11/the-day-of-the-jackal-tv-series-200x300.jpg"
                                        alt=""
                                        class="rounded-lg border dark:border-slate-700 lg:hover:scale-105 duration-200 w-full border-slate-100">
                                </a>

                                <div class="flex justify-between mt-2 gap-10">
                                    <a href=""
                                        class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm truncate dark:hover:text-slate-300"
                                        wire:navigate><span class="">HitPig (2024)</span></a>
                                </div>
                            </div>
                            <div class="w-full">
                                <a href="" wire:navigate>
                                    <img src="https://nkiri.com/wp-content/uploads/2024/11/the-day-of-the-jackal-tv-series-200x300.jpg"
                                        alt=""
                                        class="rounded-lg border dark:border-slate-700 lg:hover:scale-105 duration-200 w-full border-slate-100">
                                </a>

                                <div class="flex justify-between mt-2 gap-10">
                                    <a href=""
                                        class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm truncate dark:hover:text-slate-300"
                                        wire:navigate><span class="">HitPig (2024)</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div id="hs-full-screen-modal"
            class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none bg-white/60 backdrop-blur-lg dark:bg-neutral-900/60"
            role="dialog" tabindex="-1" aria-labelledby="hs-full-screen-label">
            <div
                class="hs-overlay-open:mt-0 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-10 opacity-0 transition-all max-w-full max-h-full h-full">
                <div class="flex flex-col pointer-events-auto max-w-full max-h-full h-full bg-transparent">
                    <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                        <h3 id="hs-full-screen-label" class="font-bold text-gray-800 dark:text-white">

                        </h3>
                        <button type="button"
                            class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-700 dark:hover:bg-neutral-600 dark:text-neutral-200"
                            aria-label="Close" data-hs-overlay="#hs-full-screen-modal">
                            <span class="sr-only">Close</span>
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="overflow-y-auto">
                        <iframe class="w-full aspect-[16/9]"
                            src="https://www.youtube.com/embed/hebWYacbdvc?si=LG3ZZslZ5nZB-UYe"></iframe>
                    </div>
                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 mt-auto border-t dark:border-neutral-700">
                        <button type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                            data-hs-overlay="#hs-full-screen-modal">
                            Close
                        </button>
                        <button type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Download
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>

                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
