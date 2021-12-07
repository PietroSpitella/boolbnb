<template>
  <section id="sponsored" class="">
    <div class="container">
      <div class="row mb-3">
        <div class="col-12">
          <h3 class="mb-3"><strong>Our Featured Homes</strong></h3>
          <h5 class="mb-0">Hand-picked selection of quality places</h5>
        </div>
      </div>

      <div class="row">
        <div class="col-4">
          <div class="card" v-for="apartment in apartments" :key="apartment.id">
            <img
              :src="'/storage/' + apartment.image"
              class="card-img-top"
              alt=""
            />
            <div class="card-body">
              <h5 class="card-title">{{ apartment.title }}</h5>
              <h6 class="card-subtitle mb-2 text-muted">
                {{ apartment.type }}
              </h6>
              <p class="card-text">
                {{ apartment.description }}
              </p>
              <router-link
                :to="{
                  name: 'Apartment',
                  params: { slug: apartment.slug },
                }"
                class="card-link"
                >Visualizza
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
export default {
  name: "Sponsored",
  data() {
    return {
      apiSponsors: "/api/sponsored/",
      apartments: [],
    };
  },
  methods: {
    getSponsoredHouses() {
      axios.get(this.apiSponsors).then((res) => {
        this.apartments = res.data.results;
      });
    },
  },
  created() {
    this.getSponsoredHouses();
  },
};
</script>
<style lang="scss" scoped>
</style>