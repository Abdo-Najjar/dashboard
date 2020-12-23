<template>
  <widget>
    <div class="mb-4 col-3">
      <label v-text="trans('common.countries')"></label>
      <v-select
        v-model="selectedCountry"
        :reduce="(country) => country.id"
        label="name"
        :options="review.countries"
      />
    </div>

    <div class="row mb-4">
      <Card
        :title="trans('common.total_income')"
        :body="review.cards.total_income"
        type="bg-primary"
      />
      <Card
        :title="trans('common.total_month_income')"
        :body="review.cards.total_month_income"
        type="bg-primary"
      />
      <Card
        :title="trans('common.total_service_providers')"
        :body="review.cards.total_service_providers"
        type="bg-primary"
      />
      <Card
        :title="trans('common.total_customers')"
        :body="review.cards.total_customers"
        type="bg-primary"
      />
    </div>
    <div class="row">
      <Card
        :title="trans('common.total_orders')"
        :body="review.cards.total_customers"
        type="bg-primary"
      />
      <Card
        :title="trans('common.total_month_orders')"
        :body="review.cards.total_month_orders"
        type="bg-primary"
      />
      <Card
        :title="trans('common.close_orders')"
        :body="review.cards.close_orders"
        type="bg-primary"
      />
      <Card
        :title="trans('common.open_orders')"
        :body="review.cards.open_orders"
        type="bg-primary"
      />
    </div>
  </widget>
</template>

<script>
import Card from "../components/card";
import axios from "axios";
import "vue-select/dist/vue-select.css";
import Widget from "../components/Widget.vue";

export default {
  data() {
    return {
      review: {
        countries: [],
        cards: {},
      },
      selectedCountry: "*",
    };
  },
  components: {
    Card,
    Widget,
  },
  methods: {
    getReview() {
      axios
        .get(
          route("vue.home", {
            _query: {
              country: this.selectedCountry,
            },
          })
        )
        .then((res) => {
          this.review = res.data.data;
          this.review.countries.push({
            id: "*",
            name: this.trans("common.all"),
          });
        });
    },
  },
  watch: {
    selectedCountry: function(value){
      if(value == null){
        this.selectedCountry = '*';
      }
      this.getReview()
    }
  },
  mounted() {
    this.getReview();
  },
};
</script>

<style scopd>
label {
  color: blue;
}
</style>