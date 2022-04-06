const $form = document.querySelector('#form')
const $buttonMailto = document.querySelector('#mailJM')

$form.addEventListener('submit', handleSubmit)

function handleSubmit(event) {
  event.preventDefault()
  const form = new FormData(this)
  $buttonMailto.setAttribute('href', `mailto:gunyarc@gmail.com?subject=nombre ${form.get('name')}  correo ${form.get('email')} telefono ${form.get('phone')} &body=${form.get('message')}`)
  $buttonMailto.click()
}


