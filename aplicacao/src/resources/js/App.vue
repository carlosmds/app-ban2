<template>
    <v-container fluid>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                <b><router-link to="/games" class="nav-item nav-link">(Games)</router-link></b>
                <b><router-link to="/customers" class="nav-item nav-link">(Customers)</router-link></b>
                <b><router-link to="/orders" class="nav-item nav-link">(Orders)</router-link></b>
                <b><router-link to="/orders/report" class="nav-item nav-link">(Orders Report)</router-link></b>
                <b><router-link to="/games/report" class="nav-item nav-link">(Games Report)</router-link></b>
                <b><router-link to="/customers/report" class="nav-item nav-link">(Customers Report)</router-link></b>
                </div>
            </div>
        </nav>
        <br>
        <router-view> </router-view>    
    </v-container>
</template>