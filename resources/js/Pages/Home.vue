<template>
    <Head :title="title"/>
    <Header/>
    <PostList :posts="posts"/>
</template>

<script>
    import PostList from "./Post/PostList";
    import Header from "../Partials/Header";
    import {Head} from '@inertiajs/inertia-vue3'
    import UserLayout from "../Shared/UserLayout";

    export default {
        layout: UserLayout,
        props: {
            title: String,
            posts: Array

        },

        components: {
            Head,
            Header,
            PostList,
        }

    }
</script>

