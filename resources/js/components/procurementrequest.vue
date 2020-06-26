<template>
   <div class="container-fluid">
        <form role="form" action method="POST" v-on:submit.prevent="addData()">
        <div class="row">
      <div class="col-md-12 mt-3">
        <div class="card card-outline-dark">
          <div class="card-header">
            <h3 class="card-title font-weight-bold">Add Supplier</h3>
          </div>

            
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for>Suppliers</label>
                    <select class="form-control"  multiple v-model="form.suppliers">
                      <option v-bind:value="supplier.id" v-for="supplier in suppliers" :key="supplier.id" >{{supplier.name}}</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Date</label>
                    <input
                      type="date"
                      class="form-control"
                      id="exampleInputEmail1"
                      v-model="form.date"
                    />
                  </div>
                </div>
                <div class="col-md-4"></div>
              </div>
            </div>

           
        </div>
        <!-- /.card -->
      </div>
    </div>
        <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">procurement request Table</h3>
            </div>
           
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Product</th>
                  <th>Qty</th>
                  <th>Unit Price</th>
                  <th>Total Price</th>
                  <th>Details</th>
                </tr>
                </thead>
                <tbody id="tbody">
                  <tr>
                    <td>
                      <div class="form-group">
                          <select class="form-control " style="width: 100%;" id="selectbox1" v-model="form.product">
                                    
                                    <option v-bind:value="product.id"  v-for="product in products" :key="product.id">{{product.name}}</option>
                          </select>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <input type="text"
                          class="form-control" name="" id="" aria-describedby="helpId" placeholder="" v-model="form.qty">
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <input type="text"
                          class="form-control" name="" id="" aria-describedby="helpId" placeholder="" v-model="form.unitPrice">
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <input type="text"
                          class="form-control" name="" id="" aria-describedby="helpId" placeholder="" v-model="form.total">
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <textarea class="form-control" name="" id="" rows="1" v-model="form.details"></textarea>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            
          </div>
        </div>
        
      </div>

       <div class="card-footer">
              <button type="submit" class="btn btn-outline-dark">Submit</button>
            </div>
      </form>
   </div>
</template>

<script>
    export default {
      data(){
        return{
          suppliers:{},
          products:{},
          procurements:{},
          form: new Form({
                  id:'',
                  suppliers : [],
                  date: '',
                  product: '',
                  qty: '',
                  unitPrice: '',
                  details: '',
                  total: '',
              })
        }
      },
      
        methods:{
           addData()
           {
             this.form.post('procurement');
             this.form.reset();
              setTimeout(()=>{
                this.loadData();
              },1000);
           },
           loadData()
           {
             axios.get('procurement').then(({data})=>(this.suppliers = data.suppliers,this.products = data.products));
            
             console.log(this.procurements);
             
           },
          //  editForm(supplier)
          //  {
          //     $('#modal-lg').modal('show');
          //     this.form.fill(supplier);
          //  },
          //  updateSupplier(){

          //     this.form.put('supplier/'+this.form.id)
          //     this.form.reset();
          //      $('#modal-lg').modal('hide');
          //    setTimeout(()=>{
          //       this.loadData();
          //     },1000);
          //  },
          //  deleteSupplier(id)
          //  {
          //     if(confirm("are you sure ?"))
          //     {
          //       this.form.delete('supplier/'+id)
          //       setTimeout(()=>{
          //       this.loadData();
          //     },1000);

          //     }
              
          //  },
        },
        mounted() {
            
            this.loadData();
        }
    } 
</script>
