<template>
  <BaseHeader />
  <BaseLayout>

  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseHeader from '@components/layout/BaseHeader.vue';
import { useCounter } from '@stores/CounterStore.mjs'
import { mapState, mapActions } from 'pinia'

export default {
  components: {
    BaseLayout,
    BaseHeader
  },
  computed: {
    ...mapState(useCounter, ['counter'])
  },
  methods: {
    ...mapActions(useCounter, ['increment'])
  }
}
</script>
