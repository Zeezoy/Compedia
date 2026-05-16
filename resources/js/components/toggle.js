const toggles = document.querySelectorAll('.toggle-wrapper')

toggles.forEach(toggle => {
    const button = toggle.querySelector('.toggle-button')
    const circle = toggle.querySelector('.toggle-circle')
    const input = toggle.querySelector('.toggle-input')

    button.addEventListener('click', () => {
        const isActive = input.value === '1'
        input.value = isActive ? '0' : '1'
        button.classList.toggle('bg-[#9747FF]')
        button.classList.toggle('bg-[#343637]')
        circle.classList.toggle('right-1')
        circle.classList.toggle('left-1')
    })
})