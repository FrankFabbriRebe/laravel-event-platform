<template>
    <h1>Events:</h1>
    <div v-if="selectedEvent != null">
        <h4>Event name: {{ selectedEvent.name }}</h4>
        <h4>Event description: <br><br> {{ selectedEvent.description }}</h4>
        <h4>Event location: {{ selectedEvent.location }}</h4>
        <button>
            <a href="/">Back to Events</a>
        </button>
    </div>
    <ul v-else>
        <li v-for="event in events" :key="event.id">
            <a href="#" @click="selectedEvent = event">
                <h4>{{ event.name }}</h4>
            </a>
        </li>
    </ul>
</template>

<script>
import axios from 'axios';
export default {
    name: 'PageEvents',
    data(){
        return{
            events: [],
            selectedEvent: null,
        }
    },
    mounted(){
        console.log('Components is mounted');

        axios.get('http://localhost:8000/api/v1/events')
        .then(res => {
            const data = res.data;
            if(data.status = 'success')
                this.events = data.events;
            console.log(this.events);
        })
        .catch(err => {
            console.log(err);
        })
    }
}
</script>
<style>
ul{
    list-style: none;
}
a{
    color: white;
}
a:hover{
    color: grey;
}

</style>