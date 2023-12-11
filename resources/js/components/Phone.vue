<template>

            <p>
                <button v-if="showBtn" @click.prevent="showPhoneBtn()" class="px-6 py-1 text-white bg-blue-600 rounded shadow" type="button">
                    Show Number
                </button>
            </p>

            <p v-if="showNumber">
                    <button class="px-6 py-1 text-white bg-green-600 rounded shadow" type="button">
                        {{ phoneNumber }}
                    </button>
            </p>


</template>


<script type="modules">

    export default {

        props: ['phoneNumber'],

        data()
        {
            return{
                showBtn:true,
                showNumber:false
            }

        },

        methods:{

            showPhoneBtn() {

                this.showNumber=true,
                this.showBtn=false

            }
        }

}


</script>
