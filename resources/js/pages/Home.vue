<template>
  <section>
    <Jumbotron />
    <Sponsored />
    <CTAhost />
  </section>
</template>
<script>
import Jumbotron from "../components/Jumbotron.vue";
import Sponsored from "../components/Sponsored.vue";
import CTAhost from "../components/CTAhost.vue";
export default {
  name: "Home",
  components: {
    Jumbotron,
    Sponsored,
    CTAhost,
  },
  data() {
    return {};
  },
  methods: {},
};
</script>
<style lang="scss" scoped>
</style>