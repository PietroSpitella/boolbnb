<template>
  <div v-if="!isLoading" class="container my-3">
    {{ destination }}
    <div class="form-group">
      <input
        type="text"
        v-model="city"
        @keyup.enter="getApartments"
        placeholder="Città"
        class="form-control"
      />
      <div id="map_div" class="map"></div>
      <button
        class="btn btn-primary my-3"
        @click="getApartments"
        id="getCityBtn"
      >
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
            @change="getApartments"
          />
        </div>
        <div class="form-group">
          <input
            class="form-control"
            type="number"
            v-model="rooms"
            placeholder="Numero stanze"
            @change="getApartments"
          />
        </div>
        <div class="form-group">
          <label class="" for="rangeDistance">Raggio: {{ distance }}Km</label>
          <input
            class="form-control"
            type="range"
            v-model="distance"
            placeholder="Distanza"
            @change="getApartments"
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
              class="card-link"
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
      city: this.$route.params.destination,
      apiKey: ".json?key=6pyK2YdKNiLrHrARYvnllho6iAdjMPex",
      API_KEY: "6pyK2YdKNiLrHrARYvnllho6iAdjMPex",
      apartments: [],
      lat: "",
      long: "",
      citySearched: false,
      services: [],
      selectedServices: [],
      map: undefined,
      apartmentID: "",
      today: "",
      isLoading: true,
      popupOffsets: {
        top: [0, 0],
        bottom: [0, -70],
        "bottom-right": [0, -70],
        "bottom-left": [0, -70],
        left: [25, -35],
        right: [-25, -35],
      },
    };
  },
  methods: {
    async getServices() {
      let resServices = await axios.get(this.myUrl);
      this.services = resServices.data.services;
    },
    async getApartments() {
      if (this.city) {
        await axios
          .get(this.tomTomAPI + this.city + this.apiKey)
          .then((res) => {
            this.lat = res.data.results[0].position.lat;
            this.long = res.data.results[0].position.lon;
          });
      }
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
          // this.createMarker(this.apartments);
          this.isLoading = false;
        });
      // if (this.map != undefined) {
      //   this.getMap();
      // }
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
    // getMap() {
    //   this.map = tt.map({
    //     container: "map_div",
    //     key: this.API_KEY,
    //     source: "vector",
    //     center: [this.long, this.lat],
    //     zoom: 12,
    //   });
    //   this.map.addControl(new tt.FullscreenControl());
    //   this.map.addControl(new tt.NavigationControl());
    //   console.log(this.map);
    // },
    // createMarker(arr) {
    //   arr.forEach((element) => {
    //     let cor = [element.long, element.lat];
    //     let marker = new tt.Marker().setLngLat(cor).addTo(this.map);
    //     let popup = new tt.Popup({ offset: this.popupOffsets }).setHTML(
    //       `${element.name}`
    //     );
    //     marker.setPopup(popup);
    //   });
    // },
  },
  created() {
    this.getApartments();
    this.getServices();
  },
  mounted() {
    // this.getMap();
  },
};
</script>

<style lang="scss" scoped>
.marker-icon {
  background-position: center;
  background-size: 22px 22px;
  border-radius: 50%;
  height: 22px;
  left: 4px;
  position: absolute;
  text-align: center;
  top: 3px;
  transform: rotate(45deg);
  width: 22px;
}
.marker {
  height: 30px;
  width: 30px;
}
.marker-content {
  background: #c30b82;
  border-radius: 50% 50% 50% 0;
  height: 30px;
  left: 50%;
  margin: -15px 0 0 -15px;
  position: absolute;
  top: 50%;
  transform: rotate(-45deg);
  width: 30px;
}
.marker-content::before {
  background: #ffffff;
  border-radius: 50%;
  content: "";
  height: 24px;
  margin: 3px 0 0 3px;
  position: absolute;
  width: 24px;
}
#my-map {
  width: 100%;
  height: 100%;
}
</style>