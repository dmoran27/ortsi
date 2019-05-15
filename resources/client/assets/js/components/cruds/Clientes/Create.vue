<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Clientes</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <form @submit.prevent="submitForm" novalidate>
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Crear</h3>
                            </div>

                            <div class="box-body">
                                <back-buttton></back-buttton>
                            </div>

                            <bootstrap-alert />

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="nombre"
                                            placeholder="Ingrese el Nombre"
                                            :value="item.nombre"
                                            @input="updateNombre"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="apellido">Apellido</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="apellido"
                                            placeholder="Ingrese el Apellido"
                                            :value="item.apellido"
                                            @input="updateApellido"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="Cedula">Cedula</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="Cedula"
                                            placeholder="Ingrese la Cedula"
                                            :value="item.Cedula"
                                            @input="updateCedula"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="email">Correo</label>
                                    <input
                                            type="email"
                                            class="form-control"
                                            name="email"
                                            placeholder="Ingrese el Email"
                                            :value="item.email"
                                            @input="updateEmail"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="Telefono">Telefono</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="Telefono"
                                            placeholder="Ingrese el Telefono"
                                            :value="item.Telefono"
                                            @input="updateTelefono"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="departamento">Departamento</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="departamento"
                                            placeholder="Ingrese el Departamento"
                                            :value="item.departamento"
                                            @input="updateDepartamento"
                                            >
                                </div>
                                
                                <div class="form-group">
                                    <label for="sexo">Sexo</label>
                                    <v-select
                                            name="sexo"
                                            label="Sexo"
                                            @input="updateSexo"
                                            :value="item.sexo"
                                            :options="sexoAll"
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="tipo">Tipo</label>
                                    <v-select
                                            name="tipo"
                                            label="Tipo"
                                            @input="updateTipo"
                                            :value="item.tipo"
                                            :options="TipoAll"
                                            />
                                </div>
                            </div>

                            <div class="box-footer">
                                <vue-button-spinner
                                        class="btn btn-primary btn-sm"
                                        :isLoading="loading"
                                        :disabled="loading"
                                        >
                                    Guardar
                                </vue-button-spinner>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>
</template>


<script>
import { mapGetters, mapActions } from 'vuex'

export default {
    data() {
        return {
            // Code...
        }
    },
    computed: {
        ...mapGetters('ClientesSingle', ['item', 'loading'])
    },
    created() {
        this.fetchClientestatusesAll()
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('ClientesSingle', ['storeData', 'resetState', 'setNombre', 'setApellido', 'setCedula','setDepartamento', 'setEmail', 'setTelefono',  'setSexo','setTipo', 'fetchClientestatusesAll']),
        updateNombre(e) {
            this.setNombre(e.target.value)
        },
        updateApellido(e) {
            this.setApellido(e.target.value)
        },
        updateDepartamento(e) {
            this.setDepartamento(e.target.value)
        },
        updateEmail(e) {
            this.setEmail(e.target.value)
        },
        updateTelefono(e) {
            this.setTelefono(e.target.value)
        },
        updateCedula(e) {
            this.setCedula(e.target.value)
        },
       updateSexo(value) {
            this.setSexo(value)
        },
        updateTipo(value) {
            this.setTipo(value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'clientes.index' })
                    this.$eventHub.$emit('create-success')
                })
                .catch((error) => {
                    console.error(error)
                })
        }
    }
}
</script>


<style scoped>

</style>
