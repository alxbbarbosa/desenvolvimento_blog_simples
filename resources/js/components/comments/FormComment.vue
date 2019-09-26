<template>
    <div class="respond">
        <h3>Deixe um comentário</h3>
        <!-- form -->
        <form @submit.prevent="comment">
            <fieldset>
                <div class="group">
                    <label for="name">Nome <span class="required">*</span></label>
                    <input v-model="form.name" name="name" type="text" id="name" size="35" v-validate="'required'" :class="errors.has('name') ? 'danger-border' : ''"/>
                    <span v-show="errors.has('name')" class="help is-danger">Você deve informar o seu nome</span>
                </div>
                <div class="group">
                    <label for="email">Email <span class="required">*</span></label>
                    <input v-model="form.email" name="email" type="text" id="email" size="35" v-validate="'required|email'" :class="errors.has('email') ? 'danger-border' : ''"/>
                    <span v-show="errors.has('email')" class="help is-danger">O email não parece estar num formato correto</span>
                </div>
                <div class="group">
                    <label for="website">Website</label>
                    <input v-model="form.website" name="website" type="text" id="website" size="35" value="" />
                </div>
                <div class="message group">
                    <label  for="body">Mensagem <span class="required">*</span></label>
                    <textarea v-model="form.body" name="body" id="body" rows="10" cols="50" v-validate="'required'" :class="errors.has('body') ? 'danger-border' : ''"></textarea>
                    <span v-show="errors.has('body')" class="help is-danger">Não é possível enviar um comentário vazio</span>
                </div>
                <button type="submit" class="submit">Comentar</button>
            </fieldset>
        </form>
    </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: "",
        email: "",
        website: "",
        body: "",
        parent_id: ""
      }
    };
  },
  methods: {
    comment() {
      this.$validator.validateAll().then(result => {
        if (result) {
          this.$emit("commenting", this.form);
          this.cleanForm();
          return;
        }
        this.flashMessage.warning({
          title: "Não foi possivel enviar seu comentário",
          message:
            "Verifique primeiro porque alguns campos não estão sendo validados!"
        });
      });
    },
    cleanForm() {
      this.form = {
        name: "",
        email: "",
        website: "",
        body: "",
        parent_id: ""
      };
      this.errors.clear();
      this.$validator.reset();
    }
  }
};
</script>

<style scoped>
.is-danger {
  color: #ffffff;
  background: #cc0000;
  font-family: "Courier New", Courier, monospace;
  font-size: 15px;
  font-weight: 600;
  padding: 2px 10px 2px 10px;
  border-radius: 5px;
  border: 2px solid #990000;
}
.danger-border {
  border: 2px solid #ff0000;
}
.success-border {
  border: 2px solid #009900;
}
</style>
