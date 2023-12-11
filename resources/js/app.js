import './bootstrap';


import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

Alpine.store('darkMode', {
    on: false,

    toggle() {
        this.on = ! this.on;

        if (this.dark)
        {
            document.documentElement.classList.add("dark");
        }
        else
        {
            document.documentElement.classList.add("dark");
        }
    }
})



window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();




import { createApp } from 'vue';

const app = createApp({})

import Savingads from "./components/Savingads.vue";
import Chat from "./components/Chat.vue";
import Message from "./components/Message.vue";
import Phone from "./components/Phone.vue";
import Forumlikes from "./components/Forumlikes.vue";


app.component('Savingads', Savingads );
app.component('Chat', Chat );
app.component('Message', Message );
app.component('Phone', Phone );
app.component('Forumlikes', Forumlikes );

app.mount("#app");


