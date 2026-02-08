<template>
    <div>
        <BaseStaffCard :workers="workers"/>
    </div>
</template>

<script>
import { mapState } from 'pinia';
import { useWorker } from '@stores/WorkerStore.mjs';
import BaseStaffCard from './BaseStaffCard.vue';

export default {
    components:{
        BaseStaffCard
    },
    computed: {
        ...mapState(useWorker, ['workers'])
    }
}
</script>