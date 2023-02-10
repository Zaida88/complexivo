  let updateLenguajesModal = document.getElementById('updateLenguajesModal')

  updateLenguajesModal.addEventListener('shown.bs.modal', event => {
    let button = event.relatedTarget
    let id_language = button.getAttribute('data-bs-id')

    let inputId_language = updateLenguajesModal.querySelector('.modal-body #id_language')
    let inputName_language = updateLenguajesModal.querySelector('.modal-body #nameLanguage')
    let inputDescription_language = updateLenguajesModal.querySelector('.modal-body #descriptionLanguage')

    let url = ""
    let formData = new FormData()
    formData.append('id_language', id_language)

    fetch(url, {
      method : "POST",
      body: formData
    }).then(response => response.json())
    .then (data => {
      inputId_language.value = data.id_language
      inputName_language.value = data.nameLanguage
      inputDescription_language.value = data.descriptionLanguage

    }).catch(err => console.log(err))
  })