<template>
  <widget>
    <div class="mb-4">
      <label v-text="trans('common.countries')"></label>
      <v-select
        v-model="selectedCountry"
        :reduce="(country) => country.id"
        label="name"
        :options="countries"
      />
    </div>
    <div v-show="selectedCountry != '*'" class="mb-4">
      <label v-text="trans('common.cities')"></label>
      <v-select
        v-model="selectedCity"
        :reduce="(city) => city.id"
        label="name"
        :options="cities"
      />
    </div>

    <div>
      <GmapMap
        :center="{ lat: selectedCountryLat, lng: selectedCountryLng }"
        :zoom="5"
        map-type-id="terrain"
        style="height: 300px"
      >
        <Gmap-marker
          v-for="(marker, index) in markers"
          :marker="marker"
          :key="index"
        >
          <icon :src="marker.icon" />
        </Gmap-marker>
      </GmapMap>
    </div>
    <div class="my-3">
      <apexchart type="line" :options="options" :series="series"></apexchart>
    </div>
     <div class="my-3">
      <apexchart type="line" :options="options" :series="series"></apexchart>
    </div>
  </widget>
</template>
<script>
import axios from "axios";
import GmapCustomMarker from "vue2-gmap-custom-marker";
import Icon from "../components/Icon.vue";
import ApexCharts from "apexcharts";
import Widget from "../components/Widget.vue";

export default {
  components: {
    "Gmap-marker": GmapCustomMarker,
    icon: Icon,
    Widget,
  },
  data() {
    return {
      countries: [],
      cities: [],
      selectedCity: "*",
      selectedCountry: "*",
      selectedCountryLat: 23.8859,
      selectedCountryLng: 45.0792,
      options: {
        xaxis: {
          categories: [2016,2017,2018,2019,2020,2020],
        },
        title: {
          text: 'chart',
          align: "left",
        },
      },
      series: [
        {
          name: "Customers",
          data: [30, 40, 45, 50, 49, 60, 70, 91],
        },
      ],
      markers: [
        {
          lat: 22.8859,
          lng: 45.0792,
          icon: this.greenIcon(),
        },
        {
          lat: 21.8859,
          lng: 45.0792,
          icon: this.greenIcon(),
        },
        {
          lat: 20.8859,
          lng: 45.0792,
          icon: this.greenIcon(),
        },
      ],
    };
  },
  methods: {
    getCountries() {
      axios.get(route("vue.countries.index")).then((res) => {
        this.countries = res.data.data;
        this.countries.push({
          id: "*",
          name: this.trans("common.all"),
        });
      });
    },
    getAddressMarkers() {},
    getServiceProvidersMarkers() {},
    getCitiesFromCountry(countryId) {
      axios.get(route("vue.countries.cities", countryId)).then((res) => {
        this.cities = res.data.data;
        this.cities.push({
          id: "*",
          name: this.trans("common.all"),
        });
        this.selectedCity = "*";
      });
    },
  },
  watch: {
    selectedCountry: function (val) {
      if (val == null) {
        this.selectedCountry = "*";
        return;
      }
      if (val == "*") {
        this.selectedCity = null;
        return;
      }

      const country = this.countries.find((country) => country.id == val);
      this.selectedCountryLat = parseFloat(country.latitude);
      this.selectedCountryLng = parseFloat(country.longitude);
      this.getCitiesFromCountry(val);
    },
    selectedCity: function (val) {
      if (val == null) {
        this.selectedCity = "*";
      }
    },
  },
  created() {
    this.getCountries();
  },
};
</script>