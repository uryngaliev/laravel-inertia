<template>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10 mb-20">
        <div v-for="post in posts"
             :key="post.id">
            <div class="px-4 py-8 max-w-xl">
                <div class="bg-white shadow-2xl">
                    <div>
                        <Link :href="route('show', post.id )">
                            <img
                                src="https://images.unsplash.com/photo-1571171637578-41bc2dd41cd2?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="img">
                        </Link>
                    </div>
                    <div class="px-4 py-2 mt-2 bg-white">
                        <h2 class="font-bold text-2xl text-gray-800">{{post.title}}</h2>
                        <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">
                            {{post.description}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import UserLayout from "../../Shared/UserLayout";
    import {Link} from '@inertiajs/inertia-vue3'

    export default {
        layout: UserLayout,
        components: {
            Link
        },

        props: {
            posts: Array
        },
    }
</script>


