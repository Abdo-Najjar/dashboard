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
    <div class="my-3 row">
      <div class="col-4">
        <apexchart
          type="pie"
          width="380"
          :options="pieChartOptions"
          :series="pieSeries"
        ></apexchart>
      </div>

      <div class="col-4">
        <apexchart type="line" :options="options" :series="series"></apexchart>
      </div>

      <div class="col-4">
        <apexchart type="bar" :options="options" :series="series"></apexchart>
      </div>
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
      pieSeries: [44, 55, 13, 43, 22],
      pieChartOptions: {
        chart: {
          type: "pie",
        },
        labels: ["Team A", "Team B", "Team C", "Team D", "Team E"],
        responsive: [
          {
            breakpoint: 480,
            options: {
              chart: {
                width: 200,
              },
              legend: {
                position: "bottom",
              },
            },
          },
        ],
      },
      options: {
        xaxis: {
          categories: [2016, 2017, 2018, 2019, 2020, 2020],
        },
        title: {
          text: "chart",
          align: "left",
        },
      },
      series: [
        {
          name: "Customers",
          data: [30, 40, 45, 50, 49, 60, 70, 91],
        },
      ],
      markers: [],
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
    getAddressMarkers() {
      axios.get(route("vue.addresses.index")).then((res) => {
        this.markers = res.data.data;
      });
    },
    getServiceProvidersMarkers() {
      axios.get(route("vue.serviceProviders.index")).then((res) => {
        console.log(res.data.data);
        this.markers =  this.markers.concat(res.data.data);
      });
    },
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
    this.getAddressMarkers();
    this.getServiceProvidersMarkers();
  },
};
</script>