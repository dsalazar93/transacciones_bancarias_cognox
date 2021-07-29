document.querySelector('button[type=submit]').addEventListener('click', function(ev){
  ev.preventDefault()
  
  if(select_origin_account.value == 'Escoje una cuenta'){
    alert('Escoje una cuenta de origen para la transferencia')
  } else {
    if(select_target_account.value == 'Escoje una cuenta'){
      alert('Escoje una cuenta destino para la transferencia')
    } else {
      const amount = document.getElementById('amount')
      if(isNaN(amount.value) || amount.value.trim().length == 0){
        alert('Digita un valor númerico para el monto')
      } else {
        if (amount.value <= 0){
          alert('Digita un monto con valor mayor a cero')
        } else {
          document.querySelector('#formTransfer').submit()
        }
      }
    }
  }

})