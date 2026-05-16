const addRuleBtn = document.getElementById('add-rule-btn')
const rulesContainer = document.getElementById('rules-container')
const ruleTemplate = document.getElementById('rule-template')

if (addRuleBtn && rulesContainer && ruleTemplate) {
    addRuleBtn.addEventListener('click', () => {
        const clone = ruleTemplate.content.cloneNode(true)
        const totalRules = rulesContainer.querySelectorAll('.rule-item').length + 1
        clone.querySelector('.rule-number').textContent = String(totalRules).padStart(1, '0')
        rulesContainer.appendChild(clone)
    })
}

const addPrizeBtn = document.getElementById('add-prize-btn')
const prizeContainer = document.getElementById('prize-container')
const prizeTemplate = document.getElementById('prize-template')

if (addPrizeBtn && prizeContainer && prizeTemplate) {
    addPrizeBtn.addEventListener('click', () => {
        const clone = prizeTemplate.content.cloneNode(true)
        prizeContainer.appendChild(clone)
    })
}

const addStageBtn = document.getElementById('add-stage-btn')
const timelineContainer = document.getElementById('timeline-container')
const timelineTemplate = document.getElementById('timeline-template')

if (addStageBtn && timelineContainer && timelineTemplate) {
    addStageBtn.addEventListener('click', () => {
        const clone = timelineTemplate.content.cloneNode(true)
        timelineContainer.appendChild(clone)
    })
}

const imageInput = document.getElementById('competition-image')
const imagePreview = document.getElementById('image-preview')
const uploadPlaceholder = document.getElementById('upload-placeholder')

if (imageInput && imagePreview) {
    imageInput.addEventListener('change', (event) => {
        const file = event.target.files[0]
        if (!file) return

        const imageURL = URL.createObjectURL(file)
        imagePreview.src = imageURL
        imagePreview.classList.remove('hidden')
        uploadPlaceholder.classList.add('hidden')
    })
}