<!-- <template>
    <div>
      <button @click="likeForum" v-if="!liked">Like</button>
      <button @click="unlikeForum" v-else>Unlike</button>
      Total Likes = 5
    </div>
</template>

  <script>
  import axios from 'axios';

  export default {

    props: ['forumId','userId'],

    data() {
      return {
        liked: false,
        forum: {}, // The item object
      };
    },
    methods: {
        likeForum() {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        axios.post(`/forum/${this.forumId}/like`, { _token: csrfToken })
            .then(response => {
            // Update the UI or perform other actions
            this.liked = true;
            })
            .catch(error => {
            console.error(error);
            });
        },

        unlikeForum() {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        axios.post(`/forum/${this.forumId}/unlike`, { _token: csrfToken })
            .then(response => {
            // Update the UI or perform other actions
            this.liked = false;
            })
            .catch(error => {
            console.error(error);
            });
        },
    },
    mounted() {
      // Fetch the initial like status of the item (e.g., in a created hook or when the component is mounted)
      axios.get(`/forum/${this.forumId}/like-status`)
        .then(response => {
          this.liked = response.data.liked;
        })
        .catch(error => {
          console.error(error);
        });
    },
  };
  </script> -->
