<template>
    <div>
        <div class="flex h-screen bg-green-500">
            <div class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

            <div
                class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
                <div class="flex items-center justify-center mt-8 text-white">
                    <div class="flex items-center">
                        <img class="h-14 w-14 object-cover rounded-full mr-4"
                             src="https://images.unsplash.com/photo-1528892952291-009c663ce843?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=296&amp;q=80"
                             alt="Your avatar">
                        <button v-if="$page.props.user">
                            {{$page.props.user.name}}
                        </button>
                    </div>
                </div>

                <nav class="mt-10">
                    <Link
                        class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100 hover:bg-blue-900 duration-300"
                        :href="route('posts.index')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                  clip-rule="evenodd"/>
                            <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"/>
                        </svg>

                        <span class="mx-3">Статьи</span>
                    </Link>
                    <Link
                        class="flex items-center mt-6 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100 hover:bg-blue-900 duration-300"
                        :href="route('users.index')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                        </svg>

                        <span class="mx-3">Пользователи</span>
                    </Link>
                </nav>
            </div>

            <div class="flex-1 flex flex-col overflow-hidden">
                <header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-indigo-600">
                    <div class="flex items-center">
                        <button class="text-gray-500 focus:outline-none lg:hidden">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="flex items-center">
                        <div class="relative">
                            <Link :href="route('logout')" method="delete">
                                Выйти
                            </Link>

                            <div class="inset-0 h-full w-full z-10"
                            ></div>

                            <div
                                class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10">
                            </div>
                        </div>
                    </div>
                </header>
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container mx-auto px-8">
                        <slot/>
                    </div>
                </main>
            </div>
        </div>
    </div>
</template>

<script>
    import {Link} from "@inertiajs/inertia-vue3"

    export default {
        props: {
            title: String
        },

        components: {
            Link,
        }
    }
</script>

