<template>
    <BaseLayout>
        <BaseTimeReservation />
    </BaseLayout>
</template>
<script>
import BaseLayout from '@layouts/BaseLayout.vue';
import BaseTimeReservation from '@components/BaseTimeReservation.vue';

export default{
    components: {
        BaseLayout,
        BaseTimeReservation
    }
}
</script>
<route lang="json">
   {
        "name": "reservation-page",
        "meta": {
            "title": "Foglalás oldal"
        }
   } 
</route>