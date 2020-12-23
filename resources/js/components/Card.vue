<template>
  <div class="col-md-3">
    <div class="card">
      <div class="card-header text-center" :class="type">{{ title }}</div>
      <div class="card-body text-center">
        <h3 class="text-bold">{{ body }}</h3>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["title", "body", "type"],
};
</script>
