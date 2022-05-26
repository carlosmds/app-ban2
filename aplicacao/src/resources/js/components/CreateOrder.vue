<template>
    <div>
        <div class="col-md-6 mx-auto">
            <h1>Games</h1>
            <form @submit.prevent="search">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" v-model="name">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
                <router-link :to="{name: 'create-game'}" class="btn btn-success">Create</router-link>
            </form>
        </div>
        <br>
        <div class="col-md-6 mx-auto">
            <table class="table" :key="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Value</th>
                    <th>Day Rental Value</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="game in games" :key="game.id">
                    <td>{{ game.id }}</td>
                    <td>{{ game.name }}</td>
                    <td>{{ game.value }}</td>
                    <td>{{ game.day_rental_value }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <router-link :to="{name: 'purchase', params: { id: game.id }}" class="btn btn-success">Purchase</router-link>
                            <router-link :to="{name: 'rental', params: { id: game.id }}" class="btn btn-info">Rental</router-link>
                            <router-link :to="{name: 'edit-game', params: { id: game.id }}" class="btn btn-warning">Edit</router-link>
                            <!-- ${this.$route.params.id} -->
                            <button class="btn btn-danger" @click="deleteGame(game.id)">Delete</button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        methods: {
            deleteGame(id) { 
                this.axios
                    .delete(`http://localhost/api/games/${id}`)
                    .then(response => {
                        alert("Game deleted!")
                        this.search()
                    });
            },
            search() { 
                this.axios
                   .get('http://localhost/api/games/', {
                        params: {
                            name: this.name,
                        }
                    })
                    .then(response => {
                        this.games = response.data;
                    });
            },
        },
        data() {
            return {
                games: [],
                name: "",
            }
        },
        created() {
            this.axios
                .get('http://localhost/api/games/', {
                    params: {
                        name: this.name,
                    }
                })
                .then(response => {
                    this.games = response.data;
                });
        },
    }
</script>