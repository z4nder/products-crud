<template>
  <table class="min-w-full table-auto">
    <thead class="justify-between">
        <slot name="table-title"></slot>
    </thead>
    <tbody class="bg-gray-200">
      <slot name="table-content"></slot>
    </tbody>
  </table>
</template>

<script>
export default {
  components: {},
  computed: {
    hasActions() {
      return !!this.$slots.actions;
    },
  },
};
</script>
