

<template>
<div>
    <form method="post" @submit="submit">
    <div class="form-group">
    <label for="name">Name</label>
    <input type="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter email" v-model="form.name" >
     </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" v-model="form.email" >
     </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" v-model="form.password">
  </div>
  <div class="form-group">
    <label for="confirmpass">Confirm Password</label>
    <input type="confirmpassword" class="form-control" id="confirmpass" placeholder="Confirm your Password" v-model="form.confirmpass">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</template>
<script>
export default{
    name:'Login',
    form:{
        name:'',
      email:'',
      password:'',
      confirmpass:''
    },
    showError:false,
   
}
</script>