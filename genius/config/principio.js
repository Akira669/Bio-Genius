$('#resultado').bind('dynatable:preinit', function(e, dynatable) {
  dynatable.utility.textTransform.myNewStyle = function(text) {
    return text
             .replace(/\s+/, '_')
             .replace(/[A-Z]/, function($1){ return $1 + $1 });
  };
}).dynatable({
  table: {
    defaultColumnIdStyle: 'camelCase'
  },
  features: {
    paginate: true,
    search: true,
    recordCount: true,
    perPageSelect: true,
       pushState: true
  }
});


function editar_empleado(id){
    bootbox.confirm("Editar informacion del empleado " +id +" ?",function(result){
    if(result){
     location.href='genius.php?aplication=config&modulo=action_edita&cuenta='+id;
    }
 }); 
}

function permisos (id){
   bootbox.confirm("Asignar permisos al empleado "+ id +" ?",function(result){
    if(result){
         location.href = 'genius.php?aplication=config&modulo=action_permisos&id_user='+id;
    }
 }); 
}

