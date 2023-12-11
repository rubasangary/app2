<template>

        <a v-if="saveBtn" @click.prevent="saveAd()" href="#" class="inline-flex items-center px-3 py-2 font-medium text-center dark:text-white">
                <svg class="w-6 mr-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"></path>
                  </svg>
                  Save This Ad
        </a>

        <p class="text-green-500" v-else>
            Advertisement Saved !
        </p>

</template>


<script>

export default {

    props:['adId','userId'],
    data(){
        return{
            saveBtn:true,

        }
    },

    methods: {
            saveAd() {
                axios.post('/user/ad/save', {
                adId: this.adId,
                userId: this.userId
                })
                .then((response) => {
                    this.saveBtn = false;
                    this.$toaster.success('This ad is saved in your list.', { timeout: 8000 });
                })
                .catch((error) => {
                    console.error('Error while saving ad:', error);
                    // You can also display an error message to the user if needed
                    this.$toaster.error('Failed to save the ad. Please try again later.', { timeout: 8000 });
                });
            }
        }

    }

</script>
