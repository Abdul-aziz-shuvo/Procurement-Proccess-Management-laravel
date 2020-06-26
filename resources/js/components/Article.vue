<template>
   <div class="container-fluid">
        <div class="row">
            <div class="offset-3 col-md-6 mt-3">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Create Product</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                 <form role="form" method="POST" @submit.prevent="task()">
                    
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Product name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" v-model="name">
                      </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
              </div>
        </div>
        <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Product Table</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>serial</th>
                  <th>Name</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(user,index) in users" :key="user.id">
                  <td>{{index+1}}</td>
                  <td>{{user.name}}</td>
                  <td>
                    <a href="#" class="btn btn-primary" @click="editForm(user)" role="button">Edit</a>
                    <a href="#" class="btn btn-danger" @click="deleteProduct(user.id)" role="button">Delete</a>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>

      <div class="modal fade myModel" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add new</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" @submit.prevent="updateForm()">
                    
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Product name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" v-model="name">
                      </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </div>
</template>

<script>
    export default {
      data(){
        return{
          users:{},
          name:'',
          id:''
        }
      },
        mounted() {
            
        },
        methods:{
           task()
           {
             axios.post('product',{name:this.name}); 
             this.name = "";
              setTimeout(()=>{
                this.loadData();
              },1000);
           },
           loadData()
           {
             axios.get('product').then(({data})=>(this.users = data));
           },
           editForm(user)
           {
              $('#modal-lg').modal('show');
              this.name = user.name;
              this.id = user.id;
           },
           updateForm(){
             
             axios.put('product/'+this.id,{name:this.name})
               $('#modal-lg').modal('hide');
               this.name = '';
             setTimeout(()=>{
                this.loadData();
              },1000);
           },
           deleteProduct(id)
           {
              if(confirm("are you sure ?"))
              {
                axios.delete('product/'+id)
                setTimeout(()=>{
                this.loadData();
              },1000);

              }
              
           }
        },
        mounted() {
            
            this.loadData();
        }
    }
</script>
