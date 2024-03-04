<template>

    <div>
        <h1>Hello App from Home!</h1>
        <PageEvents />
    </div>
</template>

<script>
import PageEvents from '/src/components/PageEvents.vue'

export default {
    name: 'HomePage',
    components: {
        PageEvents
    }
}
</script>