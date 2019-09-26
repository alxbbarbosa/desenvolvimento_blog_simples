<template>
  <div style="width: 100%">
    <ul>
      <li v-for="(tag, index) in tags" :key="index" class="alinhamento forma">{{ tag.name }}&nbsp;&nbsp;[<a href="#" @click.prevent="deleteTag(index)" style="color: #ffffff;">X</a>]</li>
    </ul>
  </div>
</template>

<script>
export default {
  props: {
    route: {
      required: true,
      type: String
    }
  },
  data() {
    return {
      tags: []
    };
  },
  methods: {
    deleteTag(index) {
      axios
        .delete(this.tags[index].route)
        .then(response => {
          console.log(response);
          this.tags.splice(index, 1);
        })
        .catch(err => {});
    }
  },
  mounted() {
    axios
      .get(this.route)
      .then(response => {
        let result = response.data;
        let that = this;
        result.forEach(element => {
          that.tags.push(element);
        });
      })
      .catch(err => {});
  }
};
</script>

<style scoped>
.alinhamento {
  display: inline-block !important;
}
.forma {
  background-color: #faa116;
  list-style: none;
  padding: 5px;
  border-radius: 3px;
  margin: 2px;
}
</style>
