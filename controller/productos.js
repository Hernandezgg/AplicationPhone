var operaciones="../model/productos.php";
var productos = new Vue({    
  el: "#productos",   
  data:{    
    ctproductos:[],
    ctproveedor:[],
    nombre:"",
    imagen:"",
    descripcion:"",
    pcompra:"",
    cantidad:"",
    proveedor:"",
    urlIns:"",
    urlUpd:"",
    borrar:"",
  },     
  methods:{
    insertar:function(){
      this.nombre=document.getElementById("txtInsnombre").value;
      this.imagen=document.getElementById("flInsproducto").files[0];
      this.descripcion=document.getElementById("txtInsdescripcion").value;
      this.pcompra=document.getElementById("txtInspcompra").value;
      this.cantidad=document.getElementById("txtInscantidad").value;
      this.proveedor=document.getElementById("cmbInsproveedor").value;
      if(this.nombre==0 || this.imagen==null ||this.descripcion==0 || this.pcompra==0 || this.cantidad==0 ||   this.proveedor==0){
        this.mserror();
      }else{
        let insert=new FormData();
        insert.append("opcion",3);
        insert.append("nombre",this.nombre);
        insert.append("imagen",this.imagen);
        insert.append("descripcion",this.descripcion);
        insert.append("pcompra",this.pcompra);
        insert.append("cantidad",this.cantidad);        
        insert.append("proveedor",this.proveedor);
        axios.post(operaciones,insert).then(response=>{
          this.listaproductos();
          this.msinsert();
          this.limpiarIns();
        });
      }
    },
    cargarvalue:function(clave,nombre,imagen,descripcion,pcompra,cantidad,proveedor){
      this.clave=clave;
      document.getElementById("txtUpdnombre").value=nombre;
      document.getElementById("txtUpddescripcion").value=descripcion;
      document.getElementById("txtUpdpcompra").value=pcompra;
      document.getElementById("txtUpdcantidad").value=cantidad;
      document.getElementById("cmbUpdproveedor").value=proveedor;
      this.urlUpd='../src/img/productos/'+imagen;
      this.borrar=this.urlUpd;
    },
    editar:function(){
      this.nombre=document.getElementById("txtUpdnombre").value;
      this.imagen=document.getElementById("flUpdproducto").files[0];
      this.descripcion=document.getElementById("txtUpddescripcion").value;
      this.pcompra=document.getElementById("txtUpdpcompra").value;
      this.cantidad=document.getElementById("txtUpdcantidad").value;
      this.proveedor=document.getElementById("cmbUpdproveedor").value;
      if(this.nombre==0 || this.descripcion==0 || this.pcompra==0 || this.cantidad==0 || this.proveedor==0){
        this.mserror();
      }else{
        let update =new FormData();
        if(this.imagen==null){
          update.append("opcion",4);
          update.append("clave",this.clave);
          update.append("nombre",this.nombre);
          update.append("imagen",this.imagen);
          update.append("descripcion",this.descripcion);
          update.append("pcompra",this.pcompra);
          update.append("cantidad",this.cantidad);
          update.append("proveedor",this.proveedor);
          axios.post(operaciones,update).then(response =>{
            this.listaproductos();
            this.msupdate();
          });
        }else{
          update.append("opcion",4);
          update.append("clave",this.clave);
          update.append("nombre",this.nombre);
          update.append("imagen",this.imagen);
          update.append("descripcion",this.descripcion);
          update.append("pcompra",this.pcompra);
          update.append("cantidad",this.cantidad);
          update.append("proveedor",this.proveedor);
          update.append("borrar",this.borrar);
          axios.post(operaciones,update).then(response =>{
            this.listaproductos();
            this.msupdate();
          });
        }
      }
    },
    eliminar:function(clave,imagen){
      this.borrar='../src/img/productos/'+imagen;
      let delet=new FormData();
      delet.append("opcion",5);
      delet.append("clave",clave);
      delet.append("borrar",this.borrar);
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
          axios.post(operaciones,delet).then(response =>{           
            this.listaproductos();
          }),             
          Swal.fire(
            '¡Eliminado!',
            'El registro ha sido borrado.',
            'success'
          )
        }
      })
    },
    imgInsert:function(e){
        this.imagen=document.getElementById("flInsproducto").files[0];
        if(this.imagen.type=="image/jpeg" ||this.imagen.type=="image/png" ||this.imagen.type=="image/jpg"){
            var filereader = new FileReader();
            filereader.readAsDataURL(e.target.files[0])
            filereader.onload = (e) => {
            productos.urlIns = e.target.result
          }
        }else{
            this.mserror("Archivo no admitido");
        }
    },
    imgUpd:function(e){
        this.imagen=document.getElementById("flUpdproducto").files[0];
        if(this.imagen.type=="image/jpeg" ||this.imagen.type=="image/png" ||this.imagen.type=="image/jpg"){
            var filereader = new FileReader();
            filereader.readAsDataURL(e.target.files[0])
            filereader.onload = (e) => {
                productos.urlUpd = e.target.result
            }
        }else{
            this.mserror("Archivo no admitido");
        }
    },
    listaproductos:function(){
      let consproductos=new FormData();
      consproductos.append("opcion",1);
      axios.post(operaciones,consproductos).then(response =>{
        this.ctproductos=response.data;   
      });
    },
    listaproveedor:function(){
      let consproveedores=new FormData();
      consproveedores.append("opcion",2);
      axios.post(operaciones,consproveedores).then(response =>{
        this.ctproveedor=response.data;   
      });
    },
    limpiarIns:function(){
      this.urlIns=null;
      document.getElementById("txtInsnombre").value=null;
      document.getElementById("txtInsdescripcion").value=null;
      document.getElementById("txtInspcompra").value=null;
      document.getElementById("txtInscantidad").value=null;
      document.getElementById("cmbInsproveedor").value=null;
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
          title:'Producto registrado'
        })
    },
    msupdate:function(){
        Swal.fire(
          'Actualizado',
          'El registro ha sido actualizado.',
          'success'
        )
    },
  }, 
  created:function(){
    this.listaproductos();
    this.listaproveedor();
  }
});