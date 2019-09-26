<template>
    <div>
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
                            <span class="sep">/</span><a href="#" @click.prevent="reply" class="reply">Responder</a>
                        </div>
                    </div>
                    <div class="comment-text">
                        <p>
                            {{ comment.body }}
                        </p>
                    </div>
                    <div v-if="replying">
                        <form-comment></form-comment>
                    </div>
                </div>
                <!-- -->
                <div v-if="comment.replies !== undefined">
                    <comment-list :comments="comment.replies" ></comment-list>
                </div>
            </li>
        </ol>
    </div>
</template>

<script>
import axios from "axios";
import FormComment from "./FormComment";

export default {
  props: {
    comments: {
      required: true,
      type: Array
    }
  },
  data() {
    return {
      replying: false
    };
  },
  methods: {
    reply() {
      this.replying = true;
    }
  }
};
</script>

<style scoped>
</style>
