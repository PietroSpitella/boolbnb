<template>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="d-flex justify-content-center">
            <img
              class="apartments-img"
              :src="'/storage/' + apartment.image"
              alt="Image inserted"
            />
          </div>
          <p class="fs-25 font-weight-bold pt-3 m-0">{{ apartment.title }}</p>
          <p class="fs-15">
            <i class="fas fa-map-marker-alt fs-15"></i> {{ apartment.city }},
            {{ apartment.street }}, {{ apartment.house_number }}
          </p>

          <div class="div-bordered text-center mt-3">
            <div class="p-4">
              <i class="fas fa-home fs-30 color-grey-icon"></i>
              <p class="fs-15 text-capitalize font-weight-bold">
                Type {{ apartment.type }}
              </p>
            </div>
          </div>

          <div class="div-bordered d-flex text-center mb-3">
            <div
              class="
                div-bordered-2 div-bordered-3 div-bordered-4
                icon-separation
                p-4
              "
            >
              <i class="fas fa-bed fs-20 color-grey-icon"></i>
              <p class="fs-15 text-capitalize font-weight-bold">
                Bedrooms {{ apartment.n_beds }}
              </p>
            </div>
            <div class="div-bordered-3 icon-separation p-4">
              <i class="fas fa-user-friends fs-20 color-grey-icon"></i>
              <p class="fs-15 text-capitalize font-weight-bold">
                Guests {{ apartment.n_guests }}
              </p>
            </div>
            <div
              class="
                div-bordered-2 div-bordered-3 div-bordered-4
                icon-separation
                p-4
              "
            >
              <i class="far fa-clone fs-20 color-grey-icon"></i>
              <p class="fs-15 text-capitalize font-weight-bold">
                Mq {{ apartment.mq }}
              </p>
            </div>
          </div>

          <h4 class="font-weight-bold">Description</h4>
          <p class="fs-15 pb-3 div-bordered-3">{{ apartment.description }}</p>

          <div class="pb-3 div-bordered-3">
            <h4 class="font-weight-bold">Details</h4>
            <div class="details-apartments d-flex justify-content-around">
              <div class="details-left">
                <p class="fs-15">
                  <i class="far fa-circle fs-12"></i> ID: {{ apartment.id }}
                </p>
                <p class="fs-15">
                  <i class="far fa-circle fs-12"></i> Pet: {{ apartment.pet }}
                </p>
                <p class="fs-15">
                  <i class="far fa-circle fs-12"></i> Checkin time:
                  {{ apartment.h_checkin }}
                </p>
                <p class="fs-15">
                  <i class="far fa-circle fs-12"></i> Checkout time:
                  {{ apartment.h_checkout }}
                </p>
              </div>
              <div class="details-right">
                <p class="fs-15">
                  <i class="far fa-circle fs-12"></i> Type: {{ apartment.type }}
                </p>
                <p class="fs-15">
                  <i class="far fa-circle fs-12"></i> City: {{ apartment.city }}
                </p>
                <p class="fs-15">
                  <i class="far fa-circle fs-12"></i> Street:
                  {{ apartment.street }}
                </p>
                <p class="fs-15">
                  <i class="far fa-circle fs-12"></i> House number:
                  {{ apartment.house_number }}
                </p>
              </div>
            </div>
          </div>
          <h4 class="font-weight-bold pt-3">Additional Services</h4>
          <div
            class="
              additional_services
              d-flex
              div-bordered-3
              flex-wrap
              pt-2
              pb-3
            "
          >
            <div
              class="pr-4"
              v-for="service in apartment.service"
              :key="service.id"
            >
              <p class="fs-15">
                <i class="fs-15" :class="service.icon"></i> {{ service.name }}
              </p>
            </div>
          </div>
          <h4 class="font-weight-bold pt-3">Price</h4>
          <p class="fs-15 pb-3 div-bordered-3">
            <i class="fas fa-chevron-right fs-12"></i> Price per night:
            {{ apartment.price_night }} €
          </p>
        </div>
      </div>
    </div>
    <ContactForm :apartment="apartment" />
  </section>
</template>
<script>
import ContactForm from "../components/ContactForm";
export default {
  name: "Apartment",
  components: { ContactForm },
  data() {
    return {
      apiUrl: "/api/apartment/",
      apartment: [],
      apartmentId: "",
    };
  },
  mounted() {
    axios
      .get(this.apiUrl + this.$route.params.slug)
      .then((res) => {
        this.apartment = res.data.results;
        this.apartmentId = res.data.results.id;
      })
      .catch((err) => {
        console.log(err);
      });
  },
  created() {
    this.apartment = this.$route.params.data;
  },
};
</script>
<style lang="scss" scoped>
</style>