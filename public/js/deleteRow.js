function eliminarfila(cuenta,meses){
    Swal.fire({
        title: '¿Estas seguro de eliminar la fila?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar',
      }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "https://gallant-driscoll.198-71-62-113.plesk.page/implementta/modulos/Tijuana-p/public/eliminarTablaD/" + cuenta+"/"+meses;
          Swal.fire(
            'Eliminado',
            'Se ha eliminado la fila',
            'success'
          )
        }
      })
}