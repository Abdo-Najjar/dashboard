<template>
  <div class="col-12">
    <div class="container">
      <div class="widget-content widget-content-area">
        <label v-text="trans('common.countries')"></label>
        <v-select
          v-model="selectedCountry"
          :reduce="(country) => country.id"
          label="name"
          :options="countries"
        />
        <div class="mb-4">
          <label v-text="trans('common.cities')"></label>
          <v-select
            v-model="selectedCity"
            :reduce="(city) => city.id"
            label="name"
            :options="cities"
          />
        </div>
      </div>

      <div>
        <GmapMap
          :center="{ lat: selectedCountryLat, lng: selectedCountryLng }"
          :zoom="5"
          map-type-id="terrain"
          style="height: 300px"
        >
        </GmapMap>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";

export default {
  data() {
    return {
      countries: [],
      cities: [],
      selectedCountry: null,
      selectedCountryLat: 23.8859,
      selectedCountryLng: 45.0792,
      selectedCity: null,
    };
  },
  methods: {
    getCountries() {
      axios
        .get(route("vue.countries.index"))
        .then((res) => {
          this.countries = res.data.data;
        })
    },
    getCitiesFromCountry(countryId) {
      axios.get(route("vue.countries.cities", countryId)).then((res) => {
        this.cities = res.data.data;
      });
    },
  },
  watch: {
    selectedCountry: function (val) {
      if (val == null) {
        this.selectedCity = null;
        return;
      }

      const selectedCountry = this.countries.find(
        (country) => country.id == val
      );
      this.selectedCountryLat = selectedCountry.latitude;
      this.selectedCountryLng = selectedCountry.longitude;
      this.getCitiesFromCountry(val);
    },
  },
  created() {
    this.getCountries();
  },
};
</script>