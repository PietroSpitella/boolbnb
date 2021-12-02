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
        <div class="form-services row">
          <div
            class="form-group col-2"
            v-for="service in services"
            :key="service.id"
          >
            <label :for="service.id">{{ service.name }}</label>
            <input
              type="checkbox"
              :name="service.name"
              :id="service.id"
              class=""
              :value="service.id"
              @change="getSelectedServices"
            />
          </div>
        </div>
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
    <div class="row mt-4">
      <div
        class="col-lg-4 mb-4"
        v-for="(apartment, index) in apartments"
        :key="index"
      >
        <div class="card">
          <img
            :src="'/storage/' + apartment.image"
            class="card-img-top"
            alt=""
          />
          <div class="card-body">
            <h5 class="card-title">{{ apartment.title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">
              {{ apartment.city }}
            </h6>
            <p class="card-text">{{ apartment.description }}</p>
            <a
              :href="'/apartments/' + apartment.id"
              target="_blank"
              class="card-link"
              >Visualizza</a
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Main",
  data() {
    return {
      distance: "20", // Inizializzo con 20 come richiesto dal Brief
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
      services: [],
      selectedServices: [],
    };
  },
  methods: {
    async getServices() {
      let resServices = await axios.get("/api/apartments");
      this.services = resServices.data.services;
    },
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
            this.long +
            "&services=" +
            this.selectedServices
        )
        .then((res) => {
          this.apartments = res.data.results;
        });
    },
    getCity() {
      if (this.city !== "") {
        axios.get(this.tomTomAPI + this.city + this.apiKey).then((res) => {
          this.lat = res.data.results[0].position.lat;
          this.long = res.data.results[0].position.lon;
          this.getApartments();
          this.citySearched = true;
        });
      }
    },
    getSelectedServices(el) {
      if (el.target.checked === true) {
        this.selectedServices.push(el.target.value);
      } else {
        this.selectedServices.splice(
          this.selectedServices.indexOf(el.target.value),
          1
        );
      }
      this.getApartments();
    },
  },
  created() {
    this.getApartments();
    this.getServices();
  },
};
</script>

<style lang="scss" scoped>
</style>