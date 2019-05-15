import Vue from 'vue'
import VueRouter from 'vue-router'

import ChangePassword from '../components/ChangePassword.vue'
import ClientesIndex from '../components/cruds/Clientes/Index.vue'
import ClientesCreate from '../components/cruds/Clientes/Create.vue'
import ClientesShow from '../components/cruds/Clientes/Show.vue'
import ClientesEdit from '../components/cruds/Clientes/Edit.vue'


import PermissionsIndex from '../components/cruds/Permissions/Index.vue'
import PermissionsCreate from '../components/cruds/Permissions/Create.vue'
import PermissionsShow from '../components/cruds/Permissions/Show.vue'
import PermissionsEdit from '../components/cruds/Permissions/Edit.vue'


import RolesIndex from '../components/cruds/Roles/Index.vue'
import RolesCreate from '../components/cruds/Roles/Create.vue'
import RolesShow from '../components/cruds/Roles/Show.vue'
import RolesEdit from '../components/cruds/Roles/Edit.vue'

import UsersIndex from '../components/cruds/Users/Index.vue'
import UsersCreate from '../components/cruds/Users/Create.vue'
import UsersShow from '../components/cruds/Users/Show.vue'
import UsersEdit from '../components/cruds/Users/Edit.vue'
import UserActionsIndex from '../components/cruds/UserActions/Index'

import Dashboard from '../components/Dashboard'

import ReportsIndex from '../components/cruds/Reports/Index'

Vue.use(VueRouter)

const routes = [

    { path: '/change-password', component: ChangePassword, name: 'auth.change_password' },
    { path: '/clientes', component: ClientesIndex, name: 'clientes.index' },
    { path: '/clientes/create', component: ClientesCreate, name: 'clientes.create' },
    { path: '/clientes/:id', component: ClientesShow, name: 'clientes.show' },
    { path: '/clientes/:id/edit', component: ClientesEdit, name: 'clientes.edit' },


    { path: '/permissions', component: PermissionsIndex, name: 'permissions.index' },
    { path: '/permissions/create', component: PermissionsCreate, name: 'permissions.create' },
    { path: '/permissions/:id', component: PermissionsShow, name: 'permissions.show' },
    { path: '/permissions/:id/edit', component: PermissionsEdit, name: 'permissions.edit' },

    { path: '/roles', component: RolesIndex, name: 'roles.index' },
    { path: '/roles/create', component: RolesCreate, name: 'roles.create' },
    { path: '/roles/:id', component: RolesShow, name: 'roles.show' },
    { path: '/roles/:id/edit', component: RolesEdit, name: 'roles.edit' },

    { path: '/users', component: UsersIndex, name: 'users.index' },
    { path: '/users/create', component: UsersCreate, name: 'users.create' },
    { path: '/users/:id', component: UsersShow, name: 'users.show' },
    { path: '/users/:id/edit', component: UsersEdit, name: 'users.edit' },
    { path: '/user-actions', component: UserActionsIndex, name: 'user_actions.index' },

    { path: '/reports', component: ReportsIndex, name: 'reports.index' },

    { path: '/home', component: Dashboard, name: 'dashboard' },
]

export default new VueRouter({
    mode: 'history',
    base: '/admin',
    routes
})
