<template>
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Usuario</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <router-link class="btn btn-info btn-sm" :to="'/'">
                                <i class="fas fa-plus-square"></i> Nuevo Usuario
                            </router-link>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Criterios de Búsqueda</h3>
                                </div>
                                <div class="card-body">
                                    <form role="form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label">Nombre</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" v-model="fillBsqUsuario.cNombre" @keyup.enter="getListarUsuarios">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label">Usuario</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" v-model="fillBsqUsuario.cUsuario" @keyup.enter="getListarUsuarios">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label">Correo Electrónico</label>
                                                    <div class="col-md-9">
                                                        <input type="email" class="form-control" v-model="fillBsqUsuario.cCorreo" @keyup.enter="getListarUsuarios">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label">Estado</label>
                                                    <div class="col-md-9">
                                                        <el-select v-model="fillBsqUsuario.cEstado"
                                                        placeholder="Seleccione un estado"
                                                        clearable>
                                                            <el-option
                                                                v-for="item in listEstados"
                                                                :key="item.value"
                                                                :label="item.label"
                                                                :value="item.value">
                                                            </el-option>
                                                        </el-select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-4 offset-4">
                                <button class="btn btn-flat btn-info btnWidth" @click.prevent="getListarUsuarios">Buscar</button>
                                <button class="btn btn-flat btn-default btnWidth" @click.prevent="limpiarCriteriosBsq">Limpiar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Bandeja de Resultados</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <template v-if="listarUsuariosPaginated.length">
                            <table class="table table-hover table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Fotografía</th>
                                        <th>Nombre</th>
                                        <th>correo</th>
                                        <th>Usuario</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in listarUsuariosPaginated" :key="index">
                                        <td>
                                            <li class="user-block">
                                                <img src="/img/avatar.png" :alt="item.username" class="profile-avatar-img img-fluid img-circle" />
                                            </li>
                                        </td>
                                        <td v-text="item.fullname"></td>
                                        <td v-text="item.email"></td>
                                        <td v-text="item.username"></td>
                                        <td>
                                            <template v-if="item.state == 'A'">
                                                <span class="badge badge-success" v-text="item.state_alias"></span>
                                            </template>
                                            <template v-else>
                                                <span class="badge badge-danger" v-text="item.state_alias"></span>
                                            </template>
                                        </td>
                                        <td>
                                            <router-link class="btn btn-primary btn-sm" :to="'/'">
                                                <i class="fas fa-folder"></i> Ver
                                            </router-link>
                                            <router-link  class="btn btn-info btn-sm" :to="'/'">
                                                <i class="fas fa-pencil-alt"></i> Editar
                                            </router-link>
                                            <router-link class="btn btn-success btn-sm" :to="'/'">
                                                <i class="fas fa-key"></i> Permiso
                                            </router-link>
                                            <router-link class="btn btn-danger btn-sm" :to="'/'">
                                                <i class="fas fa-trash"></i> Desactivar
                                            </router-link>
                                            <router-link class="btn btn-success btn-sm" :to="'/'">
                                                <i class="fas fa-check"></i> Activar
                                            </router-link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </template>
                        <template v-else>
                            <div class="callout callout-info">
                                <h5>No se encontraron registros...</h5>
                            </div>
                        </template>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item" v-if="pageNumber > 0">
                                    <a href="#" class="page-link" @click.prevent="prevPage">Ant</a>
                                </li>
                                <li class="page-item" v-for="(page, index) in pagesList" :key="index"
                                    :class="[page == pagenumber ? 'active' : '']">
                                    <a href="#" class="page-link" @click.prevent="selectPage(page)">{{ page + 1 }}</a>
                                </li>
                                <li class="page-item" v-if="pageNumber < pageCount - 1">
                                    <a href="#" class="page-link" @click.prevent="nextPage">Post</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import axios from 'axios';

    export default {
        data() {
            return {
                fillBsqUsuario: {
                    cNombre: '',
                    cUsuario: '',
                    cCorreo: '',
                    cEstado: '',
                },
                listUsuarios: [],
                listEstados: [
                    {value: 'A', label: 'Activo'},
                    {value: 'I', label: 'Inactivo'}
                ],
                pageNumber: 0,
                perPage: 5
            }
        },
        computed: {
            // Obtener el número de páginas
            pageCount(){
                let a = this.listUsuarios.length,
                    b = this.perPage;
                return Math.ceil(a / b);
            },
            // Obtener registros paginados
            listarUsuariosPaginated(){
                let inicio = this.pageNumber * this.perPage,
                    fin    = inicio + this.perPage;
                return this.listUsuarios.slice(inicio, fin);
            },
            //
            pagesList() {
                let a = this.listUsuarios.length,
                    b = this.perPage;
                let pageCount = Math.ceil(a / b);
                let count = 0,
                    pagesArray = [];
                while (count < pageCount) {
                    pagesArray.push(count);
                    count++;
                }
                return pagesArray;
            }

        },
        methods: {
            limpiarCriteriosBsq(){
                this.fillBsqUsuario.cNombre  = '';
                this.fillBsqUsuario.cUsuario = '';
                this.fillBsqUsuario.cCorreo  = '';
                this.fillBsqUsuario.cEstado  = '';
            },
            limpiarBandejaUsuarios(){
                this.listUsuarios = [];
            },
            getListarUsuarios(){
                var url = '/administracion/usuario/getListarUsuarios'
                axios.get(url, {
                    params: {
                        'cNombre'  : this.fillBsqUsuario.cNombre,
                        'cUsuario' : this.fillBsqUsuario.cUsuario,
                        'cCorreo'  : this.fillBsqUsuario.cCorreo,
                        'cEstado'  : this.fillBsqUsuario.cEstado,
                    }
                }).then(response => {
                    this.inicializarPaginacion();
                    this.listUsuarios =  response.data;
                })
            },
            nextPage() {
                this.pageNumber++;
            },
            prevPage() {
                this.pageNumber--;
            },
            selectPage(page){
                this.pageNumber = page;
            },
            inicializarPaginacion(){
                this.pagenumber = 0;
            }
        }
    }
</script>

<style>

</style>
