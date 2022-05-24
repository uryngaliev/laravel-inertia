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
                            <label class="block text-sm font-medium text-gray-700">Имя</label>
                            <input
                                v-model="form.name"
                                type="text"
                                :class="{'border-red-500': form.errors.name}"
                                class="mt-1 py-4 focus:ring-indigo-500 focus:border-indigo-500 px-4 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                            <div class="text-red-500 mt-2" v-if="form.errors.name">{{ form.errors.name }}>
                            </div>
                        </div>

                        <div class="col-span-6">
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input
                                v-model="form.email"
                                type="text"
                                :class="{'border-red-500': form.errors.email}"
                                class="mt-1 py-4 focus:ring-indigo-500 focus:border-indigo-500 px-4 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                            <div class="text-red-500 mt-2" v-if="form.errors.email">{{ form.errors.email }}>
                            </div>
                        </div>

                        <div class="col-span-6">
                            <label class="block text-sm font-medium text-gray-700">Пароль</label>
                            <input
                                v-model="form.password"
                                type="password"
                                :class="{'border-red-500': form.errors.password}"
                                class="mt-1 py-4 focus:ring-indigo-500 focus:border-indigo-500 px-4 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                            <div class="text-red-500 mt-2" v-if="form.errors.password">{{ form.errors.password }}>
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
    import {Head, Link, useForm} from '@inertiajs/inertia-vue3'

    export default {
        components: {
            Head,
            Link
        },
        props: {
            title: String
        },

        setup() {
            const form = useForm({
                name: null,
                email: null,
                password: null,
            });

            function store() {
                form.post(route('users.store'))
            }

            return {form, store};
        }
    }
</script>


