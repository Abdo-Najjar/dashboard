<template>
  <div>
    <widget>
     <form  @submit.prevent="store">
        <div class="form-group mb-4">
        <label v-text="trans('common.countries')"></label>
        <v-select
          v-model="city.country_id"
          :reduce="(country) => country.id"
          label="name"
          :options="countries"
        />
        <div class="alert alert-danger m-2" v-if="errors && errors.country_id">
          <span>{{ errors.country_id[0] }}</span>
        </div>
      </div>
      <div class="form-group mb-4">
        <label for="name_ar" v-text="trans('common.name_ar')"></label>
        <input
          v-model="city.name.ar"
          type="text"
          class="form-control"
          id="name_ar"
          :placeholder="trans('common.name_ar')"
        />
        <div class="alert alert-danger m-2" v-if="errors && errors['name.ar']">
          <span>{{ errors["name.ar"][0] }}</span>
        </div>
      </div>
      <div class="form-group mb-4">
        <label for="name_ar" v-text="trans('common.name_en')"></label>
        <input
          v-model="city.name.en"
          type="text"
          class="form-control"
          id="name_ar"
          :placeholder="trans('common.name_en')"
        />
        <div class="alert alert-danger m-2" v-if="errors && errors['name.en']">
          <span>{{ errors["name.en"][0] }}</span>
        </div>
      </div>
      <input type="submit" class="btn btn-primary" :value="trans('common.create')" />
     </form>
    </widget>
  </div>
</template>
<script>
import axois from "axios";
export default {
  data() {
    return {
      city: {
        name:{}
      },
      errors: {},
      countries: [],
    };
  },
  methods: {
    store() {
      axois
        .post(route("vue.cities.store"), this.city)
        .then((res) => {
          swal
            .fire({
              position: "top-end",
              icon: "success",
              title: res.data.message,
              showConfirmButton: false,
              timer: 1500,
            })
            .then((res) => {
              location.href = "/admin/cities";
            });
        })
        .catch((error) => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;
          }
        });
    },
    getCountries() {
      axois.get(route("vue.countries.index")).then((res) => {
        this.countries = res.data.data;
      });
    },
  },
  created() {
    this.getCountries();
  },
};
</script>