<template>
    <Head :title="title"/>
    <p v-if="$page.props.message"
       class="bg-indigo-600 h-10 flex items-center justify-center text-sm font-medium text-white px-4 sm:px-6 lg:px-8">
        {{$page.props.message}}
    </p>

    <p v-if="$page.props.delete"
       class="bg-red-600 h-10 flex items-center justify-center text-sm font-medium text-white px-4 sm:px-6 lg:px-8">
        {{$page.props.delete}}
    </p>

    <p v-if="$page.props.create"
       class="bg-green-600 h-10 flex items-center justify-center text-sm font-medium text-white px-4 sm:px-6 lg:px-8">
        {{$page.props.create}}
    </p>
    <div class="mt-5">
        <header class="bg-white shadow px-2">
            <div class="flex justify-between items-center ax-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    {{title}}
                </h1>
            </div>
        </header>
        <div class="flex justify-between items-center">
            <Link :href="route('posts.create')"
                  class="bg-green-500 hover:bg-green-700 text-white text-center font-bold uppercase py-2 rounded-lg my-5 block w-48">
                Cоздать запись
            </Link>
            <input v-model="search" type="text" placeholder="Поиск"
                   class="border px-2 py-2 rounded-lg focus:outline-blue-500">
        </div>
        <div class="flex flex-col">
            <div class="my-2 overflow-x-auto sm:mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Название
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Описание
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Действия</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="post in posts.data" :key="post.id">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{post.title}}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{post.description}}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end items-center space-x-3">
                                    <Link
                                        class="text-white bg-blue-500 hover:bg-blue-900 py-2 px-2 rounded-md"
                                        :href="route('posts.edit', post.id)"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                    </Link>

                                    <a @click="destroy(post.id)"
                                       class="text-white bg-red-500 hover:bg-red-900 cursor-pointer py-2 px-2 rounded-md"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <Pagination :links="posts.links"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Pagination from "../../Shared/Pagination";
    import {ref, watch} from "vue"
    import {Head, Link} from "@inertiajs/inertia-vue3"
    import {Inertia} from "@inertiajs/inertia";

    export default {
        components: {
            Head,
            Link,
            Pagination,
            Inertia
        },

        props: {
            title: String,
            posts: Object,
            filters: Object
        },

        setup(props) {
            const search = ref(props.filters.search);


            watch(search, value => {
                Inertia.get('/posts', {search: value}, {
                    preserveState: true,
                    replace: true,
                });
            });

            return {search, watch}
        },


        methods: {
            destroy(id) {
                if (confirm('Вы уверены?')) {
                    this.$inertia.delete(this.route('posts.destroy', id))
                }
            }
        },
    }
</script>



