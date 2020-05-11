<template>
    <div>
        <b-card class="text-center" title="Categorías">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Ultima modificación</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(category, index) in categories" :key="index">
                        <td> {{index+1}} </td>
                        <td> {{category.name}} </td>
                        <td> {{category.description}} </td>
                        <td> {{category.updated_at | moment("dddd, MMMM Do YYYY")}} </td>
                        <td>
                            <b-button variant="outline-primary" @click="showComponentProduct(fillCategories.id)">Consultar productos</b-button>
                            <b-button variant="warning" @click="modalEdit(category.id, category)">Editar</b-button>
                            <b-button variant="danger" @click="deleteCategory(category.id, category.name)">Eliminar</b-button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </b-card>
        <b-modal ref="modal-edit" title="Editar categoría">
            <b-form action="POST" @submit.prevent="updateCategory(fillCategories.id, fillCategories.name)">
                <b-form-group label="Nombre de la categoría:">
                    <b-form-input v-model="fillCategories.name"
                        type="text" placeholder="Nombre de la categoría">
                    </b-form-input>
                </b-form-group>        

               <b-form-group label="Nombre de la categoría:">
                    <b-form-input v-model="fillCategories.description"
                        type="text" placeholder="Descripción de la categoría">
                    </b-form-input>
                </b-form-group>      
                 <b-button type="submit" variant="primary" size="sm" class="float-right" >Actualizar </b-button>
            </b-form>
        </b-modal>
    </div>
</template>

<script>
import {mapMutations} from 'vuex'

    export default {
        data() {
            return {
                categories: [],
                fillCategories: {
                    name: '',
                    description: '',
                }
            }
        },
        created() {
            this.getCategories();
        },
        methods: {
            ...mapMutations(['showComponentProduct']),
            error(){
                this.$swal.fire({ 
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Lo sentimos algo ha salido mal, intente más tarde'
                });
            },
            getCategories(){
                axios.get('http://127.0.0.1:8000/api/categories')
                    .then(res => {
                        this.categories = res.data;
                    }).catch(err => {
                        console.log('Error: ', err);                    
                    });
            },
            modalEdit(id, category){
                this.fillCategories = category;
                this.$refs['modal-edit'].show();       
            },
            updateCategory(id, name){    
                axios.post(`http://127.0.0.1:8000/api/updateCategory/${id}`, this.fillCategories)
                    .then(res => {
                        this.getCategories();                        
                        this.fillCategories = {name: '', description: '' };
                        this.$refs['modal-edit'].hide();
                        this.$swal.fire({ 
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 4000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            },
                            icon: 'success',
                            title: 'La categoría ' +name+ ' ha sido editada correctamente'
                        });
                }).catch(err => {
                    this.err();
                });
            },
            deleteCategory(id, name) {
                this.$swal.fire({
                    title: 'Desea eliminar esta categoria?',
                    text: 'Al eliminar la categoría de '+name+' se perderan los datos de los productos',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirmar'
                }).then((result) => {
                    if (result.value) {
                        axios.delete(`http://127.0.0.1:8000/api/deleteCategory/${id}`)
                            .then(res => {
                                let i = this.categories.map(item => item.id).indexOf(id);
                                this.categories.splice(i, 1);
                                this.getCategories();
                                this.$swal.fire({ 
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 4000,
                                    timerProgressBar: true,
                                    onOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    },
                                    icon: 'success',
                                    title: 'La categoría ' +name+ ' ha sido eliminada correctamente'
                                });
                            }).catch(err =>{
                                this.err();
                            })
                    }
                });
            }
        },
    }
</script>

