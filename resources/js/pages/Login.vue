<template>
<div>
    <form method="post" @submit="submit">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" v-model="form.email" >
     </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" v-model="form.password">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</template>
<script>
export default{
    name:'Login',
    form:{
      email:'',
      password:''
    },
    showError:false,
   
}
</script>