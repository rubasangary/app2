<template>

    <div>
         <!-- component -->

         <div class="flex flex-1 bg-gray-100 dark:bg-gray-900 h-screen lg:max-w-screen-2xl mb-2">
            <div class="p-12 lg:p-20 w-full mb-10">
                <div class="max-h-full h-full block lg:flex lg:flex-row">

                    <!-- component start -->
                    <aside class="flex w-full lg:w-2/6 bg-white dark:bg-gray-800 mr-6 rounded-lg shadow-lg">
                        <div class="max-w-full h-full w-full flex flex-col">
                            <div class="flex p-3 justify-between">
                                <div class="text-xl font-semibold dark:text-gray-100 text-gray-900">
                                    List of users
                                </div>
                                <div>
                                    <svg class="h-5 w-5 mr-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                      </svg>
                                </div>
                            </div>

                            <hr class="border-gray-300 dark:border-gray-600 mb-2">
                            <!-- User area -->
                            <div class="flex-1 overflow-y-scroll scrollbar-thumb-color dark:scrollbar-thumb-color-dark ">
                                <div class="w-full">
                                        <div class=" space-y-5">
                                            <!-- Users-->
                                            <div class="flex px-2" v-for="(user, index) in users" :key="index">
                                                <div class="mr-4 relative">
                                                    <span v-if="user.profile_photo_url">
                                                    <img class="rounded-full w-10 h-10" :src="(user.profile_photo_url)"  alt="">
                                                    </span>
                                                    <div class="w-3 h-3 rounded-full bg-green-400 absolute bottom-0 right-0">

                                                    </div>
                                                </div>
                                                <div class="flex flex-col flex-1">
                                                    <div class="flex justify-between items-center">
                                                        <div class="capitalize text-gray-900 font-semibold dark:text-gray-300">
                                                            <p @click.prevent="start">
                                                                <a href="#" @click.prevent="showMessage(user.id)">
                                                                    <p class="mt-3">{{ user.name }}</p>
                                                                </a>
                                                            </p>
                                                        </div>
                                                        <div>
                                                            date
                                                        </div>
                                                    </div>
                                                    <div class="text-gray-900 text-md font dark:text-gray-400"></div>
                                                </div>

                                            </div>
                                            <!-- Users end-->
                                        </div>
                                </div>
                            </div>
                            <!-- User area end -->
                        </div>
                    </aside>
                    <!-- component end -->

                            <div class="lg:hidden h-4">

                            </div>

                    <!-- Right Section Start  -->
                            <div class="lg:relative m-h-ful h-full bg-white rounded-lg w-full flex flex-col dark:bg-gray-800 shadow-lg">

                                <div class="flex p-3 justify-between">
                                    <div class="text-xl font-semibold dark:text-gray-100 text-gray-900" >
                                        Chat (அரட்டை)
                                    </div>
                                    <div>
                                        <svg class="h-5 w-5 mr-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                </div>

                                <hr class="border-gray-300 dark:border-gray-600 mb-1">

                                            <!-- All Message Start -->
                                <div class="hello flex-1 overflow-y-scroll scrollbar-thumb-color scrollbar-thumb-color-dark scrollbar-width spacing-y-5 p-3">
                                            <!-- left Message start -->


                                                    <div v-for="(message, index) in messages" :key="index">
                                                        <div v-if="message.selfOwned">

                                                            <div class="flex justify-end">
                                                                <div class="space-y-5 text-right">
                                                                    <div class="flex justify-end mt-2">
                                                                        <img class="rounded-full w-10 h-10 lg:w-10 lg:h-10 mr-2" :src="(message.user.profile_photo_url)" alt="" srcset="">
                                                                        <p class="mt-2">{{ message.user.name }}</p>
                                                                    </div>
                                                                    <div>
                                                                        <div>{{ moment(message.created_at).fromNow() }}</div>
                                                                        <span class="bg-green-200 text-gray-900 p-2 mt-1 text-base rounded-l-lg rounded-b-lg inline-flex max-w-xl">

                                                                                    {{ message.body }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- left Message end -->

                                                        <!-- right Message start -->
                                                            <div v-else>
                                                                <div  v-if="selectedUserId" >
                                                                    <div class="flex-row mt-5 justify-start">
                                                                        <div class="flex w-14">
                                                                            <span v-if="message.user.profile_photo_url">
                                                                            <img class="rounded-full w-10 h-10 lg:w-10 lg:h-10 mr-2" :src="(message.user.profile_photo_url)" alt="" srcset="">
                                                                            </span>

                                                                            <p class="mt-3">{{ message.user.name }}</p>

                                                                        </div>
                                                                        <div class="flex flex-col mt-2 text-left w-1/2">
                                                                            <div>
                                                                                <p class="text-green-600 underline" v-if="message.ads">
                                                                                    <img class="h-20 rounded-md" :src=" '/storage/ads/seller/' + (message.ads.feature_image)" alt="">
                                                                                    <a :href=" '/உழவர்/' + message.ads.id + '/' + message.ads.slug " target="_blank">{{ message.ads.name }}</a>
                                                                                </p>
                                                                                <div>{{ moment(message.created_at).fromNow() }}</div>
                                                                                <div class="bg-blue-400 text-gray-900 p-2 text-base rounded-r-lg rounded-b-lg inline-flex max-w-xl">
                                                                                <span>
                                                                                            {{ message.body }}
                                                                                </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                </div>
                                        </div>
                                </div>
                                <!-- right Message end -->


                                    <div class="flex-none p-2">
                                        <div>
                                            <div class="relative flex mr-5 mb-2">
                                                <input v-model="body" type="text" placeholder="Type here...." class="w-3/6 md:w-full focus-outline-none  placeholder-gray-400 pl-8 bg-gray-200 pr-8 rounded-full mb-1 dark:bg-gray-800 focus:placeholder-gray-400 text-gray-400">

                                                <button class="inline-flex items-center ml-3 bg-blue-500 justify-center rounded-full h-10 w-10 lg:h-12 lg:w-12 transition duration-500 ease-in-out text-white  hover:text-gray-300 focus:outline-none" type="submit" @click.prevent="sendMessage()">
                                                    <svg class="h-4 w-4 lg:w-6 lg:h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right Section end  -->
            </div>


</template>
    <!-- footer -->

<script>
import axios from 'axios';
import moment from 'moment';

 export default {

    data(){

        return {
            users:[],
            messages:[],
            selectedUserId:'',
            body:'',
            moment:moment

        }
    },


    mounted(){

        axios.get('/users').then((response)=>{
            this.users = response.data
        })

        this.scrollToEnd();

 },

        updated(){
            this.scrollToEnd();
        },


 methods:{

    showMessage(userId){
        axios.get('/message/user/'+userId).then((response)=>{
            this.messages = response.data
            this.selectedUserId = userId
    })
 },

 sendMessage()
        {
            if(this.body==''){
                alert('Please write your message')
                return
            }
            if(this.selectedUserId==''){
             alert('Please select the user')
                return
            }

            axios.post('/start-conversation',{
                body:this.body,
                receiverId: this.selectedUserId
            }).then((response)=>{
                this.messages.push(response.data);
                this.body=''
            })


        },

        // scrollToEnd(){
        //     var container = document.querySelector(".hello");
        //     var scrollHeight = container.scrollHeight;
        //     container.scrollTop = scrollHeight
        // },

        // start() {
        //     setInterval(()=>{
        //     this.showMessage(this.selectedUserId)
        // },4000)

        // }


        scrollToEnd() {
  var container = document.querySelector(".hello");
  var scrollHeight = container.scrollHeight;
  container.scrollTop = scrollHeight;
},

start() {
  var intervalId = null; // Variable to store the interval ID

  // Function to show the message
  const showMessage = () => {
    this.showMessage(this.selectedUserId);

    // Stop the interval after showing the message
    clearInterval(intervalId);
  };

  // Attach the click event listener to trigger the message showing
  document.addEventListener("click", () => {
    if (!intervalId) {
      // Start the interval only if it hasn't been started yet
      intervalId = setInterval(showMessage, 1000);
    }
  });
}



}

}

</script>


