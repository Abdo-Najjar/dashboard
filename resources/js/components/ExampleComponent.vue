<template>
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">Example Component</div>

      <div class="card-body">I'm an example component.</div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  mounted() {
    axios.get("/api/");
  },
};
</script>
