<template>
  <div class="col-6">
    <div class="card">
      <div class="card-header text-center text-bold" :class="type">{{title}}</div>
      <div class="body">
        <div class="table-responsive">
          <table class="table table-hover">
            <tbody>
                <slot></slot>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
    props:['title' , 'type']
}
</script>
