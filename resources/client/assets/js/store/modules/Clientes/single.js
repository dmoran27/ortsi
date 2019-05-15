function initialState() {
    return {
        item: {
            id: null,
            nombre: null,
            apellido: null,
            dependencia: null,
            correo: null,
            telefono: null,
            sexo: null,
            tipo: null,
            
        },
         dependenciasAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    dependenciasAll: state => state.dependenciasAll,
    
}

const actions = {
    storeData({ commit, state, dispatch }) {
        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = new FormData();

            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if (typeof fieldValue !== 'object') {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== 'object') {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(fieldName + '[' + index + ']', fieldValue[index]);
                        }
                    }
                }
            }
            
            if (_.isEmpty(state.item.dependencia)) {
                params.delete('dependencia')
            } else {
                for (let index in state.item.dependencia) {
                    params.set('dependencia['+index+']', state.item.dependencia[index].id)
                }
            }

            axios.post('/api/v1/clientes', params)
                .then(response => {
                    commit('resetState')
                    resolve()
                })
                .catch(error => {
                    let message = error.response.data.message || error.message
                    let errors  = error.response.data.errors

                    dispatch(
                        'Alert/setAlert',
                        { message: message, errors: errors, color: 'danger' },
                        { root: true })

                    reject(error)
                })
                .finally(() => {
                    commit('setLoading', false)
                })
        })
    },
    updateData({ commit, state, dispatch }) {
        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = new FormData();
            params.set('_method', 'PUT')

            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if (typeof fieldValue !== 'object') {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== 'object') {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(fieldName + '[' + index + ']', fieldValue[index]);
                        }
                    }
                }
            }

              if (_.isEmpty(state.item.dependencia)) {
                params.delete('dependencia')
            } else {
                for (let index in state.item.dependencia) {
                    params.set('dependencia['+index+']', state.item.dependencia[index].id)
                }
            }
            axios.post('/api/v1/clientes/' + state.item.id, params)
                .then(response => {
                    commit('setItem', response.data.data)
                    resolve()
                })
                .catch(error => {
                    let message = error.response.data.message || error.message
                    let errors  = error.response.data.errors

                    dispatch(
                        'Alert/setAlert',
                        { message: message, errors: errors, color: 'danger' },
                        { root: true })

                    reject(error)
                })
                .finally(() => {
                    commit('setLoading', false)
                })
        })
    },
     fetchData({ commit, dispatch }, id) {
        axios.get('/api/v1/clientes/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchDependenciasAll')
    },
    fetchDependenciasAll({ commit }) {
        axios.get('/api/v1/dependencias')
            .then(response => {
                commit('setDependenciasAll', response.data.data)
            })
    },
    setNombre({ commit }, value) {
        commit('setNombre', value)
    },
    setApellido({ commit }, value) {
        commit('setApellido', value)
    },
    
    setEmail({ commit }, value) {
        commit('setEmail', value)
    },
    setTelefono({ commit }, value) {
        commit('setTelefono', value)
    },
   
    setSexo({ commit }, value) {
        commit('setSexo', value)
    },
    setDependencia({ commit }, value) {
        commit('setDependencia', value)
    },
    setDependenciaAll({ commit }, value) {
        commit('setDependenciaAll', value)
    },
    setCedula({ commit }, value) {
        commit('setCedula', value)
    },
    setTipo({ commit }, value) {
        commit('setTipo', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setNombre(state, value) {
        state.item.nombre = value
    },
    setApellido(state, value) {
        state.item.apellido = value
    },
    setDependenciaAll(state, value) {
        state.item.dependenciasAll = value
    },
    setDependencia(state, value) {
        state.item.dependencia = value
    },
    setEmail(state, value) {
        state.item.email = value
    },
    setTelefono(state, value) {
        state.item.telefono = value
    },
    setCedula(state, value) {
        state.item.cedula = value
    },
    setSexo(state, value) {
        state.item.sexo = value
    },
    
    setTipo(state, value) {
        state.item.tipo = value
    },
    
    setLoading(state, loading) {
        state.loading = loading
    },
    resetState(state) {
        state = Object.assign(state, initialState())
    }
}

export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}
