<template>
    <Head :title="title"/>
    <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
        <div class="bg-white w-96 shadow-xl rounded p-5">
            <h1 class="text-3xl font-medium">Регистрация</h1>

            <form @submit.prevent="submit" class="space-y-5 mt-5" method="POST">
                <input :class="{'border-red-500': form.errors.name}" v-model="form.name" type="text"
                       class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Имя"/>
                <div class="text-red-500" v-if="form.errors.name">{{ form.errors.name }}</div>

                <input :class="{'border-red-500': form.errors.email}" v-model="form.email" type="email"
                       class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Email"/>
                <div class="text-red-500" v-if="form.errors.email">{{ form.errors.email }}</div>

                <input :class="{'border-red-500': form.errors.password}" v-model="form.password" type="password"
                       class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Пароль"/>
                <div class="text-red-500" v-if="form.errors.password">{{ form.errors.password }}</div>


                <div>
                    <Link :href="route('login') " class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">
                        Есть аккаунт?
                    </Link>
                </div>

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium"
                        :disabled="form.processing">
                    Зарегистрироваться
                </button>
            </form>
        </div>
    </div>
</template>

<script>
    import {Head, useForm, Link} from '@inertiajs/inertia-vue3'
    import UserLayout from "../../Shared/UserLayout";


    export default {
        layout: UserLayout,
        props: {
            title: String
        },

        components: {
            Head,
            useForm,
            Link
        },
        setup() {
            const form = useForm({
                name: null,
                email: null,
                password: null,
            })

            function submit() {
                form.post(route('register_process'))
            }

            return {form, submit}
        },
    }
</script>

