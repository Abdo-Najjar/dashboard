<template>
  <div>
    <widget>
      <div class="mb-4 col-4">
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
          type="bg-secondary"
        />
        <Card
          :title="trans('common.total_service_providers')"
          :body="review.cards.total_service_providers"
          type="bg-success"
        />
        <Card
          :title="trans('common.total_customers')"
          :body="review.cards.total_customers"
          type="bg-info"
        />
      </div>
      <div class="row">
        <Card
          :title="trans('common.total_orders')"
          :body="review.cards.total_customers"
          type="bg-light"
        />
        <Card
          :title="trans('common.total_month_orders')"
          :body="review.cards.total_month_orders"
          type="bg-dark"
        />
        <Card
          :title="trans('common.close_orders')"
          :body="review.cards.close_orders"
          type="bg-danger"
        />
        <Card
          :title="trans('common.open_orders')"
          :body="review.cards.open_orders"
          type="bg-warning"
        />
      </div>
    </widget>

    <widget class="mt-5">
      <div class="row text-center">
        
        <table-view :title="trans('common.best_service_providers')" type="bg-primary">
          <tr
            v-for="service_provider in review.service_providers
              .best_service_providers"
            :key="service_provider.id"
          >
            <td>{{ service_provider.name }}</td>
          </tr>
        </table-view>

        <table-view :title="trans('common.best_earn_service_providers')" type="bg-info">
          <tr
            v-for="service_provider in review.service_providers
              .best_earn_service_providers"
            :key="service_provider.id"
          >
            <td>{{ service_provider.name }}</td>
          </tr>
        </table-view>
      </div>

      <div class="row text-center mt-4">
        <table-view :title="trans('common.order_statics')"  type="bg-success">
          <tr>
            <th v-text="trans('common.city')"></th>
            <th v-text="trans('common.orders_number')"></th>
            <th v-text="trans('common.total_income')"></th>
          </tr>
          <tr v-for="(item, index) in review.order_statics" :key="index">
            <td>{{ item.city_name }}</td>
            <td>{{ item.orders_number }}</td>
            <td>{{ item.total_income }}</td>
          </tr>
        </table-view>

        <table-view :title="trans('common.users_statics')" type="bg-warning">
          <tr>
            <th v-text="trans('common.city')"></th>
            <th v-text="trans('common.customers_number')"></th>
            <th v-text="trans('common.service_providers_number')"></th>
          </tr>
          <tr v-for="(item, index) in review.users_statics" :key="index">
            <td>{{ item.city_name }}</td>
            <td>{{ item.customers_number }}</td>
            <td>{{ item.service_providers_number }}</td>
          </tr>
        </table-view>
      </div>
    </widget>
  </div>
</template>

<script>
import axios from "axios";
import Card from "../components/card";
import Widget from "../components/Widget.vue";
import TableView from "../components/TableView.vue";

import "vue-select/dist/vue-select.css";

export default {
  data() {
    return {
      review: {
        countries: [],
        cards: {},
        order_statics: [],
        users_statics: [],
        service_providers: {
          best_earn_service_providers: [],
          best_service_providers: [],
        },
      },
      selectedCountry: "*",
    };
  },
  components: {
    Card,
    Widget,
    TableView,
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

          console.log(res.data.data.order_statics, res.data.data.users_statics);

          this.review.countries.push({
            id: "*",
            name: this.trans("common.all"),
          });
        });
    },
  },
  watch: {
    selectedCountry: function (value) {
      if (value == null) {
        this.selectedCountry = "*";
      }
      this.getReview();
    },
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