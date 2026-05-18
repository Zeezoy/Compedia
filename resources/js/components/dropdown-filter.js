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
            input.value = option.dataset.value
            selected.textContent = option.textContent
            menu.classList.add('hidden')

            document.getElementById('filter-form').submit()
        })
    })
})