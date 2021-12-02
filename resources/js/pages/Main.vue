<template>
  <div class="container my-3">
    <div class="form-group">
      <input
        type="text"
        v-model="city"
        @keyup.enter="getCity"
        placeholder="Città"
        class="form-control"
      />
      <button class="btn btn-primary my-3" @click="getCity" id="getCityBtn">
        Vai
      </button>
    </div>
    <template>
      <div v-if="citySearched">
        <div class="form-group">
          <input
            class="form-control"
            type="number"
            v-model="guests"
            placeholder="Numero ospiti"
            @change="getCity"
          />
        </div>
        <div class="form-group">
          <input
            class="form-control"
            type="number"
            v-model="rooms"
            placeholder="Numero stanze"
            @change="getCity"
          />
        </div>
        <div class="form-group">
          <label class="" for="rangeDistance">Raggio: {{ distance }}Km</label>
          <input
            class="form-control"
            type="range"
            v-model="distance"
            placeholder="Distanza"
            @change="getCity"
            max="40"
            id="rangeDistance"
          />
        </div>
      </div>
    </template>
    <div v-for="(apartment, index) in apartments" :key="index">
      <p>
        <a :href="`/apartments/${apartment.id}`">{{ apartment.title }}</a>
      </p>
    </div>
  </div>
</template>
<script>
export default {
  name: "Main",
  data() {
    return {
      distance: "20",
      rooms: "",
      guests: "",
      myUrl: "/api/apartments?",
      tomTomAPI: "https://api.tomtom.com/search/2/geocode/",
      city: "",
      apiKey: ".json?key=6pyK2YdKNiLrHrARYvnllho6iAdjMPex",
      apartments: [],
      lat: "",
      long: "",
      citySearched: false,
    };
  },
  methods: {
    getApartments() {
      axios
        .get(
          this.myUrl +
            "n_guests=" +
            this.guests +
            "&n_rooms=" +
            this.rooms +
            "&n_baths=" +
            this.rooms +
            "&distance=" +
            this.distance +
            "&lat=" +
            this.lat +
            "&long=" +
            this.long
        )
        .then((res) => {
          this.apartments = res.data.results;
        });
    },

    getCity() {
      if (this.city !== "") {
        axios.get(this.tomTomAPI + this.city + this.apiKey).then((res) => {
          console.log(res.data.results[0].position);
          this.lat = res.data.results[0].position.lat;
          this.long = res.data.results[0].position.lon;
          this.getApartments();
          this.citySearched = true;
        });
      }
    },
  },
  created() {
    this.getApartments();
  },
};
</script>

<style lang="scss" scoped>
</style>