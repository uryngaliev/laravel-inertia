<template>
    <Head :title="title"/>
    <div class="container mx-auto">
        <header class="bg-white shadow mb-10 mt-5">
            <div class="max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    Добавить пользователя
                </h1>
            </div>
        </header>

        <Link :href="route('posts.index')"
              class="bg-blue-700 hover:bg-blue-900 text-white text-center font-bold uppercase py-2 rounded-lg my-5 block w-48">
            Вернуться назад
        </Link>

        <form @submit.prevent="store">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6">
                            <label class="block text-sm font-medium text-gray-700">Название</label>
                            <input :class="{'border-red-500': form.errors.title}" v-model="form.title" type="text"
                                   class="mt-1 py-4 focus:ring-indigo-500 focus:border-indigo-500 px-4 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                            <div class="text-red-500 mt-2" v-if="form.errors.title">{{ form.errors.title }}</div>
                        </div>

                        <div class="col-span-6">
                            <label class="block text-sm font-medium text-gray-700">Описание</label>
                            <input :class="{'border-red-500': form.errors.description}" v-model="form.description"
                                   type="text"
                                   class="mt-1 py-4 focus:ring-indigo-500 focus:border-indigo-500 px-4 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                            <div class="text-red-500 mt-2" v-if="form.errors.description">{{ form.errors.description }}
                            </div>
                        </div>

                    </div>
                </div>

                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Добавить
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import {Link, useForm, Head} from '@inertiajs/inertia-vue3';

    export default {
        components: {
            Link,
            Head,
        },

        props: {
            title: String
        },

        setup() {
            const form = useForm({
                title: null,
                description: null,
            });

            function store() {
                form.post(route('posts.store'))
            }

            return {form, store};
        },
    };
</script>

