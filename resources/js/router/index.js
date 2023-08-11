import { createRouter, createWebHistory } from "vue-router";

import invoiceIndex from '../components/invoices/index.vue'

import invoiceNew  from '../components/invoices/new.vue'

import customerList from '../components/customer/customer.vue'
import customerCreate from '../components/customer/customerCreate.vue'
import customerEdit from '../components/customer/customerEdit.vue'

import notFound  from '../components/NotFound.vue'


const routes = [
    {
        path:'/',
        component: invoiceIndex
    },
    {
        path:'/invoice/new',
        component: invoiceNew
    },
    {
        path:'/customer',
        component: customerList
    },
    {
        path:'/customer/create',
        component: customerCreate
    },
    {
        path:'/customer/:id/edit',
        component: customerEdit
    },
    {
        path:'/:pathMatch(.*)*',
        component: notFound
    },

]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
