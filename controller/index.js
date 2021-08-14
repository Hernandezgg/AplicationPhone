var operaciones="../model/proveedores.php";
var proveedores = new Vue({    
  el: "#index",   
  data:{    
    ctproveedores:[],
    nombre:"",
    empresa:"",
    correo:"",
    telefono:"",  
  },     
  methods:{
    insertar:function(){
        this.nombre=document.getElementById("txtInsnombre").value;
        this.empresa=document.getElementById("txtInsempresa").value;
        this.correo=document.getElementById("txtInscorreo").value;
        this.telefono=document.getElementById("txtInstelefono").value;
        if(this.nombre==0 || this.empresa==0 || this.correo==0 || this.telefono==0){
            this.mserror();
        }else{
            cadena = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!cadena.test(this.correo)){
                this.msemail();
            }else{
                axios.post(operaciones,{opcion:2,nombre:this.nombre,empresa:this.empresa,correo:this.correo,telefono:this.telefono}).then(response =>{
                    this.listaproveedores();
                    this.msinsert();    
                    this.limpiar();
                });
            }
        }
    },
    cargarvalue:function(clave,nombre,empresa,telefono,correo){
        this.clave=clave;
        document.getElementById("txtUpdnombre").value=nombre;
        document.getElementById("txtUpdempresa").value=empresa;
        document.getElementById("txtUpdcorreo").value=correo;
        document.getElementById("txtUpdtelefono").value=telefono;
    },
    editar:function(){
        this.nombre=document.getElementById("txtUpdnombre").value;
        this.empresa=document.getElementById("txtUpdempresa").value;
        this.correo=document.getElementById("txtUpdcorreo").value;
        this.telefono=document.getElementById("txtUpdtelefono").value;
        if(this.nombre==0 || this.empresa==0 || this.correo==0 || this.telefono==0){
            this.mserror();
        }else{
            cadena = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!cadena.test(this.correo)){
                this.msemail();
            }else{
                axios.post(operaciones,{opcion:3,clave:this.clave,nombre:this.nombre,empresa:this.empresa,correo:this.correo,telefono:this.telefono}).then(response =>{
                    this.listaproveedores();
                    this.msupdate();    
                });
            }
        }
    },
    eliminar:function(clave){
        Swal.fire({
          text: "¿Esta seguro de eliminar este registro?:"+clave,
          imageUrl: '../src/img/eliminar.png',         
          imageWidth: 100,
          imageHeight: 100,
          showCancelButton: true,
          confirmButtonText: 'Aceptar',
          cancelButtonText:'Cancelar',          
          confirmButtonColor:'#13CBBA',          
          cancelButtonColor:'#CB131B',  
        }).then((result) => {
          if (result.value) {            
            axios.post(operaciones,{opcion:4,clave:clave}).then(response =>{           
              this.listaproveedores();
            }),             
            Swal.fire(
              '¡Eliminado!',
              'El registro ha sido borrado.',
              'success'
            )
          }
        })
    },
    listaproveedores:function(){
      axios.post(operaciones,{opcion:1}).then(response =>{
        this.ctproveedores=response.data;      
      });
    },
    limpiar:function(){
        document.getElementById("txtInsnombre").value=null;
        document.getElementById("txtInsempresa").value=null;
        document.getElementById("txtInscorreo").value=null;
        document.getElementById("txtInstelefono").value=null;
    },
    mserror:function(){
      Swal.fire({
        text: 'Existen campos vacios',
        imageUrl: '../src/img/error.png',
        imageWidth: 100,
        imageHeight: 100,
        imageAlt: 'Custom image',
        confirmButtonText: 'Aceptar', 
        confirmButtonColor:'#13CBBA',
      })
    },
    msinsert:function(){
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        Toast.fire({
          type:'success',
          title:'Proveedor agregado'
        })
    },
    msupdate:function(){
        Swal.fire(
          'Actualizado',
          'El registro ha sido actualizado.',
          'success'
        )
    },
    msemail:function(){
        Swal.fire({
          text: 'Email no valido',
          imageUrl: '../src/img/email.png',
          imageWidth: 100,
          imageHeight: 100,
          imageAlt: 'Custom image',
          confirmButtonText: 'Aceptar', 
          confirmButtonColor:'#13CBBA',
        })
    },
  }, 
  created:function(){
    this.listaproveedores();
  }
});