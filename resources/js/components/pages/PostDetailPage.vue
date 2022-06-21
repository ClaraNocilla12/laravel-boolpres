<template>
    <div>

         <Alert v-if="isError"  message="post not found" type="danger" />


        <h1>{{ post.title }}</h1>
        <!-- Alert -->
     
        
        <p class="mt-3">{{ post.content }}</p>
        <!-- Ulteriori info del post -->

    <div>
        <button class="btn btn-secondary" @click="$router.back()">Indietro</button>
    </div>

    </div>
</template>

<script>
import axios from 'axios';
import Alert from '../Alert.vue';

    export default {
        name: 'PostDetailPage',
        data() {
            return {
                post: [],
                isError: false,
                
            }
            
        },
          components: {
            Alert
        },
        methods: {
            getPost() {
                axios.get(`http://127.0.0.1:8000/api/posts/${ this.$route.params.slug }`)
                    .then((res) => {
                        console.log(res.data);
                        // console.log(data);
                        this.post = res.data;
                    }).catch((err) => {
                        this.isError = true;
                    });
            }
        },
        mounted() {
            this.getPost();
            
        }
    }
</script>
