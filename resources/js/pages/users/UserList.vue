<script setup>
    import {allUser, createUser} from "../../http/users-api"
    import {onMounted,ref, reactive} from "vue"
    import axios from 'axios'
    axios.defaults.withCredentials=true
    const users=ref([])
    const formUser=reactive({
        name:'',
        email:'',
        password:''
    })
    const handleCreateUser=async()=>{
        await axios.post('/auth/register',formUser)
        .then((response)=>{
            formUser.name='';
            formUser.email='';
            formUser.password='';
        })
    }
    onMounted(async()=>{
        const {data}=await allUser()
        users.value=data.data
    })
</script>
<template>
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">List Users</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <button data-toggle="modal" data-target="#userFormModal" type="button" class="mb-2 btn btn-primary">
                            <i class="fa fa-plus-circle mr-1"></i>
                            Add New User
                        </button>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Users</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th style="width: 40px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(user,index) in users" :key="user.id">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{user.name }}</td>
                                        <td>
                                            {{user.email }}
                                        </td>
                                        <td><span class="badge bg-danger">55%</span></td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="userFormModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            <span>Add New User</span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <Form ref="form" @submit.prevent="handleCreateUser">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input v-model =formUser.name
                                    name="name" 
                                    type="text" 
                                    class="form-control"
                                    id="name" 
                                    aria-describedby="nameHelp" 
                                    placeholder="Enter full name" 
                                />
                                <span class="invalid-feedback"></span>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input v-model =formUser.email 
                                    name="email" 
                                    type="email" 
                                    class="form-control "
                                    id="email" 
                                    aria-describedby="nameHelp"
                                    placeholder="Enter full name" 
                                />
                                <span class="invalid-feedback"></span>
                            </div>

                            <div class="form-group">
                                <label for="email">Password</label>
                                <input v-model =formUser.password 
                                    name="password" 
                                    type="password" 
                                    class="form-control "
                                    id="password" 
                                    aria-describedby="nameHelp"
                                    placeholder="Enter password" />
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </Form>
                </div>
            </div>
        </div>
    </div>
</template>
