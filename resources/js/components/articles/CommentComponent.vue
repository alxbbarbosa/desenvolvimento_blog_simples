<template>
    <div>

        <form>
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" name="name" id="name" />
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" />
            </div>

            <div class="form-group">
                <label for="message">Homepage</label>
                <input type="text" class="form-control" name="homepage" id="homepage" />
            </div>

            <div class="form-group">
                <label for="body">Mensagem</label>
                <textarea class="form-control" name="body" id="body" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Comentar</button>
        </form>
    </div>
</template>

<script>
export default {
  data() {
    return {
      fields: {},
      errors: {},
      success: {},
      loaded: true
    };
  }
};
</script>

<style scoped>
</style>
