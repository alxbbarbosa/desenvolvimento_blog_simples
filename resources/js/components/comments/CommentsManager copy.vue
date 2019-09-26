<template>
    <div>
        <div class="comments">
            <h3>Comentários</h3>
            <ol class="commentlist">
                <li v-for="(comment, index) in comments" :key="index" class="depth-1">
                    <div class="avatar">
                        <img width="50" height="50" class="avatar" src="images/user-01.png" alt="">
                    </div>
                    <div class="comment-content">
                        <div class="comment-info">
                            <cite>{{ comment.name }}</cite>
                            <div class="comment-meta">
                                <span class="comment-time">{{  (new Date(comment.created_at)).toLocaleDateString("pt-BR", { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }) }}</span>
                                <span class="sep">/</span><a href="#" class="reply">Responder</a>
                            </div>
                        </div>
                        <div class="comment-text">
                            <p>
                                {{ comment.body }}
                            </p>
                        </div>
                    </div>
                </li>
            </ol>
        </div>
        <form-comment @commenting="saveComment"></form-comment>
        <FlashMessage></FlashMessage>
    </div>
</template>



<script>
import axios from "axios";

import FormComment from "./FormComment";
import CommentList from "./CommentList";

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
  },
  components: {
    FormComment,
    CommentList
  }
};
</script>

<style scoped>
</style>
