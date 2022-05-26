<template>
    <div>
        <div class="col-md-4 mx-auto">
            <h1>Create rental</h1>
            <form @submit.prevent="create">
                <div class="form-group">
                    <label>Game to rent</label>
                    <select v-model="game_id" class="form-control" >
                        <option v-for="game in this.games" :value="game.id">
                            {{ game.name }}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Days Of Rent</label>
                    <input required type="number" class="form-control" v-model="days_of_rent">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        methods: {
            create() { 
                this.axios
                   .post('http://localhost/api/rentals', {
                        data: {
                            order_id: this.$route.params.order_id,
                            game_id: this.game_id,
                            days_of_rent: this.days_of_rent,
                        }
                    })
                    .then(response => {
                        this.$router.push('/orders')
                    });
            },
        },
        data() {
            return {
                order_id: null,
                game_id: null,
                days_of_rent: null,
                games: [],
            }
        },
        created() {
            this.axios
                .get('http://localhost/api/games')
                .then(response => {
                    this.games = response.data 
                });
        },
    }
</script>