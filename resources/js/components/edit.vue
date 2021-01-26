<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sistema de Cadastro de Nomes</div>
                        <div v-if="msg === true">
                            <div class="alert alert-success" role="alert">
                                Postado com Sucesso!
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
                             <button type="submit" class="btn btn-success mt-3">Publicar</button>
                         </form>
                         <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Sobrenome</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            
                                <tr  v-for="post in post" :key="post.id">
                                    <td>{{ post.id }}</td>
                                    <td>{{ post.name }}</td>
                                    <td>{{ post.question }}</td>
                                    <td><button class="btn btn-secondary">Editar</button></td>
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
                post: []
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
                 
            }
            
        }
    }
    
    
</script>
