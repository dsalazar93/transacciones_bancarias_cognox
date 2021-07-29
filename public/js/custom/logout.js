function logout(event){
  event.preventDefault()
  if(confirm('¿Desea cerrar su sesión?')){
    document.getElementById('logout-form').submit();
  }
}