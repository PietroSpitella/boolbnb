<template>
  <div v-if="!isLoading" class="container my-3">
    {{ destination }}
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
            <router-link
              :to="{
                name: 'Apartment',
                params: { slug: apartment.slug },
              }"
              meta="apartment"
              class="card-link"
              target="_blank"
              @click="getData"
              >Visualizza
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Main",
  props: ["destination"],
  data() {
    return {
      distance: "20", // Inizializzo con 20 come richiesto dal Brief
      rooms: "",
      guests: "",
      myUrl: "/api/apartments",
      tomTomAPI: "https://api.tomtom.com/search/2/geocode/",
      city: "",
      apiKey: ".json?key=6pyK2YdKNiLrHrARYvnllho6iAdjMPex",
      apartments: [],
      lat: 45.07049,
      long: 7.68682,
      citySearched: false,
      services: [],
      selectedServices: [],
      apiIPurl: "https://api.ipify.org/",
      userIP: "",
      apartmentID: "",
      today: "",
      isLoading: true,
    };
  },
  methods: {
    clicked() {
      console.log("clicked");
    },
    async getServices() {
      let resServices = await axios.get(this.myUrl);
      this.services = resServices.data.services;
    },
    getApartments() {
      axios
        .get(
          this.myUrl +
            "?n_guests=" +
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
          this.isLoading = false;
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
    getData(el) {
      this.apartmentID = el.target.id;
      console.log(this.apartmentID);
      axios
        .get(this.apiIPurl)
        .then((res) => {
          this.userIP = res.data;
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => {
          this.sendData();
        });
    },
    sendData() {
      let today = new Date();
      let dd = String(today.getDate()).padStart(2, "0");
      let mm = String(today.getMonth() + 1).padStart(2, "0");
      let yyyy = today.getFullYear();
      this.today = yyyy + "/" + mm + "/" + dd;
      axios
        .post("api/statistics", {
          apartment_id: this.apartmentID,
          data: this.today,
          visitors: this.userIP,
        })
        .then((res) => {
          res.data.success;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  created() {
    this.getApartments();
    this.getCity();
    this.getServices();
  },
};
</script>

<style lang="scss" scoped>
</style>