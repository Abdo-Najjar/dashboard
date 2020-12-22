<template>
  <div class="col-md-12">
    <div class="mb-4 col-3">
      <label v-text="trans('common.countries')"></label>
      <v-select
        v-model="selectedCountry"
        :reduce="(country) => country.id"
        label="name"
        :options="countries"
      />
    </div>

    <div class="row mb-4">
      <Card />
      <Card />
      <Card />
      <Card />
    </div>
    <div class="row">
      <Card />
      <Card />
      <Card />
      <Card />
    </div>
  </div>
</template>

<script>
import Card from "../components/card";
import axios from "axios";
import "vue-select/dist/vue-select.css";

export default {
  data() {
    return {
      countries: [],
      selectedCountry: null,
    };
  },
  components: {
    Card,
  },
  methods: {
    getCountries() {
      axios.get(route("vue.home")).then((res) => {
        const countries = res.data.data;

        countries.push({ id: -1, name: this.trans("common.all") });

        this.countries = countries;
      });
    },
  },
  mounted() {
    this.getCountries();
  },
};
</script>

<style scopd>
label {
  color: blue;
}
</style>