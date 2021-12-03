<template>
  <section>
    <section id="jumbotron" class="position-relative text-white mb-5">
      <div class="img-overlay position-absolute"></div>
      <img
        class="img-fluid position-absolute w-100"
        src="https://www.greenme.it/wp-content/uploads/2021/02/tiny-house-ikea.jpg"
        alt=""
      />

      <div class="container">
        <div class="row align-items-center flex-column mb-4">
          <div class="col-auto mx-auto text-center">
            <h2 class="mb-4">
              <strong
                >Scopri nuovi posti e partecipa a esperienze
                fantastiche!</strong
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
              name="destination"
              placeholder="Dove Vuoi Andare?"
              aria-label="Destination"
              aria-describedby="button-addon2"
            />
            <div class="input-group-append">
              <button
                class="btn btn-outline-danger bg-danger text-light"
                type="button"
              >
                Search
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="sponsored" class="">
      <div class="container">
        <div class="row mb-3">
          <div class="col-12">
            <h3 class="mb-3"><strong>Our Featured Homes</strong></h3>
            <h5 class="mb-0">Hand-picked selection of quality places</h5>
          </div>
        </div>

        <div class="row justify-content-end mb-3">
          <button
            type="button"
            class="btn btn-outline-danger btn-sm px-1 py-0 mr-2"
          >
            Prev
          </button>
          <button type="button" class="btn btn-outline-danger btn-sm px-1 py-0">
            Next
          </button>
        </div>

        <div class="row">
          <div class="col-4">
            <div class="card">
              <img
                src="https://www.greenme.it/wp-content/uploads/2021/02/tiny-house-ikea.jpg"
                class="card-img-top"
                alt=""
              />
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <p class="card-text">
                  Some quick example text to build on the card title and make up
                  the bulk of the card's content.
                </p>
                <a href="#" class="card-link">Card link</a>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card">
              <img
                src="https://www.greenme.it/wp-content/uploads/2021/02/tiny-house-ikea.jpg"
                class="card-img-top"
                alt=""
              />
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <p class="card-text">
                  Some quick example text to build on the card title and make up
                  the bulk of the card's content.
                </p>
                <a href="#" class="card-link">Card link</a>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card">
              <img
                src="https://www.greenme.it/wp-content/uploads/2021/02/tiny-house-ikea.jpg"
                class="card-img-top"
                alt=""
              />
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <p class="card-text">
                  Some quick example text to build on the card title and make up
                  the bulk of the card's content.
                </p>
                <a href="#" class="card-link">Card link</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </section>
</template>
<script>
export default {
  name: "Home",
  data() {
    return {};
  },
  methods: {},
};
</script>
<style lang="scss" scoped>
</style>