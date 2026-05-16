const dropdowns = document.querySelectorAll('.dropdown-filter')

dropdowns.forEach(dropdown => {
    const trigger = dropdown.querySelector('.dropdown-trigger')
    const menu = dropdown.querySelector('.dropdown-menu')
    const selected = dropdown.querySelector('.dropdown-selected')
    const input = dropdown.querySelector('.dropdown-input')
    const options = dropdown.querySelectorAll('.dropdown-option')

    trigger.addEventListener('click', () => {
        menu.classList.toggle('hidden')
    })

    options.forEach(option => {
        option.addEventListener('click', () => {
            const value = option.dataset.value
            selected.textContent = value
            input.value = value
            menu.classList.add('hidden')
            const form = dropdown.closest('form')
            
            if (form) {
                form.submit()
            }
        })
    })

    document.addEventListener('click', (e) => {
        if (!dropdown.contains(e.target)) {
            menu.classList.add('hidden')
        }
    })
})