<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Sistema de Cadastro de Nomes</div>
                        <div v-if="msg === true">
                            <div class="alert alert-success" role="alert">
                                Postado com Sucesso!
                            </div>
                        </div>
                        <div v-if="msgUpdate === true">
                            <div class="alert alert-success" role="alert">
                                Alterado com Sucesso!
                            </div>
                        </div>
                    <div class="card-body">
                       <h3 class="text-center">Nomes</h3><br/>
                         <form @submit.prevent="addBook">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="" >Seu nome</span>
                                </div>
                                <input type="text" class="form-control" name="name" v-model="book.name">
                            </div>
                            <div class="input-group mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="" >Sobrenome</span>
                                </div>
                                <input type="text" class="form-control" v-model="book.question" name="question">
                            </div>
                             <button type="submit" class="btn btn-success mt-3 mb-3">Publicar</button>
                         </form>
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Sobrenome</th>          
                                    </tr>
                                </thead>
                                <tbody>          
                                        <tr  v-for="post in post" :key="post.id">  
                                        <td>{{ post.id }}</td>          
                                        <td> <input type="text" name="post.name" v-model="post.name"></td>
                                        <!--<td>{{ post.name }}</td>-->
                                        <td> <input type="text" name="post.question" v-model="post.question"></td>
                                        <td><button class="btn btn-secondary" @click="updateName(post.id,post.name,post.question)">Alterar</button></td>
                                        <td><button class="btn btn-danger" @click="removeName(post.id)">Excluir</button></td>
                                    </tr>                       
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
     export default {
        data() {
            return {
                
                msg: false,
                book: {},
                post: [],
                msgUpdate: false,

        }
        },
        created() {
            this.axios
                    .get('http://localhost:8000/api/home')
                    //.then(response => console.log(response.data))
                    .then(response => (this.post = response.data))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
        },
        
        methods: {
            addBook() {
                this.axios
                    .post('http://localhost:8000/api/add', this.book)
                    .then(this.msg = true)
                    .catch(error => console.log(error))
                    .finally(window.location.href = 'http://localhost:8000/home')
            },
            removeName(id){
                 this.axios
                    .delete(`http://localhost:8000/api/home/${id}`)
                    .then(console.log("Removido com sucesso!!!"))
                    .catch(error => console.log(error))
                    .finally(window.location.href = 'http://localhost:8000/home')
                 
            },
            updateName(id,name,question){
                var axios = require('axios');
                var data = JSON.stringify({"name":name,"question":question});

                var config = {
                method: 'put',
                url: `http://localhost:8000/api/home/${id}`,
                headers: { 
                    'Content-Type': 'application/json'
                },
                data : data
                };

                axios(config)
                .then(function (response) {
                console.log(JSON.stringify(response.data));
                })
                .then(this.msgUpdate = true)
                .catch(function (error) {
                console.log(error);
                });

            
            }
        }
     }
    
    
</script>
