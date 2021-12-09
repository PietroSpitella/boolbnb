<template>
  <section>
    <Jumbotron />
    <Sponsored />
  </section>
</template>
<script>

import Jumbotron from "../components/Jumbotron.vue";
import Sponsored from "../components/Sponsored.vue";
export default {
  name: "Home",
  components: {
    Jumbotron,
    Sponsored,
  },
  data() {
    return {};
  },
  methods: {},
};
</script>
<style lang="scss" scoped>
</style>