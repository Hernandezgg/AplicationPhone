var operaciones="../model/login.php";
var login = new Vue({    
    el: "#login",   
    data:{  
      correo:"",
      password:"",   
    },     
    methods:{
      iniciarsesion:function(){  
        this.correo=document.getElementById('txtcorreo').value;
        this.password=document.getElementById('txtpassword').value;
        if(this.email==0 || this.password==0){
            this.mserror("Existen campos vacios");
        }else{
          axios.post(operaciones,{opcion:1,correo:this.correo,password:this.password}).then(response =>{
            if(response.data=='AcessoConcedidoAdmin'){
                window.location.href="index.php";
              }else{
                this.msdenegado();
                document.getElementById('txtcorreo').value=null;
                document.getElementById('txtpassword').value=null;
            }  
          });
        } 
      },
      mserror:function(mensage){
        Swal.fire({
          text:mensage,
          imageUrl: '../src/img/login.png',
          imageWidth: 100,
          imageHeight: 100,
          imageAlt: 'Custom image',
          confirmButtonText: 'Aceptar', 
          confirmButtonColor:'#13CBBA',
        })
      },
      // msinsert:function(mensage){
      //   const Toast = Swal.mixin({
      //     toast: true,
      //     position: 'top-end',
      //     showConfirmButton: false,
      //     timer: 3000
      //   });
      //   Toast.fire({
      //     type:'success',
      //     title:'Archivo agregado'
      //   })
      // },
      msdenegado:function(){
        Swal.fire({
          title: 'Acceso denegado',
          text: 'Verifica tu usuario y contraseña',
          imageUrl: '../src/img/administrador.png',
          imageWidth: 200,
          imageHeight: 200,
          imageAlt: 'Custom image',
          confirmButtonText: 'Aceptar', 
          confirmButtonColor:'#13CBBA',
        })
      },
    }, 
    created: function(){            
      // this.listacarreras();
      // this.listacuatrimestres();        
    }
  });