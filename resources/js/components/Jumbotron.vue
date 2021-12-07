<template>
  <section id="jumbotron" class="position-relative text-white mb-5">
    <div class="bg-overlay"></div>
    <div class="container">
      <div class="row align-items-center flex-column mb-4">
        <div class="col-auto mx-auto text-center">
          <h2 class="mb-4">
            <strong
              >Scopri nuovi posti e partecipa a esperienze fantastiche!</strong
            >
          </h2>
          <h5 class="mb-0">Inizia scegliendo la tua prossima destinazione</h5>
        </div>
      </div>

      <div class="row">
        <div class="input-group mb-3">
          <input
            type="text"
            class="form-control h-100 form-control-lg pl-5"
            id="input_destination"
            v-model="destination"
            v-on:keyup.enter="searchDestination"
            placeholder="Dove Vuoi Andare?"
            aria-label="Destination"
            aria-describedby="button-addon2"
          />
          <div class="input-group-append">
            <router-link
              :to="{
                name: 'Discover',
              }"
              class="btn btn-outline-danger bg-danger text-light"
              @click="searchDestination"
              >Cerca
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "Jumbotron",
  data() {
    return {
      destination: "",
    };
  },
  methods: {
    searchDestination() {
      this.$router.push({
        name: "Discover",
        params: { destination: this.destination },
      });
    },
  },
};
</script>

<style lang="scss" scoped>
#jumbotron {
  background-image: url("https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2670&q=80");
  background-size: cover;
  background-position: center;
  .bg-overlay {
    position: absolute;
    inset: 0;
    background-color: rgba(0, 0, 0, 0.387);
  }
}
</style>