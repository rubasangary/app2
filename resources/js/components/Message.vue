<template>

    <div class="container mx-auto">
        <div class="flex justify-center">

            <p v-if="showViewConversationOnSuccsess">
                    <button @click="isOpen = true" class="px-6 py-1 text-white bg-blue-600 rounded shadow" type="button">
                        Send message
                    </button>
            </p>

            <p v-else>
                <a href="/message">
                    <button class="px-6 py-1 text-white bg-green-600 rounded shadow" type="button">
                        View messages
                    </button>
                </a>
            </p>

            <div v-show="isOpen" class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
                <div class="w-3x2 p-2 bg-white dark:bg-gray-800 rounded-md shadow-xl">
                        <div class="flex items-center justify-between">
                            <h3 id="Message" class="text-xl">Send message to {{ sellerName }} </h3>
                            <svg
                            @click="isOpen = false"
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-8 h-8 dark:text-gray-300 cursor-pointer"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                            </svg>
                        </div>
                        <div class="mt-2 h-40 ">
                            <p v-if="successMessage" class=" text-green-500"> Your message has been sent.</p>
                            <textarea v-model="body" type="text" class="w-full  dark:bg-gray-800"></textarea>




                            <button @click="isOpen = false" class="px-6 mr-10 py-1 text-blue-800 border border-blue-600 rounded">
                            Close
                            </button>

                            <button @click.prevent="sendMessage()"  class="px-2 py-1 ml-2 text-blue-100 bg-blue-600 rounded">
                            Send Message
                            </button>
                        </div>
                </div>
            </div>
        </div>
  </div>

</template>


<script type="module">

import axios from 'axios';

export default {

    props:['sellerName', 'userId', 'receiverId', 'adId'],

    data() {
    return {
      isOpen: false,

      body:"",
      successMessage:false,
      showViewConversationOnSuccsess:true
    };

  },
  methods: {

    sendMessage()
    {

         axios.post('/send/message',{
            body:this.body,
            receiverId:this.receiverId,
            userId:this.userId,
            adId:this.adId,

        }).then((response) => {


            this.body="",
            this.successMessage=true,
            this.showViewConversationOnSuccsess=false

        })

        if (this.body == ''){
            alert ('please write something')
        }
        return;
    }
  }


};

</script>
