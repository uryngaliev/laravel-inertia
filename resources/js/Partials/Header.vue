<template>
    <nav
        class="font-sans flex flex-col text-center content-center sm:flex-row sm:text-left sm:justify-between py-8 px-6 bg-white shadow sm:items-baseline w-full">
        <div class="mb-2 sm:mb-0 inner">

            <Link href="/" class="text-2xl no-underline text-grey-darkest hover:text-blue-dark font-sans font-bold">
                Laravel
            </Link>
            <br>
        </div>

        <div class="sm:mb-0 self-center">
            <Link :href="route('login') "
                  class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1">Записи
            </Link>
        </div>


        <div class="sm:mb-0 self-center">


<!--            <Link @click="logout" class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1">-->
<!--                Войти-->
<!--            </Link>-->

<!--            <Link @click="logout" class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1">-->
<!--                Выйти-->
<!--            </Link>-->
        </div>

    </nav>
</template>

<script>
    import {Link} from '@inertiajs/inertia-vue3'

    export default {
        components: {
            Link
        },

        methods: {
            logout() {
                this.$inertia.delete(this.route('logout'))
            },
        }
    }
</script>
