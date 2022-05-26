<template>
    <div>
        <div class="col-md-4 mx-auto">
            <h1>Create purchase</h1>
            <form @submit.prevent="create">
                <div class="form-group">
                    <label>Select Game</label>
                    <select v-model="game_id" class="form-control" >
                        <option v-for="game in this.games" :value="game.id">
                            {{ game.name }}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Discount %</label>
                    <input required type="number" class="form-control" v-model="discount">
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
                   .post('http://localhost/api/purchases', {
                        data: {
                            order_id: this.$route.params.order_id,
                            game_id: this.game_id,
                            discount: this.discount,
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
                discount: null,
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