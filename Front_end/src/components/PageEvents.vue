<template>
    <h1>Events</h1>
    <ul>
        <li v-for="event in events" :key="event.id">
            <h4>{{ event.name }}</h4>
            <p><strong>Description: </strong>{{ event.description }}</p>
            <span><strong>Event date: </strong>{{ event.creation_date }}</span>
            <span><strong> Location: </strong>{{ event.location }}</span>
            <h4><strong>UserId: </strong>{{ event.user_id }}</h4>

        </li>
    </ul>
</template>

<script>
import axios from 'axios';
export default {
    name: 'PageEvents',
    data(){
        return{
            events: []
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