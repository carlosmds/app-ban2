<template>
    <v-container fluid>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/games" class="nav-item nav-link">Games</router-link>
                    <router-link to="/customers" class="nav-item nav-link">Customers</router-link>
                    <router-link to="/orders" class="nav-item nav-link">Orders</router-link>
                </div>
            </div>
        </nav>
        <br>
        <router-view> </router-view>    
    </v-container>
</template>