import Games from './components/Games.vue';
import CreateGame from './components/CreateGame.vue';
import EditGame from './components/EditGame.vue';

import Customers from './components/Customers.vue';
import CreateCustomer from './components/CreateCustomer.vue';
import EditCustomer from './components/EditCustomer.vue';

import Orders from './components/Orders.vue';
import CreateOrder from './components/CreateOrder.vue';
import ViewOrder from './components/ViewOrder.vue';

import AddPurchase from './components/AddPurchase.vue';
import AddRental from './components/AddRental.vue';

import ViewPurchase from './components/ViewPurchase.vue';
import ViewRental from './components/ViewRental.vue';

import OrdersReport from './components/OrdersReport.vue';
import GamesReport from './components/GamesReport.vue';
import CustomersReport from './components/CustomersReport.vue';

export const routes = [
    {
        name: 'games',
        path: '/games',
        component: Games
    },
    {
        name: 'create-game',
        path: '/games/create',
        component: CreateGame
    },
    {
        name: 'edit-game',
        path: '/games/edit',
        component: EditGame
    },
    {
        name: 'customers',
        path: '/customers',
        component: Customers
    },
    {
        name: 'create-customer',
        path: '/customers/create',
        component: CreateCustomer
    },
    {
        name: 'edit-customer',
        path: '/customers/edit',
        component: EditCustomer
    },
    {
        name: 'orders',
        path: '/orders',
        component: Orders
    },
    {
        name: 'create-order',
        path: '/orders/create',
        component: CreateOrder
    },
    {
        name: 'view-order',
        path: '/orders/view',
        component: ViewOrder
    },
    {
        name: 'add-purchase',
        path: '/orders/add-purchase',
        component: AddPurchase
    },
    {
        name: 'add-rental',
        path: '/orders/add-rental',
        component: AddRental
    },
    {
        name: 'view-purchase',
        path: '/orders/view-purchase',
        component: ViewPurchase
    },
    {
        name: 'view-rental',
        path: '/orders/view-rental',
        component: ViewRental
    },
    {
        name: 'orders-report',
        path: '/orders/report',
        component: OrdersReport
    },
    {
        name: 'games-report',
        path: '/games/report',
        component: GamesReport
    },
    {
        name: 'customers-report',
        path: '/customers/report',
        component: CustomersReport
    },
];