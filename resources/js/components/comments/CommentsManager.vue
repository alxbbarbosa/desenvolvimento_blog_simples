<template>
    <div>
        <div class="comments">
            <h3>Comentários</h3>
            <comment-list :comments="comments" :children="false"></comment-list>
        </div>
        <form-comment @commenting="saveComment"></form-comment>
        <FlashMessage></FlashMessage>
    </div>
</template>



<script>
import axios from "axios";

export default {
  props: {
    u: {
      required: true,
      type: String
    }
  },
  data() {
    return {
      info: false,
      comments: []
    };
  },
  methods: {
    loadComments() {
      axios.get(this.u).then(response => {
        console.log(response.data);
        this.comments = response.data;
      });
    },
    saveComment(data) {
      axios
        .post(this.u, {
          name: data.name,
          email: data.email,
          website: data.website,
          body: data.body
        })
        .then(response => {
          this.flashMessage.success({
            title: "Obrigado por sua participação!",
            message:
              "Seu comentário foi enviado com êxito, em breve estará visivel após ser moderado!"
          });
        })
        .catch(error => {
          this.flashMessage.error({
            title: "Ocorreu um problema no servidor",
            message: "Desculpe o seu comentário não foi enviado!"
          });
        });
    }
  },
  mounted() {
    this.loadComments();
  }
};
</script>

<style scoped>
</style>
