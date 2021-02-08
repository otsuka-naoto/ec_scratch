<template>
  <div id="app">
    <h1 class="greeting">greeting:{{ msg }}</h1>
    <Content />
  </div>
</template>

<script>
export default {
  components: {
    Content,
  },
  data() {
    return { msg: "hello!" };
  },
};
</script>
<style scoped>
.greeting {
  color: #42b983;
}
</style>