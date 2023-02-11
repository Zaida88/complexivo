  let updateLenguajesModal = document.getElementById('updateLenguajesModal')

  updateLenguajesModal.addEventListener('shown.bs.modal', event => {
    let button = event.relatedTarget
    let id_language = button.getAttribute('data-bs-id')

    let inputId_language = updateLenguajesModal.querySelector('.modal-body #id_language')
    let inputName_language = updateLenguajesModal.querySelector('.modal-body #nameLanguage')
    let inputDescription_language = updateLenguajesModal.querySelector('.modal-body #descriptionLanguage')

    let formData = new FormData()
    formData.append('id_language', id_language)
  })
