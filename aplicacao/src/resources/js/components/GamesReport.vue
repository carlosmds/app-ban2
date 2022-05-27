<template>
    <div>
        <div class="col-md-4 mx-auto">
            <h1>Games Report</h1>
            <table class="table" :key="table">
                <thead>
                    <tr>
                        <th>Game Id</th>
                        <th>Game Name</th>
                        <th>Days Rented</th>
                        <th>Purchases Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="game_data in this.games_data" :key="game_data.id">
                        <td>{{ game_data.game_id }}</td>
                        <td>{{ game_data.game_name }}</td>
                        <td>{{ game_data.days_rented }}</td>
                        <td>{{ game_data.purchases_quantity }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
    export default {
        methods: {
            search() { 
                // 
            },
        },
        data() {
            return {
                games_data: null,
            }
        },
        created() {
            this.axios
                .get(`http://localhost/api/games-report/`)
                .then(response => {
                    this.games_data = response.data 
                });
        },
    }
</script>